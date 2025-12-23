<?php
require "../backend/config/database.php";
$id = $_GET['id'];

$event = $conn->query("SELECT * FROM events WHERE id=$id")->fetch_assoc();
$tickets = $conn->query("SELECT * FROM tickets WHERE event_id=$id");
?>

<h2><?= $event['title'] ?></h2>
<p><?= $event['description'] ?></p>

<form action="../backend/tickets/book.php" method="POST">
  <input type="hidden" name="event_id" value="<?= $id ?>">

  <select name="ticket_id" class="form-control">
    <?php while ($t = $tickets->fetch_assoc()): ?>
      <option value="<?= $t['id'] ?>">
        <?= $t['type'] ?> - $<?= $t['price'] ?>
      </option>
    <?php endwhile; ?>
  </select>

  <input type="number" name="quantity" min="1" class="form-control mt-2">
  <button class="btn btn-success mt-2">Book Ticket</button>
</form>
