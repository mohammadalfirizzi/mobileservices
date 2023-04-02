<?php
include 'connect.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = password_hash($_POST['password_confirm'], PASSWORD_DEFAULT);

$tambah = mysqli_query($conn, "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
