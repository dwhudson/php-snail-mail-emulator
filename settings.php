<?php
    session_start();

    $link = mysqli_connect("localhost","root","4Ye^nTOs","mysql");

    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $sql = "UPDATE members SET password1 = '$password1' and password2 = '$password2' WHERE email = '$email' ";
    //preg_match() could be used here in addition to regex
    $password1 = mysqli_real_escape_string($link, $_POST['password1']);
    $passwor2 = mysqli_real_escape_string($link, $_POST['password2']);
    
    //$_SESSION['loggedin']
    $email = 'test@test.com';
    
    if(isset($_POST['submit'])) {
        if($password1 == $password2) {
             mysqli_query($link, $sql);
        }
    }
     
    mysqli_close($link);
