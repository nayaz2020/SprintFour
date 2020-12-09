<?php

/**
 *  login.php
 *  Sarah Mehri
 *  12/1/202
 */

//Turn on error reporting -- this is critical!

ini_set('display_errors', 1);

error_reporting(E_ALL);
//Start session
session_start();

//Initialize variables

$err = false;

$username = "";

//If the form has been submitted

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Get the username and password

    $username = strtolower(trim($_POST['username']));
    $password = trim($_POST['password']);

    //If they are correct
    //Actual username and password are stored in a separate file
    //Should be moved to home directory ABOVE public_html
    require('login-creds.php');

    if ($username == $adminUser && $password == $adminPassword) {
        $_SESSION['loggedin'] = true;
        //Redirect to page the user was on
        if (!isset($_SESSION['page'])) {
            $_SESSION['page'] = 'page1.php';

        }
        header("location: " . $_SESSION['page']);
    }
    //Set an error flag
    $err = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href=styles/involve.css" >
    <style>
        .err {

            color: darkred;
        }

    </style>

</head>


<body class="m-5 p-5  bg-secondary" >


<div class="container">
    <h1>Login Page</h1>

    <form action="#" method="post">
        <div class="form-group">
            <label for="username">Username</label>

            <input type="text" class="form-control" id="username" name="username"
                <?php //echo "value=\"$username\"" ?>
                <?php //echo 'value="'.$username.'"' ?>
                <?php echo "value='$username' " ?>
            >
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>

        <?php

        if ($err) {

            echo '<span class="err">Incorrect login</span><br>';

        }

        ?>

        <!--

        <?php if ($err) : ?>

            <span class="err">Incorrect main</span><br>

        <?php endif; ?>

        -->
        <button type="submit" class="btn btn-dark">Login</button>
    </form>

</div>



<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>