<?php

/**
 *  page1.php
 *  Sarah Mehri
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


include('../dbcreds.php');

?>

<!DOCTYPE html>

<html lang="en">
<head>

    <meta charset="UTF-8">

    <title>Data Summary</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../styles/apply.css" >

</head>
<body>

<div class="container" id="main">
<!-- navbar -->
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

    <h3>Request Summary</h3>
    <br>
    <table id="request-table" class="display table-responsive" style="width: 100%">
        <thead>
        <tr>
            <td>Request ID</td>
            <td>TimeStamp</td>
            <td>Name</td>
            <td>Zipcode</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Needs</td>

        </tr>
        </thead>
        <tbody>

        <?php
        $sql = "SELECT * FROM `request` ORDER BY `request_date` DESC";
        $result = mysqli_query($cnxn, $sql);

        foreach ($result as $row) {
            //var_dump($row);
            $request_id = $row['request_id'];
            $name = $row['name'];
            $zip = $row['zipcode'];
            $email = $row['email'];
            $phone = $row['phone'];
            $needs = $row['needs'];
            $request_date = date("M d, Y g:i a", strtotime($row ['request_date']));
            echo "<tr>";
            echo "<td> $request_id </td>";
            echo "<td> $request_date </td>";
            echo "<td> $name </td>";
            echo "<td> $zip </td>";
            echo "<td> $email </td>";
            echo "<td> $phone </td>";
            echo "<td> $needs </td>";

            echo "</tr>";
        }

        ?>
        </tbody>
    </table>

</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>

    $('#request-table').DataTable( {
        "order": [[ 1, "desc" ]]


    } );

</script>


</body>
</html>