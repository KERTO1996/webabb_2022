<?php
session_start();
if(isset($_POST['text'],$_POST['post_id'],$_SESSION['user'])) {
require 'connection.php';
$user = $_SESSION['user'];
$text = htmlspecialchars($_POST['text']);
$post_id = $_POST['post_id'];
$query = "INSERT INTO comments (post_id,user_name_comm,text) VALUES ($post_id,'$user','$text')";
mysqli_query($conn, $query);
}
?>