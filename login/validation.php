<?php

// Set connection variables
$server = "localhost";
$username = "root";
$password = "";

// Create a database connection
$con = mysqli_connect($server, $username, $password);

mysqli_select_db($con, 'userregistration');
session_start(); {
    $name = $_POST['user'];
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);

    $s = " SELECT * FROM `usertable` WHERE `Email` = '$email' && `Password` = '$pass' ";
    $result = mysqli_query($con, $s);
    $num = mysqli_num_rows($result);
    
    if ($num > 0) {
        $row = mysqli_fetch_array($result); {
            $_SESSION['username'] = $row['Username'];
            // $_SESSION['email']= $email;
            //dd("jhgjh");
            header('location:../user/user.php');
        }
    } else {
        header('location:../login/login.php');
    }
}
;
?>