<!DOCTYPE html>
<html>
    <head>
        <title>Update Customer</title>
        <link rel="stylesheet" href="customer_page_style.css"/>
    </head>
    <body>
        <?php
            session_start();
            if(isset($_SESSION['ID'])) {
          
            
                try {
                    include ('database.php');
                    $customerQuery = "SELECT customers.firstName, customers.lastName, customers.ID, customerProducts.productName, customerProducts.price FROM customers INNER JOIN customerProducts ON customers.ID=customerProducts.customerID WHERE customers.ID='".$_SESSION['ID']."'";
                    $statements = $db->prepare($customerQuery);
                    $statements->execute();
                    $names = $statements->fetchAll();
                    $statements->closeCursor();
                } catch (PDOException $e){
                    $error_message = $e->getMessage();
                    include('database_error.php');
                    exit();
                }
            } else {
                $customerID = filter_input(INPUT_POST, 'customerID');
                $_SESSION['ID'] = $customerID;
                
                try {
                    include ('database.php');
                    $customerQuery = "SELECT customers.firstName, customers.lastName, customers.ID, customerProducts.prodID, customerProducts.productName, customerProducts.price FROM customers INNER JOIN customerProducts ON customers.ID=customerProducts.customerID WHERE customers.ID='".$_SESSION['ID']."'";
                    $statements = $db->prepare($customerQuery);
                    $statements->execute();
                    $names = $statements->fetchAll();
                    $statements->closeCursor();
                } catch (PDOException $e){
                    $error_message = $e->getMessage();
                    include('database_error.php');
                    exit();
                }
            }
            
            foreach ($names as $name) {
                $firstName = $name['firstName'];
                $lastName = $name['lastName'];
            }
        ?>
        <div class="split left">
            <div class="centered">
                <h2><?php echo "$lastName, $firstName"; ?> </h2>
                <div style="height:150px; overflow-y: scroll">
                    <table>
                    <tr>
                    <th>Product</th>
                    <th>Price</th>
                    </tr>
                <?php
                    foreach ($names as $name) {
                        echo "<form action='delete_or_edit.php' method='post'>";
                        echo "<tr>";
                        echo "<input type='hidden' name='pid' value='".$name['prodID']."'><td>".$name['productName']."</td><td>".$name['price']."</td><td><button type='submit' name='btnDelete' id='ip1'>Delete</button></td><td><button type='submit' name='btnEdit' id='ip1'>Edit</button></td>";
                        echo "</tr>";
                        echo "</form>";
                        $sum = $sum + $name['price'];
                    }
                    
                ?>
                    </table>
                </div>
                <form action='add_product.php' method='post'>
                    <input type='text' name='productName' id='ip2'>
                    <input type='text' name='price' id='ip2'>
                    <input type='submit' value='Add Product' id='ip1'>
                </form>
                <h2>Total Customer has Spent: $<?php echo $sum; ?></h2>
            </div>
        </div>
        
        <div class="split right">
            <?php
                try {
                    include ('database.php');
                    $rewardQuery = "SELECT * FROM rewards WHERE cusID='".$_SESSION['ID']."'";
                    $statement = $db->prepare($rewardQuery);
                    $statement->execute();
                    $rewards = $statement->fetchAll();
                    $statement->closeCursor();
                } catch (PDOException $e){
                    $error_message = $e->getMessage();
                    include('database_error.php');
                    exit();
                }
            ?>
                
            <div class="centered">
                <h2>Rewards</h2>
                <?php
                    foreach ($rewards as $reward) {
                        echo "<table>";
                        echo "<tr>";
                        echo "<td>$".$reward['reward']." granted</td><td>".$reward['date']."</td>";
                        echo "</tr>";
                        $rewardSum = $rewardSum + $reward['reward'];
                        echo "</table>";
                    }
                ?>
                
                <h2>Towards next reward: $<?php echo ($sum - $rewardSum); ?></h2>
                <?php if (($sum-$rewardSum) >= 200) : ?>
                    <form action='add_reward.php' method='post'>
                        <input type='submit' value='Add Reward' id='ip1'>
                    </form>
                <?php endif ?>
                
                <form action='destroy_session.php' method="post">
                    <input type="submit" value='Save & Search' id='ip1'>
                </form>
            </div>
        </div>
    </body>
</html>

