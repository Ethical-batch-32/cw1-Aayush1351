<?php

// Set connection variables
$server = "localhost";
$username = "root";
$password = "";

// Create a database connection
$con = mysqli_connect($server, $username, $password);

mysqli_select_db($con, 'userregistration');

// Check for connection success
if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}
session_start();
$name = $_POST['user'];
$email = $_POST['email'];
$pass = md5($_POST ['pass']);
$cpass = md5($_POST['cpass']);

// To ensure that there is no multiple similar names 

$s = " SELECT * FROM `usertable` WHERE `Username` = '$name'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

// To ensure that there is no similar multiple emails

$emailquery = " SELECT * FROM `usertable` WHERE `Email` = '$email'";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);

if ($num >0) {
    echo "Username Already Taken";
}
elseif ($emailcount > 0) {
    echo "Email already exists";
}
else {
    if ($pass === $cpass) {
        $reg = " INSERT INTO `usertable`(`Username`, `Email`, `Password`, `CPassword`) VALUES('$name','$email', '$pass', '$cpass')";

        $iquery = mysqli_query($con, $reg);

        if ($iquery) {

            header('location:login.php');
        }
            else {

                header('location:login.php');

            }
    }
    
    else
        {
            echo "The passwords are not matching";
    }

}

 
?>

