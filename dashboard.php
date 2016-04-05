<?php
    session_start();

$link = mysqli_connect("localhost","root","4Ye^nTOs","mysql");
 
$loggedinuser = $_SESSION['loggedin_user'];

    if($link === false){
       die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $sql = "SELECT firstname, lastname, businessname, address, city, state, zip, isCertified, timestampdelivered FROM members WHERE email = '$loggedinuser'";
    
    $result = mysqli_query($link, $sql);
    
    echo '<table id="dashboard">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Name</th>';
    echo '<th>Address</th>';
    echo '<th>isCertifiedMail</th>';
    echo '<th>timestamp delivered</th>';
    echo '</tr>';
    echo '</thead>';  
    echo '<tbody>';
    
    while($row = mysqli_fetch_assoc($result)) {
        echo "" . $row['address'];
        echo "" . $row['state'];
    }
    
   echo '</tbody>'; 
   echo '</table>';
   
   mysqli_close($link);
   
    /* 
              <tr>
                <td>Body content 1</td>
                <td>Body content 2</td>
                <td>Body content 3</td>
                <td>Body content 4</td>
              </tr>
    
     
     *      */