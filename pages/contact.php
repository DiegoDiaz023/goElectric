<?php

include ('../DBConnection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>goElectric -contact-</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
   
<?php 
include ('header.php'); 
?>

<section class="contact">

   <h1 class="title">send us a message</h1>

   <form action="" method="POST">
      <input type="text" name="name" class="box" required placeholder="enter your name">
      <input type="email" name="email" class="box" required placeholder="enter your email">
      <input type="number" name="number" class="box" required placeholder="enter your number">
      <input type="category" name="category" class="box" required placeholder="enter product category">
      <textarea name="msg" class="box" required placeholder="enter your message" cols="30" rows="10"></textarea>
      <input type="submit" value="send message" class="btn" name="send">
      <p><br>Our contact center will reply to you in between 3 working days</p>
   </form>

</section>



<?php 
include ('footer.php'); 
?>


</body>
</html>