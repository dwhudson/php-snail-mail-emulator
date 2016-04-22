<?php 

    session_start();

    $link = mysqli_connect("localhost","root","4Ye^nTOs","mysql");

    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $firstname = filter_input(INPUT_POST,'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST,'lastname', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST,'address', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST,'city', FILTER_SANITIZE_STRING);
    $state = filter_input(INPUT_POST,'state', FILTER_SANITIZE_STRING);
    $zip = filter_input(INPUT_POST,'zip', FILTER_SANITIZE_NUMBER_INT);
    $certifiedmail = filter_input(INPUT_POST,'certifiedmail', FILTER_VALIDATE_BOOLEAN); //refractor boolean
    $textarea = filter_input(INPUT_POST,'textarea', FILTER_SANITIZE_STRING);
    $businessname = filter_input(INPUT_POST,'businessname', FILTER_SANITIZE_STRING);
    
    $datum = new DateTime();   
    $timestamp = $datum->format('Y-m-d H:i:s'); //change sql table use auto timestamp
    
    $sql = "INSERT INTO members (firstname, lastname, address, city, state, zip, isCertified, message, businessname, timestampdelivered) VALUES"
            . "('$firstname','$lastname','$address','$city','$state','$zip','$certifiedmail','$textarea', '$businessname', '$timestamp')";

    mysqli_query($link, $sql);
    $_SESSION['idinserted'] = mysqli_insert_id($link);
  
    if(isset($_POST['submit'])) {
        header("Location: registration.html");
        exit;
    }
    
    mysqli_close($link);