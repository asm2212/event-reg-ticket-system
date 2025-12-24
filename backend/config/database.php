<?php
$conn = new mysqli("localhost", "event_user", "event_password_123!", "event_system");

if ($conn->connect_error) {
    die("Database connection failed");
}
session_start();
?>