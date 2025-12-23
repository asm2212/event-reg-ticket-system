<?php
require "../config/database.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user;
    header("Location: ../../public/dashboard.php");
} else {
    echo "Invalid credentials";
}
