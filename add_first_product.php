<?php
    session_start();
    
    try {
        include ('database.php');
        $getCustomer = "SELECT * FROM customers WHERE lastName='".$_SESSION['lastName']."'";
        $statements = $db->prepare($getCustomer);
        $statements->execute();
        $names = $statements->fetchAll();
        $statements->closeCursor();
     } catch (PDOException $e){
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
    
    foreach($names as $name) {
        $cusID = $name['ID'];
    }
?>

        <?php
            try {
                include ('database.php');
                $addQuery = "INSERT INTO customerProducts (customerID, productName, price) VALUES ('".$cusID."', '".$_SESSION['product']."', ".$_SESSION['price'].")";
                $statement = $db->prepare($addQuery);
                $statement->execute();
                $name = $statement->fetchAll();
                $statement->closeCursor();
                header("Location:search.php");
             } catch (PDOException $e){
                $error_message = $e->getMessage();
                include('database_error.php');
                exit();
            }
        ?>

