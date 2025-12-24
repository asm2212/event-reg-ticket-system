<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function check_auth($role = null) {
    if (!isset($_SESSION['user'])) {
        header("Location: /public/login.php");
        exit();
    }
    if ($role && (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== $role)) {
        http_response_code(403);
        die("Forbidden: You don't have permission to access this page.");
    }
}
