<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../utils/auth.php';
check_auth();

$user_id = $_SESSION['user']['id'];
$bookings = [];

$sql = "SELECT 
            e.title, e.event_date, 
            t.type, t.price, 
            b.quantity, b.booked_at
        FROM bookings b
        JOIN tickets t ON b.ticket_id = t.id
        JOIN events e ON t.event_id = e.id
        WHERE b.user_id = ?
        ORDER BY b.booked_at DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    $bookings = $result->fetch_all(MYSQLI_ASSOC);
}
