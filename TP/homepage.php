<?php
session_start();
include ("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage landing</title>
</head>
<body>
    <div class="" style="text-align:center; padding:15%; ">
    <p style= "font-size:50px; font-weight:bold;">
    hello <?php  
    if(isset($_SESSION['email'])){
        $email=$_SESSION['email'];
        $query=mysqli_query($conn, "SELECT users. * FROM users WHERE users.email='$email'");
        while($row=mysqli_fetch_array($query)){
            echo $row['firstname'].''.$row['lastname'];
        }
    }
    ?> 
    </p>
    <a href="logout.php">Logout</a>
    </div>
</body>
</html>