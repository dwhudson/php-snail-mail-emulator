<?php

    $link = mysqli_connect("localhost","root","4Ye^nTOs","mysql");
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    //preg_match() could be used here in addition to regex
    $password = mysqli_real_escape_string($link, $_POST['password']);

    $email_address = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
   
    $sql = "SELECT * FROM members WHERE email = '$email_address' and password1 = '$password'";
    $result = mysqli_query($link, $sql);

    $count = mysqli_num_rows($result);

      if(isset($_POST['submit'])) {
          
        if($count == 1) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $email_address;
        }
      }
    
    mysqli_close($link);

