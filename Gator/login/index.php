<?php

/**
 *  index.php
 *  Namet & Sarah
 *  12/1/202
 */


//Turn on error reporting -- this is critical!

ini_set('display_errors', 1);

error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['loggedin'])) {

    //Store the page that I'm currently on in the session
    $_SESSION['page'] = $_SERVER['SCRIPT_URI'];
    //Redirect to main
    header("location: login.php");

}
include('../dbcreds.php')
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/apply.css" >

</head>

<body>

<div class="container" id="main">

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="../index.html">Kent Outreach</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page1.php">Data Summary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class = "admin">
        <div id = "title-div">
    <h2 >Admin Page</h2>
    <p>This page contains super-sensitive data</p>
        </div>
    <form method="post">
        <div class="form-group text-center">
            <?php
            //if clicked the button and toggle
            if(isset($_POST['toggle'])){
                //change the button
                $sql = "UPDATE toggling SET button = !button";

                mysqli_query($cnxn, $sql);
            }

            //get the toggling form
            $sql = "SELECT * FROM toggling";
            $result = mysqli_query($cnxn, $sql);

            foreach ($result as $row) {
                $button = $row['button'];
            }

            //If toggling is on or it is true
            if ($button){
                echo "<div class=\"alert alert-success\" role=\"alert\">";
                echo " <h3 class=\" h mb-0\">The form is ENABLED successfully<i class=\"fa fa-check\" aria-hidden=\"true\"></i></h3>";
                echo "</div>";
                echo "<button type=\"submit\" class=\"btn btn btn-secondary\" name=\"toggle\"\">Disable Apply Form</button>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
            }
            else{
                echo "<div class=\"alert alert-secondary\" role=\"alert\">";
                echo " <h3 class=\" h mb-0\">The form is DISABLED successfully<i class=\"fa fa-close\" aria-hidden=\"true\"></i></h3>";
                echo "</div>";
                echo "<button type=\"submit\" class=\"btn btn-success\" name=\"toggle\">Enable Apply Form</button>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
            }?>
        </div>
    </form>
    </div>
</div>


<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>
</html>