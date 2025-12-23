<?php
require "../config/database.php";

$user_id = $_SESSION['user']['id'];
$ticket_id = $_POST['ticket_id'];
$qty = $_POST['quantity'];

$ticket = $conn->query("SELECT quantity FROM tickets WHERE id=$ticket_id")->fetch_assoc();

if ($ticket['quantity'] >= $qty) {
    $conn->query("INSERT INTO bookings (user_id, ticket_id, quantity)
                  VALUES ($user_id, $ticket_id, $qty)");

    $conn->query("UPDATE tickets SET quantity = quantity - $qty WHERE id=$ticket_id");

    echo "Booking successful!";
} else {
    echo "Not enough tickets available";
}
