<?php
require "../config/database.php";

$name = htmlspecialchars($_POST['name']);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $password);

if ($stmt->execute()) {
    header("Location: ../../public/login.php");
}
