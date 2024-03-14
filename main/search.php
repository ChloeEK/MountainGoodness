<!DOCTYPE>
<html>
    <head>
        <title>Customer Search</title>
        <link rel="stylesheet" href="search_page_style.css"/>
    </head>
    <body>
        <form action='add_customer.php' method="post">
            <input type="submit" value='Add Customer' id='ip1'>
        </form>
            <div class='centered'>
                <h2>Search For Customer's Last Name:</h2>
                <form action="search.php" method="post">
                    <input type ="text" name="lastName"
                           value="<?php echo htmlspecialchars($lastName) ?>" id='ip2'>
                    </br>
                    </br>
                    <input type="submit" value="Search" id='ip1' name="btnSearch">
                    <br>
                </form>

                <?php
                    session_start();
                    $lastName = filter_input(INPUT_POST, 'lastName');
                    $search = filter_input(INPUT_POST, 'btnSearch');
                    if (isset($search)) {
                        try {
                            include ('database.php');
                            $searchQuery = "SELECT * FROM customers WHERE lastName LIKE '%".$lastName."%'";
                            $statements = $db->prepare($searchQuery);
                            $statements->execute();
                            $names = $statements->fetchAll();
                            $statements->closeCursor();
                        } catch (PDOException $e){
                            $error_message = $e->getMessage();
                            include('database_error.php');
                            exit();
                        }
                    }


                    foreach($names as $name) {
                        echo "<table>";
                        echo "<tr>";
                        echo "<form action='update_customer.php' method='post'><input type='hidden' name='customerID' value='".$name['ID']."'>";
                        echo "<td>".$name['firstName']." ".$name['lastName']."</td><td><button type='submit' name='btnSelect' id='ip1'>Select</button></td>";
                        echo "</form>";
                        echo "</tr>";
                        echo "</table>";

                    }
                ?>
             
        </div>
    </body>
</html>


