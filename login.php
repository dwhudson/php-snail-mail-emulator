<?php

//$db_name="mysql";
//$tbl_name="members";


$link = mysqli_connect("localhost","root","4Ye^nTOs","mysql");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$password = mysqli_real_escape_string($link, $_POST['password']);
$email_address = mysqli_real_escape_string($link, $_POST['email']);

$sql = "SELECT * FROM members WHERE email = '$email_address' and password1 = '$password'";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

if($count == 1) {
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $email_address;
}
/*
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
*/
mysqli_close($link);


 /*is logged in code

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "Welcome" . $_SESSION['username'] . "!";
} else {
    echo "Please go here.";
}

$date = new DateTime();
echo $date->format('U = Y-m-d H:i:s') . "\n";

$date->setTimestamp(1171502725);
echo $date->format('U = Y-M-d H:i:s') . "\n";

$timestamp = "The time is: " .time();
echo $timestamp;
*/