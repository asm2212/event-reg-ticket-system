<?php
require_once __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        unset($_SESSION['error']);
        $_SESSION['user'] = $user;
        header("Location: ../../public/dashboard.php");
        exit();
    } else {
        $_SESSION['error'] = "Invalid email or password.";
        header("Location: ../../public/login.php");
        exit();
    }
}
