<?php

$servername = "localhost";
$username = "root";
$password = "";



try {

    $conn = new PDO ("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected Successfully !<br>";

    $sqlVerification = "DROP DATABASE IF EXISTS goElectric;";
    $conn->exec($sqlVerification);

    $sqlCreateDB = "CREATE DATABASE goElectric";
    $conn->exec($sqlCreateDB);  
    echo "Database created successfully !<br>";


} catch (PDOException $e) {
    echo "Connection Failed: ".$e->getMessage();

}


// PDO FORMAT to create table 'Customer' and insert data

try {
    $connPDO = new PDO("mysql:host=$servername;dbname=goElectric", $username, $password);
    $connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Examplo of sql text or sql query
    $sqlTableCustomer = "CREATE TABLE goElectric.Customer (
        customerId INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    $connPDO->exec($sqlTableCustomer);
    echo "Table created successfully.<br>";
    /*
    $sqlInsert = "INSERT INTO testPDO.Table1 (`id`, `firstname`, `lastname`, `email`, `reg_date`) VALUES
    (1, 'steve', 'marconi', 'steve@gmail.com', '2022-11-07')";
    
    // Use exec() to run query sql and return result
    
    $connPDO->exec($sqlInsert);
    echo "Data inserted successfully.<br>";
    */
} catch (PDOException $e) {
    echo $sqlTableCustomer."<br>".$e->getMessage();
    //echo $sqlInsert."<br>".$e->getMessage();

}

// Create table 'Products'

try {
    $sqlTableProducts = "CREATE TABLE goElectric.Products (
        `productId` INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `productName` VARCHAR(100) NOT NULL,
        `category` VARCHAR(30) NOT NULL,
        `details` VARCHAR(500) NOT NULL,
        `price` FLOAT NOT NULL,
        `image` VARCHAR(200) NOT NULL
    )";

    $connPDO->exec($sqlTableProducts);
    echo "Table created successfully.<br>";
    
    $sqlTableProducts1 = "ALTER TABLE goElectric.Products AUTO_INCREMENT = 201";
    $connPDO->exec($sqlTableProducts1);
    echo "Table altered successfully.<br>";
    
    $sqlInsertProducts = "INSERT INTO goElectric.Products (productName, category, details, price, image)
    VALUES ('Apollo Phantom', 'Scooter', 'This is a long range electric Scooter', 2800, 'apollo1.png')";
    
    // Insert the other lines for the products

} catch (PDOException $e) {
    echo $sqlTableProducts."<br>".$e->getMessage();

}




// Create table 'cart'

try {
    $sqlTableCart = "CREATE TABLE goElectric.Cart (
        `cartId` INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `customerId` INT(5) UNSIGNED NOT NULL,
        `productId` INT(5) UNSIGNED NOT NULL,
        `productName` VARCHAR(100) NOT NULL,
        `price` FLOAT NOT NULL,
        `quantity` INT NOT NULL,
        `image` VARCHAR(200) NOT NULL
    )";

    $connPDO->exec($sqlTableCart);
    echo "Table created successfully.<br>";
    
    // Autoincrement
    $sqlTableCart1 = "ALTER TABLE goElectric.Cart AUTO_INCREMENT = 901";
    $connPDO->exec($sqlTableCart1);
    echo "Table altered successfully.<br>";
    
    // Add the foreign keys into Cart
    $sqlTableCart2 = "ALTER TABLE goElectric.Cart ADD CONSTRAINT FK_CartCustomer FOREIGN KEY (customerId) REFERENCES goElectric.Customer(customerId)";
    $sqlTableCart3 = "ALTER TABLE goElectric.Cart ADD CONSTRAINT FK_CartProduct FOREIGN KEY (productId) REFERENCES goElectric.Products(productId)";
    

} catch (PDOException $e) {
    echo $sqlTableProducts."<br>".$e->getMessage();

}



// Create table 'Orders'

try {
    $sqlTableOrders = "CREATE TABLE goElectric.Orders (
        `orderId` INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `customerId` INT(5) UNSIGNED NOT NULL,
        `name` VARCHAR(100) NOT NULL,
        `email` VARCHAR(100) NOT NULL,
        `method` varchar(50) NOT NULL,
        `address` varchar(500) NOT NULL,
        `total_products` varchar(1000) NOT NULL,
        `total_price` int(100) NOT NULL,
        `placed_on` varchar(50) NOT NULL,
        `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
    )";

    $connPDO->exec($sqlTableOrders);
    echo "Table created successfully.<br>";
    




    $sqlTableOrders1 = "ALTER TABLE goElectric.Orders AUTO_INCREMENT = 501";
    $connPDO->exec($sqlTableOrders1);
    echo "Table altered successfully.<br>";
    

    // Add the foreign key into Orders
    $sqlTableOrders2 = "ALTER TABLE goElectric.Orders ADD CONSTRAINT FK_OrderCustomer FOREIGN KEY (customerId) REFERENCES goElectric.Customer(customerId)";





} catch (PDOException $e) {
    echo $sqlTableProducts."<br>".$e->getMessage();

}






// Close connection in PDO
$conn = null;
echo "PDO Connection closed."




?>