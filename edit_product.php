<?php
    $newProductName = filter_input(INPUT_POST, 'newProductName');
    $newPrice = filter_input(INPUT_POST, 'newPrice');
    $pid2 = filter_input(INPUT_POST, 'pid2');
    
    try {
            include('database.php');
            $updateQuery = "UPDATE customerProducts SET productName='".$newProductName."', price=".$newPrice." WHERE prodID='".$pid2."'";
            $statements = $db->prepare($updateQuery);
            $statements->execute();
            $product = $statements->fetchAll();
            $statements->closeCursor();
            unset($pid2);
            header("Location:update_customer.php");            
        }catch (PDOException $e){
            $error_message = $e->getMessage();
            include('database_error.php');
            exit();      
        }
?>