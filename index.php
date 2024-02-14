
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="main.css"/>
    </head>
    <body>
        <div class='centered'>
            <h1>MGR Log In</h1>
            <form method="post">
                <label>Username:</label>
                <input type="text" name="loginUsername" id='ip1'>
                </br>
                <label>Password:</label>
                <input type="text" name="loginPassword" id='ip1'>
                </br>
                </br>
                <input type='submit' value='Login' name='login' id='ip2'>
            </form> 
            <?php
                $loginUser = filter_input(INPUT_POST, 'loginUsername');
                $loginPassword = filter_input(INPUT_POST, 'loginPassword');

                if ($loginUser=='MGR' && $loginPassword=='password')
                {
                    header('Location:search.php');
                }
            ?>
        </div>
</html>
