<?php
    session_start();
    $lastIdInsert = $_SESSION['idinserted'];
    $link = mysqli_connect("localhost","root","4Ye^nTOs","mysql");
    
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    $email_address = mysqli_real_escape_string($link, $_POST['email']); //filter_input(INPUT_POST, 'email')
    $password1 = mysqli_real_escape_string($link, $_POST['password1']);
    $password2 = mysqli_real_escape_string($link, $_POST['password2']);
    
    $updateUser = "UPDATE members SET email = '$email_address', password1 = '$password1', password2 = '$password2' WHERE id = '$lastIdInsert' ";
    $userExists = "SELECT * FROM members WHERE email = '$email_address' ";
    $result = mysqli_query($link, $userExists);
    $count = mysqli_num_rows($result);
    
   // $sql = "INSERT INTO members (email, password1, password2) VALUES ('$email_address','$password1','$password2')";
    
    $_SESSION['loggedin_user'] = $email_address;  
    
    if(isset($_POST['submit'])) {
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 1) {
            header("Location: dashboard.html");
            exit;
        } else if($count > 0) {
            echo "User already exists in db! <a href='forgotpassword.html'>forgot password</a>";
        } else if($_POST["password1"] == $_POST["password2"]) {
            
            mysqli_query($link, $updateUser);
            
            /*
            if(mysqli_query($link, $updateUser)){
                echo "Records added successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
            */
            header("Location:login.html");
            exit;
            
        } else {
            echo "Didn't account for this scenario!";
        }
        
        
   
        
    }
    
    mysqli_close($link);
    
    
    
    
