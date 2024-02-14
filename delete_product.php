<?php
    session_start();
    
    try {
        include('database.php');
        $deleteQuery = "DELETE FROM customerProducts WHERE prodID ='".$_SESSION['pid']."'";
        $statement = $db->prepare($deleteQuery);
        $statement->execute();
        $products = $statement->fetchAll();
        $statement->closeCursor();
        header("Location:update_customer.php");
                        
    }catch (PDOException $e){
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();      
    }
                
?>