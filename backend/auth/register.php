<?php
require_once __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $password = password_hash($_POST['password'] ?? '', PASSWORD_BCRYPT);

    if (!$email) {
        $_SESSION['error'] = "Invalid email format.";
        header("Location: ../../public/register.php");
        exit();
    }

    // Check for existing user
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
        $_SESSION['error'] = "An account with this email already exists.";
        header("Location: ../../public/register.php");
        exit();
    }

    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Registration successful! Please log in.";
        header("Location: ../../public/login.php");
        exit();
    } else {
        $_SESSION['error'] = "An error occurred during registration.";
        header("Location: ../../public/register.php");
        exit();
    }
}
