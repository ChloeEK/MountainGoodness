<?php
    session_start();
    $product = filter_input(INPUT_POST, 'productName');
    $price = filter_input(INPUT_POST, 'price');

    
    try {
        include ('database.php');
        $addQuery = "INSERT INTO customerProducts (customerID, productName, price) VALUES ('".$_SESSION['ID']."', '".$product."', ".$price.")";
        $statements = $db->prepare($addQuery);
        $statements->execute();
        $names = $statements->fetchAll();
        $statements->closeCursor();
        header("Location:update_customer.php");
    } catch (PDOException $e){
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
    
?>