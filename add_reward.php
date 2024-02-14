<?php
    session_start();
    //$newReward = filter_input(INPUT_POST, 'newReward');
    //$date = filter_input(INPUT_POST, 'date');
    $newReward = 200;
    $date = date("Y/m/d");

    
    try {
        include ('database.php');
        $addQuery = "INSERT INTO rewards (cusID, reward, date) VALUES ('".$_SESSION['ID']."', '".$newReward."', '".$date."')";
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
