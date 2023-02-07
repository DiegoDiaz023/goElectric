<?php

include("../DBConnection.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>goElectric -SignUp-</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/components.css">

</head>
<body>


   
<section class="form-container">

   <form action="" enctype="multipart/form-data" method="POST">
      <h3>register now</h3>
      <input type="text" name="firstname" class="box" placeholder="Enter your name" required>
      <input type="text" name="lastname" class="box" placeholder="Enter your last name" required>
      <input type="email" name="email" class="box" placeholder="Enter your email" required>
      <input type="password" name="password" class="box" placeholder="Enter your password" required>
      <input type="password" name="confirm_password" class="box" placeholder="Confirm your password" required>
      <input type="submit" value="Submit" class="btn" name="submit">
      <p>already have an account? <a href="login.php">login here</a></p>
      <p><a href="home.php">Back to home</a></p>
   </form>

</section>

</body>
</html>


<?php


try{
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST["submit"])){
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirm_password"];
    
        $query = "SELECT * FROM Customer WHERE firstname = '$firstname' AND email = '$email'";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $count = $stmt->rowCount();
        //var_dump($count);

        if ($count > 0){
            ?>
            <!DOCTYPE html>
                <script>
                    alert("This user already exists. Please try again!");
                </script>
            </html>
            <?php
        } else {
            if ($password == $confirmPassword){
                //insert 
                $sqlInsert = "INSERT INTO Customer SET firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password'";
                $stmtInsert = $conn->prepare($sqlInsert);
                $stmtInsert->execute();
                
                ?>
                <!DOCTYPE html>
                    <script>
                        alert("User successfully created!");
                        window.location = 'login.php';
                    </script>
                </html>
                <?php
            } else {
                //passwords does't match
                ?>
                <!DOCTYPE html>
                    <script>
                        alert("Passwords doesn't match. Please try again!");    
                    </script>
                </html>
                <?php
            }





        }
    
    }
} catch (PDOException $error) {
    echo "Connection Failed: ".$error->getMessage();
}










