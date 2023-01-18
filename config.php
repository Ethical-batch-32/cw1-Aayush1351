
<?php
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
?>