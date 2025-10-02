<?php
$history = [
  ['slot'=>'Slot A', 'date'=>'2025-09-25', 'status'=>'Paid'],
  ['slot'=>'Slot B', 'date'=>'2025-09-26', 'status'=>'Cancelled'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Booking History</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'php/user_nav.php'; ?>
<div class="container mt-5">
  <h3>Booking History</h3>
  <table class="table table-striped">
    <thead><tr><th>Slot</th><th>Date</th><th>Status</th></tr></thead>
    <tbody>
      <?php foreach($history as $item): ?>
      <tr>
        <td><?= $item['slot'] ?></td>
        <td><?= $item['date'] ?></td>
        <td><?= $item['status'] ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
