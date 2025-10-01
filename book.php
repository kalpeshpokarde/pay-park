//Booking slot for parking
<?php
require_once 'db.php';
require_once 'auth.php';

if (!is_user_logged_in()) {
  header("Location: ../login.html");
  exit;
}

$user = get_logged_in_user();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $category = $_POST['category'];
  $details = $_POST['details'];
  $date = $_POST['date'];
  $stmt = $pdo->prepare("INSERT INTO bookings (user_id, category, details, booking_date) VALUES (?, ?, ?, ?)");
  $stmt->execute([$user['id'], $category, $details, $date]);
  header("Location: ../dashboard.php");
  exit;
}
