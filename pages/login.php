<?php

session_start();
include("../DBConnection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>goElectric -login-</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/components.css">

</head>
<body>


   
<section class="form-container">

   <form action="" method="POST">
      <h3>goElectric -login-</h3>
      <input type="email" name="email" class="box" placeholder="Enter your email" required>
      <input type="password" name="password" class="box" placeholder="Enter your password" required>
      <input type="submit" value="login now" class="btn" name="submit">
      <p>Don't have an account yet? <a href="signup.php">register here</a></p>
      <p><a href="home.php">Back to Home</a></p>
   </form>

</section>


</body>
</html>

<?php



    try{
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

        if (isset($_POST["submit"])){
            $email = $_POST["email"];
            $password = $_POST["password"];
            if (empty($_POST["email"]) || empty($_POST["password"])){
                ?>
                    <!DOCTYPE html>
                        <script>
                            alert("All the fields are required!");
                        </script>
                    </html>
                <?php
                
            } else {
                $query = "SELECT customerId FROM Customer WHERE email = '$email' AND password = '$password'";
                $stmt = $conn->prepare($query);
                $stmt->execute();

                $select = $stmt->fetch();
                $select1 = $select['customerId'];
                $select2 = $select['firstname'];
                /*
                array(
                    'email' => $_POST["email"],
                    'password' => $_POST["password"]
                );
                */
                
                $count = $stmt->rowCount();
            

                if ($count > 0){
                    // User exists
                    $_SESSION['email'] = $email;
                    $_SESSION['customerId'] = $select1;
                    $_SESSION['firstname'] = $select2;
                    header("location:home.php");

                } else {
                    // User do not exists
                    ?>
                        <!DOCTYPE html>
                            <script>
                                alert("Your username or password doesn't match with our records.");
                            </script>
                        </html>
                    <?php
                }


                

            }

        }



    } catch (PDOException $error) {
        echo "Connection Failed: ".$error->getMessage();
    }


?>


