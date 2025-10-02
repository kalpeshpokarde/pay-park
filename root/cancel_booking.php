//Cancelation booking
<?php
include("config.php");
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];
    $user_id = $_SESSION['user_id'];

    // Ensure the booking belongs to the user
    $check_query = "SELECT * FROM bookings WHERE id = $booking_id AND user_id = $user_id";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $update_query = "UPDATE bookings SET status = 'Cancelled' WHERE id = $booking_id";
        if (mysqli_query($conn, $update_query)) {
            header("Location: booking_history.php?message=Booking cancelled successfully");
        } else {
            echo "Error cancelling booking.";
        }
    } else {
        echo "Invalid booking ID or unauthorized access.";
    }
} else {
    echo "No booking ID provided.";
}
?>
