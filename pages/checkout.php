<?php

include ('../DBConnection.php');

session_start();

$email = $_SESSION['email'];
$customerId = $_SESSION['customerId'];

if(!isset($email)){
   header('location:login.php');
};

if(isset($_POST['order'])){

   $name = $_POST['name'];
   //$email = $_POST['email'];
   $method = $_POST['method'];
   $address = $_POST['flat'] .', '. $_POST['street'] .'. '. $_POST['state'] .', '. $_POST['city'] .'. '. $_POST['country'] .' - '. $_POST['pin_code'];
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $conn = new PDO($dsn, $username, $password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $sqlSelect = "SELECT * FROM `Cart` WHERE customerId = ?";
   $cart_query = $conn->prepare($sqlSelect);
   $cart_query->execute([$customerId]);

   if($cart_query->rowCount() > 0){
      while($cart_item = $cart_query->fetch(PDO::FETCH_ASSOC)){
         $cart_products[] = $cart_item['productName'].' ( '.$cart_item['quantity'].' )';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      };
   };

   $total_products = implode(', ', $cart_products);
   $sql = "SELECT * FROM `Orders` WHERE name = ? AND email = ? AND method = ? AND address = ? AND total_products = ? AND total_price = ?";
   $order_query = $conn->prepare($sql);
   $order_query->execute([$name, $email, $method, $address, $total_products, $cart_total]);

   if($cart_total == 0){
      $message[] = 'your cart is empty';
   }elseif($order_query->rowCount() > 0){
      $message[] = 'order placed already!';
   }else{
      $sqlInsertOrder = "INSERT INTO `Orders` (customerId, name, email, method, address, total_products, total_price, placed_on) VALUES(?,?,?,?,?,?,?,?)";
      $insert_order = $conn->prepare($sqlInsertOrder);
      $insert_order->execute([$customerId, $name, $email, $method, $address, $total_products, $cart_total, $placed_on]);
      

      // Deleting the products from the shopping cart
      $sqlDeleteFromCart = "DELETE FROM `Cart` WHERE customerId = ?";
      $delete_cart = $conn->prepare($sqlDeleteFromCart);
      $delete_cart->execute([$customerId]);
      header('location:orders.php');
      $message[] = 'order placed successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>goElectric -checkout-</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
   
<?php 
include ('header.php'); 
?>

<section class="display-orders">

   <?php
      $conn = new PDO($dsn, $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   


      $cart_grand_total = 0;
      $select_cart_items = $conn->prepare("SELECT * FROM `Cart` WHERE customerId = ?");
      $select_cart_items->execute([$customerId]);
      if($select_cart_items->rowCount() > 0){
         while($fetch_cart_items = $select_cart_items->fetch(PDO::FETCH_ASSOC)){
            $cart_total_price = ($fetch_cart_items['price'] * $fetch_cart_items['quantity']);
            $cart_grand_total += $cart_total_price;
   ?>
   <p> <?= $fetch_cart_items['productName']; ?> <span>(<?= '$'.$fetch_cart_items['price'].' / qty '. $fetch_cart_items['quantity']; ?>)</span> </p>
   <?php
    }
   }else{
      echo '<p class="empty">your cart is empty!</p>';
   }
   ?>
   <div class="grand-total">Grand total : <span>$<?= $cart_grand_total; ?></span></div>
</section>

<section class="checkout-orders">

   <form action="" method="POST">

      <h3>place your order</h3>

      <div class="flex">
         <div class="inputBox">
            <span>name:</span>
            <input type="text" name="name" placeholder="enter your name" class="box" required>
         </div>
         
         <div class="inputBox">
            <span>email:</span>
            <input type="email" name="email" placeholder="" class="box" required>
         </div>
         <div class="inputBox">
            <span>payment method:</span>
            <select name="method" class="box" required>
               <option value="cash on delivery">cash on delivery</option>
               <option value="credit/debit card">credit/debit card</option>
               <option value="interac">interac</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address line 1:</span>
            <input type="text" name="flat" placeholder="eg street number" class="box" required>
         </div>
         <div class="inputBox">
            <span>address line 2:</span>
            <input type="text" name="street" placeholder="eg apt number" class="box">
         </div>
         <div class="inputBox">
            <span>city:</span>
            <input type="text" name="city" placeholder="" class="box" required>
         </div>



         <div class="inputBox">
            <span>state:</span>
               <select name="state" class="box" required>
                  <option value="Alberta AB">Alberta AB</option>
                  <option value="British Columbia BC">British Columbia BC</option>
                  <option value="Manitoba MB">Manitoba MB</option>
                  <option value="New Brunswick NB">New Brunswick NB</option>
                  <option value="Newfoundland and Labrador NL">Newfoundland and Labrador NL</option>
                  <option value="Nova Scotia NS">Nova Scotia NS</option>
                  <option value="Ontario ON">Ontario ON</option>
                  <option value="Prince Edward Island PE">Prince Edward Island PE</option>
                  <option value="Quebec QC">Quebec QC</option>
                  <option value="Saskatchewan SK">Saskatchewan SK</option>
               </select>
         </div>



         <div class="inputBox">
            <span>country :</span>
            <input type="text" name="country" value="Canada" class="box" required>
         </div>
         <div class="inputBox">
            <span>post code :</span>
            <input type="text" name="pin_code" placeholder="" class="box" required>
         </div>
      </div>

      <input type="submit" name="order" class="btn <?= ($cart_grand_total > 1)?'':'disabled'; ?>" value="place order" onclick="return confirm('Do you want to place this order?');">

   </form>

</section>




<?php 
include ('footer.php'); 
?>


</body>
</html>