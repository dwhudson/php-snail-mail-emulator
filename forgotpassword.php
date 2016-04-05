<?php

    session_start();

    $email_address = $_POST['email'];
    $subject = "Booya you had to reset your stuff!";
    $email_message = "please go here to reset your email. <a href='settings.html'>forgot password</a>";    
    $headers = 'From: webmaster@example.com' . "\r\n" .
       'Reply-To: webmaster@example.com';
  
    
    if(isset($_POST['submit'])) {
       mail($email_address, $subject, $email_message, $headers);
    }

