<?php

session_start();
//include ('../DBConnection.php');
//echo "User Connected: ".$_SESSION['email'];

?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="../images/goicon.png">
        <title>goElectric -home-</title>

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <!-- custom css file link  -->
        <link rel="stylesheet" href="../css/style.css">

    </head>


    <body>
        
        <?php 
        
        
        include ('header.php'); 

        ?>

        <div class="home-bg">
            <section class="home">
                <div class="content">
                    <span>Welcome to goElectric</span>
                    <h3>Small electric vehicles for all !</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto natus culpa officia quasi, accusantium explicabo?</p>
                    <a href="about.php" class="btn">about us</a>
                </div>
            </section>
        </div>




        <section class="about">
            <div class="main">
                <img src="../images/skateimage.jpg">
                <div class="about-text">
                    <h2>New way of commuting</h2>
                    <h5>goElectric <span></span></h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto natus culpa officia quasi, accusantium explicabo</p>
                </div>
            </div>
        </section>




        <section class="home-category">

            <h1 class="title">shop by category</h1>

            <div class="box-container">

                <div class="box">
                    <img src="../images/scooter/scootercategory.jpeg" alt="">
                    <h3>scooters</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p>
                    <a href="category.php?category=Scooter" class="btn">scooters</a>
                </div>

                <div class="box">
                    <img src="../images/skate/skatecategory01.jpg" alt="">
                    <h3>skateboards</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p>
                    <a href="category.php?category=Skateboard" class="btn">skateboards</a>
                </div>

            </div>

        </section>

        <section>
            <br><br>
        </section>


        <div class="slideshow-container">

            <div class="mySlides fade">
                <img src="../images/img_source/skatebg02.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="../images/img_source/skatebg04.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="../images/img_source/scooters03.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="../images/img_source/skatebg03.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="../images/img_source/skatebg01.jpg" style="width:100%">
            </div>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>  <!-- The "<" character -->
            <a class="next" onclick="plusSlides(1)">&#10095;</a>   <!-- The ">" character -->

        </div>
    
        <div class ="dots-container">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
        </div>

    
        <!--  SLIDESHOW SECTION IN JAVASCRIPT  -->

        <script>
            var slideIndex = 1;     // slides indexed from 1
            showSlides(slideIndex);

            var timeout = null;
            timeout = setTimeout(automaticChange, 3000);  // To avoid automatic change, comment this line

            function plusSlides(n) {
                slideIndex += n;
                showSlides(slideIndex);
                /* if automaticChange is on, reset the timer */
                if (timeout !== null) {
                    clearTimeout(timeout);
                    timeout = setTimeout(automaticChange, 3000);
                }
            }

            function currentSlide(n) {
                slideIndex = n
                showSlides(slideIndex);
                /* if automaticChange is on, reset the timer */
                if (timeout !== null) {
                    clearTimeout(timeout);
                    timeout = setTimeout(automaticChange, 3000);
                }
            }

            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                if (n > slides.length) { slideIndex = 1 }   // if beyond the last one, go to the first one
                if (n < 1) { slideIndex = slides.length }   // if before the first one, go to the last one
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
            }

            function automaticChange() {
                slideIndex++;
                showSlides(slideIndex);
                timeout = setTimeout(automaticChange, 3000);   // call again automaticChange() after 7s
            }
        </script>


    </body>

    <?php 
    include ('footer.php'); 
    ?>


</html>

