<?php

/* confirmation.php

 * Gets data from apply.php

 * 10/26/2020

 */



// Turn on error reporting

ini_set('display_errors', 1);

error_reporting(E_ALL);
//redirect if the form has not been submited
if(empty($_POST)){
    header("location: apply.php");
}
date_default_timezone_set( 'America/Vancouver');
include ('head.html');
require ('dbcreds.php');
require ('requestFunction.php');
?>

<body>
<div class="container" id="main">



    <!-- Jumbotron header -->

    <div class="jumbotron">
        <h5 id="text"> <a href="index.html"> Home</a> </h5>

        <h1 class="display-4">Welcome to Outreach Kent</h1>

        <p class="lead">Serving the Kent community for more than 30 years!</p>

    </div>



    <h3>Thank you for your request!</h3>
    <h2>Info Summary</h2>
    <?php
    $lname = $_POST['name'];
    //$zipcode = $_POST['zipcode'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $otherRequest = $_POST['otherInfo'];
    $zip = $_POST['zipcode'];


    $isValid = true;
    //validate the zip code
    $checkbox ="";
    if(isset($_POST['checkbox'])&& checkbox($_POST['checkbox']) ) {
        $checkbox = $_POST['checkbox'];

    }
    else{
        if (!empty($_POST['zipcode']) && validzip($_POST['zipcode'])) {
            $zip = $_POST['zipcode'];

        }
        else if(empty($_POST['zipcode'])){
            echo "<p> Zipcode is required</p>";
            $isValid = false;
        }
        else{
            if(!validzip($_POST['zipcode'])){
                echo "<p> Sorry, We do not cover this zip code area. 
                Please check out <a href='fund.php'> other resources</a><br><br> </p>";
                return;


            }


        }
    }
    if(validName($_POST['name'])){
        $lname = $_POST['name'];

    }
    else{
        echo"<p> Full Name is required</p>";
        $isValid = false;
    }
    if (!empty($_POST['email']) || (!empty($_POST['phone']) )) {

        if(!empty($_POST['email']) && validEmail($_POST['email'])){
            $email = $_POST['email'];
        }
        else{
            if(empty($_POST['phone'])) {
                echo "<p> please provide correct email address </p>";
                $isValid = false;
            }
        }
        if(!empty($_POST['phone'])) {
            $phone = $_POST['phone'];
        }
    }
    else{

        echo "<p> please provide email address or phone number(email preferred)</p>";
        $isValid = false;
    }
    // Validate toppings


     $otherRequest = $_POST['otherInfo'];

if(!isset($_POST['toppings'])){
    echo"Please select at least one request";
}
    if (isset($_POST['toppings'])) {


        $toppings = $_POST['toppings'];




        if (!validToppings($toppings)) {

            echo "<p>Go away, evildoer!</p>";

            return; //We've been spoofed; stop processing

        }
        else{
            if(validToppings($toppings) == "other"){
                if(empty($_POST['otherInfo'])){
                    echo"Please specify other request";
                    $isValid = false;
                }
            }
        }

        $toppings = implode(", ", $toppings);



    }




     $checkbox ="";
    if(isset($_POST['checkbox'])&& checkbox($_POST['checkbox']) ){
        $checkbox = $_POST['checkbox'];
        if(!empty($_POST['address']))
        $address = $_POST['address'];

    }
    else{
        if(!isset($_POST['checkbox']) && empty(($_POST['address']))){
            echo"<p> please provide address</p>";
            $isValid = false;
        }

    }


    if (!$isValid) {

        return;

    }

    //Get data from POST array
    $toppings = implode(", ", $_POST['toppings']);


    $fromName = $lname;

    $fromEmail = $email;


    //Print order summary
    if($address == "") {
        $address = "not currently permanent resident";
    }
    if($phone == "") {
        $phone = "not provided";
    }
    if($email == "") {
        $email = "not provided";
    }

    //Prevent sql injection
    $lname = mysqli_real_escape_string($cnxn, $lname);

    $address = mysqli_real_escape_string($cnxn, $address);

    $email = mysqli_real_escape_string($cnxn, $email);

    $phone = mysqli_real_escape_string($cnxn, $phone);

    $toppings = mysqli_real_escape_string($cnxn, $toppings);

    $otherRequest = mysqli_real_escape_string($cnxn, $otherRequest);

    $zip = mysqli_real_escape_string($cnxn, $zip);


//save request to database

    if($toppings == $otherRequest){
       $toppings.$otherRequest;
    }
    $sql = "INSERT INTO request(`name`,`zipcode`,`email`,`phone`,`needs`) 
    VALUES ('$lname', '$zip','$email', '$phone', '$toppings $otherRequest')";
    $success = mysqli_query($cnxn, $sql);
    if(!$success){
        echo "<p> sorry... something went wrong</p>";
        return;
    }

    echo "<p>Name:  $lname</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Address: $address</p>";
   // echo "<p>zipcode: $zipcode</p>";
    echo "<p>Item requested: $toppings $otherRequest</p>";
    echo "<p>Phone: $phone</p>";
    echo "<p>zipcode: $zip</p>";

    //Send email

    $to = "smehri@mail.greenriver.edu";

    $subject = "Pizza Order Placed";

    $message = "Request from:  $lname\r\n";
    $message .= "Email Address:  $email\r\n";
    $message .= "Phone:  $phone\r\n";

    $message .= "Address: $address\r\n ";

    //$message .= "Zipcode:  $zipcode\r\n";

    $message .= "Item requested: $toppings $otherRequest\r\n";


    $headers = "Name: $fromName <$fromEmail>";



    $success = mail($to, $subject, $message, $headers);

    //Check success

    echo $success ? "<p>Your request has been placed.</p><br>" :

        "<p>Sorry... there was a problem.</p><br>";

    ?>

</div>

</body>
</html>
