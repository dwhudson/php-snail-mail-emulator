<?php
    session_start();
    $lastIdInsert = $_SESSION['idinserted'];
    $link = mysqli_connect("localhost","root","4Ye^nTOs","mysql");
    
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    
   // echo "email ". $email_address;
    /*
    if(filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
        echo "$email_address is valid email ";
    } else {
        echo "$email_address is not valid!";
    }
    */
    $email_address = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    //preg_match() could be used here in addition to regex
    $password1 = mysqli_real_escape_string($link, $_POST['password1']);
    $password2 = mysqli_real_escape_string($link, $_POST['password2']);
    
    $updateUser = "UPDATE members SET email = '$email_address', password1 = '$password1', password2 = '$password2' WHERE id = '$lastIdInsert' ";
    $userExists = "SELECT * FROM members WHERE email = '$email_address' ";
    
    $result = mysqli_query($link, $userExists);
    //echo "result: ". $result;
    $count = mysqli_num_rows($result);
   // echo "count" . $count;
    $_SESSION['loggedin_user'] = $email_address;  
    
    if(isset($_POST['submit'])) {
        
        if($count > 0) {
            echo "User already exists in db! <a href='forgotpassword.html'>forgot password</a>";
        } else if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 1 && $_SESSION['loggedin_user'] === $email_address) {
            header("Location: dashboard.html");
            exit;
        } else { 
            //($_POST["password1"] == $_POST["password2"]) {    
            mysqli_query($link, $updateUser);
            header("Location:login.html");
            exit;
        }
        
    }
    
    mysqli_close($link);
    
    
    
    
