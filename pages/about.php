<?php

include ('../DBConnection.php');

session_start();

$email = $_SESSION['email'];

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
      <title>goElectric -about-</title>

      <!-- font awesome cdn link  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

      <!-- custom css file link  -->
      <link rel="stylesheet" href="../css/style.css">

   </head>

   <body>
      
      <?php include ('header.php'); ?>

      <section class="about">

         <div class="row">

            <div class="box">
               <img src="../images/chooseUs1.jpg" alt="">
               <h3>why choose us?</h3>
               <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam, a quod, quis alias eius dignissimos pariatur laborum dolorem ad ullam iure, consequatur autem animi illo odit! Atque quia minima voluptatibus.</p>
               <a href="contact.php" class="btn">contact us</a>
            </div>

            <div class="box">
               <img src="../images/weProvide.jpg" alt="">
               <h3>what we provide?</h3>
               <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam, a quod, quis alias eius dignissimos pariatur laborum dolorem ad ullam iure, consequatur autem animi illo odit! Atque quia minima voluptatibus.</p>
               <a href="shop.php" class="btn">our shop</a>
            </div>

         </div>
      </section>

      <section class="reviews">

         <h1 class="title">clients reviews</h1>

         <div class="box-container">

            <div class="box">
               <img src="../images/userprofile.jpg" alt="">
               <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et voluptates sit earum, neque non cupiditate amet deserunt aperiam quas ex.</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>User A</h3>
            </div>

            <div class="box">
               <img src="../images/userprofile.jpg" alt="">
               <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et voluptates sit earum, neque non cupiditate amet deserunt aperiam quas ex.</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>User B</h3>
            </div>

            <div class="box">
               <img src="../images/userprofile.jpg" alt="">
               <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et voluptates sit earum, neque non cupiditate amet deserunt aperiam quas ex.</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>User C</h3>
            </div>

            <div class="box">
               <img src="../images/userprofile.jpg" alt="">
               <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et voluptates sit earum, neque non cupiditate amet deserunt aperiam quas ex.</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>User D</h3>
            </div>

            <div class="box">
               <img src="../images/userprofile.jpg" alt="">
               <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et voluptates sit earum, neque non cupiditate amet deserunt aperiam quas ex.</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>User E</h3>
            </div>

         </div>
      </section>

      <?php include ('footer.php'); ?>

   </body>
</html>