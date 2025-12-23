<?php
$conn = new mysqli("localhost", "root", "", "event_system");

if ($conn->connect_error) {
    die("Database connection failed");
}
session_start();
?>