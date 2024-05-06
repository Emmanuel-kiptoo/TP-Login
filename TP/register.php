<?php

include ('connect.php');

if(isset($_POST['signUp'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];
    $password = md5('password');
    $cpass = $_POST['cpass'];
    $cpass = md5('cpass');

    $checkEmail="SELECT * From users where email='$email'";
    $result=$conn->query($checkEmail);
    if($result->num_rows>0){
        echo "Email Address Exists";
    }else{
        $insertQuery="INSERT INTO users(firstname, lastname, email, phonenumber, password, cpass)VALUES ('$firstname', '$lastname', '$email', '$phonenumber', '$password', '$cpass')";
            if($conn->query($insertQuery)==TRUE){
                header("location: index.php");
            }else{
                echo "Error:".$conn->error;
            }
            

    }
}
if(isset($_POST['signIn'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5('password');

    $sql="SELECT * FROM users WHERE email='$email' and password='$password'";
    $results=$conn->query($sql);
    if($results->num_rows>0){
        session_start();
        $row=$results->fetch_assoc();
        $_SESSION['email']=$row['email'];
        header("location: homepage.php");
        exit();
    }else{
        echo "Not found, Incorrect Email or Password";
    }
}
?>