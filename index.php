<?php 

    session_start();

    $link = mysqli_connect("localhost","root","4Ye^nTOs","mysql");

    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($link, $_POST['lastname']);
    $address = mysqli_real_escape_string($link, $_POST['address']);
    $city = mysqli_real_escape_string($link, $_POST['city']);
    $state = mysqli_real_escape_string($link, $_POST['state']);
    $zip = mysqli_real_escape_string($link, $_POST['zip']);
    $certifiedmail = mysqli_real_escape_string($link, $_POST['certifiedmail']);
    $textarea = mysqli_real_escape_string($link, $_POST['textarea']);
    $businessname = mysqli_real_escape_string($link, $_POST['businessname']);
    
    $datum = new DateTime();
    $timestamp = $datum->format('Y-m-d H:i:s');
    
    $sql = "INSERT INTO members (firstname, lastname, address, city, state, zip, isCertified, message, businessname, timestampdelivered) VALUES"
            . "('$firstname','$lastname','$address','$city','$state','$zip','$certifiedmail','$textarea', '$businessname', '$timestamp')";

    mysqli_query($link, $sql);
    $_SESSION['idinserted'] = mysqli_insert_id($link);
    /*
    if(mysqli_query($link, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
*/
   // 
   // echo 
   // die("id:" . $testvar); 
    
    //die('id: '. $_SESSION['idinserted']);
    //echo "id: " . $_SESSION['idinserted'];
    //echo "id: " . $_SESSION['idinserted']; 
    
    if(isset($_POST['submit'])) {
        header("Location: registration.html");
        exit;
    }
    
    mysqli_close($link);