//payment process
<?php
require_once 'auth.php';
require_once 'db.php';

if (!is_user_logged_in()) {
  header("Location: ../login.html");
  exit;
}

$user = get_logged_in_user();

//  Simulating a basic payment gateway callback
// In real implementation, use POST data and secure webhook tokens

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['booking_id']) && isset($_GET['payment_status'])) {
  $booking_id = (int)$_GET['booking_id'];
  $payment_status = $_GET['payment_status'];

  //  Validate booking ownership
  $stmt = $pdo->prepare("SELECT * FROM bookings WHERE id = ? AND user_id = ?");
  $stmt->execute([$booking_id, $user['id']]);
  $booking = $stmt->fetch();

  if (!$booking) {
    die("Invalid booking or not authorized.");
  }

  //  If payment is successful, update the booking
  if ($payment_status === 'success') {
    $stmt = $pdo->prepare("UPDATE bookings SET status = 'confirmed' WHERE id = ?");
    $stmt->execute([$booking_id]);

    // Optional: log payment success, etc.
    header("Location: ../dashboard.php?payment=success");
    exit;
  } else {
    // Payment failed or cancelled
    $stmt = $pdo->prepare("UPDATE bookings SET status = 'cancelled' WHERE id = ?");
    $stmt->execute([$booking_id]);

    header("Location: ../dashboard.php?payment=failed");
    exit;
  }
} else {
  die("Invalid payment callback.");
}
