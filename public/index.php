<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body class="container mt-5">

<h2>Available Events</h2>

<?php
require "../backend/config/database.php";
$result = $conn->query("SELECT * FROM events");
while ($event = $result->fetch_assoc()):
?>

<div class="card mb-3">
  <div class="card-body">
    <h5><?= $event['title'] ?></h5>
    <p><?= $event['venue'] ?> | <?= $event['event_date'] ?></p>
    <a href="event-details.php?id=<?= $event['id'] ?>" class="btn btn-primary">
      View Details
    </a>
  </div>
</div>

<?php endwhile; ?>

</body>
</html>
