<?php

include ('../DBConnection.php');

session_start();

$email = $_SESSION['email'];
$customerId = $_SESSION['customerId'];

if(!isset($email)){
   header('location:login.php');
};

$conn = new PDO($dsn, $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $sqlDelete = "DELETE FROM `Cart` WHERE cartId = ?";
   $delete_cart_item = $conn->prepare($sqlDelete);
   $delete_cart_item->execute([$delete_id]);
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>goElectric -shopping cart-</title>

      <!-- font awesome cdn link  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

      <!-- custom css file link  -->
      <link rel="stylesheet" href="../css/style.css">

   </head>
   <body>
      
      <?php 
      include ('header.php'); 
      ?>

      <section class="shopping-cart">

         <h1 class="title">products added</h1>

         <div class="box-container">

         <?php
         try{
            $grand_total = 0;
            $sqlSelectAll = "SELECT * FROM `Cart` WHERE customerId = '$customerId'";
            $select_cart = $conn->prepare($sqlSelectAll);
            $select_cart->execute(['customerId']);

            
         } catch (PDOException $error) {
            echo "Connection Failed: ".$error->getMessage();
         }
         
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){ 
         ?>
         <form action="" method="POST" class="box">
            <a href="cart.php?delete=<?= $fetch_cart['cartId']; ?>" class="fas fa-times" onclick="return confirm('Do you want to delete this from the shopping cart?');"></a>
            
            <img src="../images/scooter/<?= $fetch_cart['image']; ?>" alt="">
            <div class="name"><?= $fetch_cart['productName']; ?></div>
            <div class="price">$<?= $fetch_cart['price']; ?></div>
            <input type="hidden" name="cartId" value="<?= $fetch_cart['cartId']; ?>">
            <div class="sub-total">Quantity:</div>
            <div class="flex-btn">
               <input type="number" value="<?= $fetch_cart['quantity']; ?>" class="qty" name="p_qty">
               
            </div>
            
            <div class="sub-total"> subtotal : <span>$<?= $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?></span> </div>
         </form>
         <?php
            $grand_total += $sub_total;
            }
         }else{
            echo '<p class="empty">your cart is empty</p>';
         }
         ?>
         </div>

         <div class="cart-total">
            <p>grand total : <span>$<?= $grand_total; ?></span></p>
            <a href="shop.php" class="option-btn">continue shopping</a>
            <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
         </div>

      </section>

      <?php include 'footer.php'; ?>

   </body>
</html>