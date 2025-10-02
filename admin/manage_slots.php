<?php
// Load slots
$slots = [
  ['id'=>1, 'name'=>'Slot A', 'price'=>50],
  ['id'=>2, 'name'=>'Slot B', 'price'=>75],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manage Slots</title>
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container mt-5">
  <h3>Parking Slots</h3>
  <table class="table table-striped">
    <thead><tr><th>ID</th><th>Name</th><th>Price</th><th>Action</th></tr></thead>
    <tbody>
      <?php foreach($slots as $s): ?>
      <tr>
        <td><?= $s['id'] ?></td>
        <td><?= htmlspecialchars($s['name']) ?></td>
        <td>₹<?= number_format($s['price'],2) ?></td>
        <td>
          <a href="manage_slots.php?edit=<?= $s['id'] ?>" class="btn btn-sm btn-info">Edit</a>
          <a href="manage_slots.php?delete=<?= $s['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <a href="manage_slots.php?action=add" class="btn btn-primary">Add New Slot</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../js/script.js"></script>
</body>
</html>
