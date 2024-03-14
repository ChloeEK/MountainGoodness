<!DOCTYPE html>
<html>
    <head>
        <title>Add Customer</title>
        <link rel="stylesheet" href="add_page_style.css"/>
    </head>
    <body>
        <div class="centered">
            <h1>Add Customer</h1>
            <form action='add_customer.php' method='post'>
                <label>First Name: </label>
                <input type='text' name="firstName" id='ip2'>
                </br>
                <label>Last Name: </label>
                <input type='text' name='lastName' id='ip2'>
                </br>
                <label>Product Name: </label>
                <input type='text' name='product' id='ip2'>
                </br>
                <label>Price: </label>
                <input type='text' name="price" id='ip2'>
                </br>
                <input type="submit" value='Add Customer' id='ip1'>
            </form>
            <a href="search.php"><input type='button' id='ip1' value='Return to Search'></a>

            <?php
                $firstName = filter_input(INPUT_POST, 'firstName');
                $lastName = filter_input(INPUT_POST, 'lastName');
                $product = filter_input(INPUT_POST, 'product');
                $price = filter_input(INPUT_POST, 'price');
                session_start();
                $_SESSION['lastName'] = $lastName;
                $_SESSION['product'] = $product;
                $_SESSION['price'] = $price;

                if (isset($firstName) && isset($lastName)) {
                    try {
                        include ('database.php');
                        $addCustomer = "INSERT INTO customers (firstName, lastName) VALUES ('".$firstName."', '".$lastName."')";
                        $statements = $db->prepare($addCustomer);
                        $statements->execute();
                        $names = $statements->fetchAll();
                        $statements->closeCursor();
                        header("Location:add_first_product.php");
                    } catch (PDOException $e){
                        $error_message = $e->getMessage();
                        include('database_error.php');
                        exit();
                    }

                }
            ?>
        </div>
        
    </body>
</html>

