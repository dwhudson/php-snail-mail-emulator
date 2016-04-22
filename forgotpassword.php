<?php

    session_start();
    
    $email_address = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if(filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
        echo "$email_address is valid email ";
    } else {
        echo "$email_address is not valid!";
    }
    
    $subject = "Booya you had to reset your stuff!";
    $email_message = "please go here to reset your email. <a href='settings.html'>forgot password</a>";    
    $headers = 'From: webmaster@example.com' . "\r\n" .
       'Reply-To: webmaster@example.com';
  
    if(isset($_POST['submit'])) {
       mail($email_address, $subject, $email_message, $headers);
    }

