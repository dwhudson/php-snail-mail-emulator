<?php
    session_start();

$link = mysqli_connect("localhost","root","4Ye^nTOs","mysql");

    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $sql = "UPDATE members SET password1 = '$password1' and password2 = '$password2' WHERE email = '$email' ";
    
    $password1 = mysqli_real_escape_string($link, $_POST['password1']);
    $passwor2 = mysqli_real_escape_string($link, $_POST['password2']);
    
    $email = 'test@test.com';
    
    if(isset($_POST['submit'])) {
        if($password1 == $password2) {
             mysqli_query($link, $sql);
        }
    }
        
        
        
   
//$sql = "SELECT * FROM members WHERE email = '$email_address' and password = '$password'";



mysqli_close($link);
