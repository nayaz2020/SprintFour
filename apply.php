
<?php
include('head.html');
require('dbcreds.php');


//get the result of our table
$sql = "SELECT * FROM toggling";

$result = mysqli_query($cnxn, $sql);
foreach ($result as $row){
    $button = $row['button'];
}

//if the button row is true or 1, appear the form
if($button){
    include("form.php");
}
else{
include ("fund.php");


}
?>