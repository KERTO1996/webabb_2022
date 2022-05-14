<?php
require 'connection.php';
if (isset($_POST['register'])) {
$userName = $_POST['user_name'];
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$email = $_POST['email'];
$userPassword = $_POST['password'];
$phoneNo = $_POST['phone_no'];
$gender = $_POST['gender'];
$dateBirth = date('y-m-d', strtotime($_POST['date_birth']));
$address = $_POST['address'];
$query = "INSERT INTO user (user_name, first_name ,last_name, email, `password`, phone_no, gender,date_birth, `address`)
VALUES ('$userName', '$firstName', '$lastName', '$email', '$userPassword', '$phoneNo', '$gender', '$dateBirth', '$address')";
echo "<br>";
$result = mysqli_query($conn ,$query);
if ($result){ require 'login.php'; } else{ echo "Error " . mysqli_error($conn); } } else{ header( "location:reg.php" ); }
?>