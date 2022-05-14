<?php
session_start();

if ( ! empty( $_POST ) ) {
if ( isset( $_POST['user_name'] ) && isset( $_POST['user_password'] ) ) {
require 'connection.php';
$username = mysqli_real_escape_string($conn,$_POST['user_name']);
$password = mysqli_real_escape_string($conn,$_POST['user_password']);
$query = "SELECT * FROM user WHERE user_name ='$username' and `password`='$password'";
$result = mysqli_query($conn, $query);
if(mysqli_fetch_assoc($result)) {
$_SESSION['user']=$_POST['user_name'];
header("location: home.php");
} else {
echo "Make sure you entered a correct username and password";
header( "refresh:.9;url=login.php" );
}
}
} else { header("location: login.php"); }
?>
