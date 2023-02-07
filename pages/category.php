<?php

include ('../DBConnection.php');

session_start();

$email = $_SESSION['email'];
$customerId = $_SESSION['customerId'];

if(!isset($email)){
   header('location:login.php');   
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>goElectric -categories-</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
   
<?php 
include ('header.php'); 
?>

<section class="p-category">

   <a href="category.php?category=Scooter">Scooters</a>
   <a href="category.php?category=Skateboard">Skateboards</a>
   

</section>

<section class="products">
 
   <h1 class="title">Products by category</h1>

   <div class="box-container">

   <?php
   try {
      $conn = new PDO($dsn, $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $category_name = $_GET['category'];
      $select_products = $conn->prepare("SELECT * FROM goElectric.Products WHERE category = ?");
      $select_products->execute([$category_name]);
   } catch (PDOException $error) {
      echo "Connection Failed: ".$error->getMessage();
   }
      
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
      <form action="" class="box" method="POST">
         <div class="price">$<span><?= $fetch_products['price']; ?></span></div>
         
         <img src="../images/scooter/<?= $fetch_products['image']; ?>" alt="">
         <div class="name"><?= $fetch_products['productName']; ?></div>
         <input type="hidden" name="productId" value="<?= $fetch_products['productId']; ?>">
         <input type="hidden" name="productName" value="<?= $fetch_products['productName']; ?>">
         <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
         <input type="number" min="1" value="1" name="p_qty" class="qty">
         <input type="submit" value="add to cart" class="btn" name="add_to_cart" onclick="return confirm('Do you want to add this product to he shopping cart?')">
      </form>
   <?php
         }
      }else{
         echo '<p class="empty">no products available!</p>';
      }

   
   if(isset($_POST['add_to_cart'])){

      $productId = $_POST['productId'];
      $productName = $_POST['productName'];
      $price = $_POST['p_price'];
      $image = $_POST['p_image'];
      $p_qty = $_POST['p_qty'];
      

      $sqlSelect = "SELECT * FROM `Cart` WHERE productId = ? AND customerId = ?";
      $check_cart_numbers = $conn->prepare($sqlSelect);
      $check_cart_numbers->execute([$productId, $customerId]);

      if($check_cart_numbers->rowCount() > 0){
         $message[] = 'already added to cart!';
      }else{
         $sqlInsertCart = "INSERT INTO `cart`(customerId, productId, productName, price, quantity, image) VALUES(?,?,?,?,?,?)";

         $insert_cart = $conn->prepare($sqlInsertCart);
         $insert_cart->execute([$customerId, $productId, $productName, $price, $p_qty, $image]);
         $message[] = 'added to cart!';
      }

   }

   ?>

   </div>

</section>


<?php 
include ('footer.php'); 
?>


</body>
</html>