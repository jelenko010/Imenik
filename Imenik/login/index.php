<?php
session_start();
include('../include/db.php');
$username = trim($_POST['username']);
$password = md5($_POST['password']);
if(strlen($username) > 0 && strlen(trim($_POST['password'])) > 0){
    $check = mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND password='$password' ");
    if(mysqli_num_rows($check)==1){
        //fetch details
        $row = mysqli_fetch_assoc($check);
        $_SESSION['UID'] = $row['id'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['last_login'] = $row['last_login'];
        if($_SESSION['last_login']==""){
            $_SESSION['last_login'] = "Never";
        }
        //last login update
        $dateTime = date('d F Y h:i A');
        mysqli_query($con,"UPDATE users SET last_login='$dateTime' WHERE username='$username' ");
        //success
        echo '<p style="color: #4F8A10;font-weight: bold;">Login Successful. Redirecting...</p>';
    }
    else{
        echo '<p style="color: #D8000C;font-weight: bold;">Invalid Credentials.</p>';
    }
}
else{
    echo '<p style="color: #D8000C;font-weight: bold;">Please Fill All The Details.</p>';
}
?>