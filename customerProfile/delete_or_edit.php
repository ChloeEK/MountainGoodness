<!DOCTYPE html>
<html>
    <head>
        <title>Edit Product</title>
        <link rel="stylesheet" href="customer_page_style.css"/>
    </head>
<?php
    session_start();
    $delete = filter_input(INPUT_POST, 'btnDelete');
    $edit = filter_input(INPUT_POST, 'btnEdit');
    
    if(isset($delete)) {
        $pid = filter_input(INPUT_POST, 'pid');
        try {
            include('database.php');
            $deleteQuery = "DELETE FROM customerProducts WHERE prodID ='".$pid."'";
            $statement = $db->prepare($deleteQuery);
            $statement->execute();
            $products = $statement->fetchAll();
            $statement->closeCursor();
            unset($pid);
            header("Location:update_customer.php");
                        
        }catch (PDOException $e){
            $error_message = $e->getMessage();
            include('database_error.php');
            exit();      
        }
    } elseif (isset($edit)) {
        $pid = filter_input(INPUT_POST, 'pid');
        try {
            include('database.php');
            $query = "SELECT * FROM customerProducts WHERE prodID ='".$pid."'";
            $statement = $db->prepare($query);
            $statement->execute();
            $products = $statement->fetchAll();
            $statement->closeCursor();
            unset($pid);           
        }catch (PDOException $e){
            $error_message = $e->getMessage();
            include('database_error.php');
            exit();      
        }
        
        foreach ($products as $product) {
            echo "<body>";
            echo "<div class='centered'>";
            echo "<form action='edit_product.php' method='post'>";
            echo "<label>Edit Product/Price</label>";
            echo "</br>";
            echo "<label>Product: </label>";
            echo "<input type='hidden' value='".$product['prodID']."' name='pid2'>";
            echo "<input type='text' value='".$product['productName']."' name='newProductName' id='ip2'>";
            echo "</br>";
            echo "<label>Price: </label>";
            echo "<input type='text' value='".$product['price']."' name='newPrice' id='ip2'>";
            echo "</br>";
            echo "<input type='submit' value='Save' id='ip1'>";
            echo "</form>";
            echo "</div>";
            echo "</body>";
            
        }
    }


?>
