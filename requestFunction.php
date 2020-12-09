<?php


function validName($name)
{
    return !empty($name);

}
function validzip($zips)
{

    //Check each topping and return false if it's not valid
    return ($zips == "98030" OR  $zips == "98031" OR $zips == "98032" OR $zips == "98042" OR $zips == "98058");



}
//validate email
function validEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//validate the checkbox




//validate the checkbox
function checkbox($checkbox){
    return $checkbox == true;

}
//Validate toppings:  accepts an array of toppings

function validToppings($selectedToppings)

{

    $validToppings = array("utility", "rent", "gas", "clothing", "id", "gas", "food", "other");



    //Check each topping and return false if it's not valid

    foreach($selectedToppings as $selectedTopping) {

        if (!in_array($selectedTopping, $validToppings)) {

            return false;

        }

    }



    //All toppings are valid

    return true;

}