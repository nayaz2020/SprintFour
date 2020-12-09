<?php


function validName($name)
{
    return !empty($name);

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



function validLinkIn($linkedin)
{
    $pattern = "/http/i";
    $pattern2 = "/linkedin.com/i";

    return !empty($linkedin) && preg_match($pattern, $linkedin)
        && preg_match($pattern2, $linkedin);
}
//validate the checkbox
function checkbox($checkbox){
    return $checkbox == true;

}
//validate the meet
function validMeet($meet){
    return $meet != 'none';
}
function validOther($meet)
{
    return $meet == 'other';

}
