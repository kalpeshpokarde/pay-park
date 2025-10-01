<?php
// php/update_status.php
require_once 'auth.php';
require_once 'config.php';

// Note: In a real system, you'd add admin authentication here!

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['booking_id']) && isset($_GET['status'])) {
  $booking_id = (int)$_GET['booking_id'];
  $status = $_GET['status'];
  
  // Sanitize and validate status: only allow certain values
  $allowed_statuses = ['confirmed', 'cancelled', 'completed', 'pending'];
  if (!in_array($status, $allowed_statuses)) {
      die("Invalid status.");
  }

  $stmt = $pdo->prepare("UPDATE bookings SET status = ? WHERE id = ?");
  $stmt->execute([$status, $booking_id]);
  
  // Redirect back to admin dashboard or managing page
  header("Location: ../admin/dashboard.php?message=status_updated");
  exit;
}

// This file can also handle the general booking status updates from an Admin panel.
