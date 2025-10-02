<?php
$reports = [
  ['id'=>1, 'user'=>'Alice', 'slot'=>'Slot A', 'date'=>'2025-09-25', 'status'=>'Paid'],
  ['id'=>2, 'user'=>'Bob', 'slot'=>'Slot B', 'date'=>'2025-09-26', 'status'=>'Cancelled'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Booking Reports</title>
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container mt-5">
  <h3>Booking Reports</h3>
  <table class="table table-bordered">
    <thead><tr><th>#</th><th>User</th><th>Slot</th><th>Date</th><th>Status</th></tr></thead>
    <tbody>
      <?php foreach($reports as $r): ?>
      <tr>
        <td><?= $r['id'] ?></td>
        <td><?= $r['user'] ?></td>
        <td><?= $r['slot'] ?></td>
        <td><?= $r['date'] ?></td>
        <td><?= $r['status'] ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../js/script.js"></script>
</body>
</html>
