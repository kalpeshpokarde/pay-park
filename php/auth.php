//Authentication function
<?php
session_start();
require_once 'db.php';

// Check login status
function is_user_logged_in() {
  return isset($_SESSION['user_id']);
}

function get_logged_in_user() {
  global $pdo;
  if (!is_user_logged_in()) return null;
  $stmt = $pdo->prepare("SELECT id, full_name, email FROM users WHERE id = ?");
  $stmt->execute([$_SESSION['user_id']]);
  return $stmt->fetch();
}

// Login or register logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['email']) && isset($_POST['password'])) {
    // login flow
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$_POST['email']]);
    $user = $stmt->fetch();
    if ($user && password_verify($_POST['password'], $user['password_hash'])) {
      $_SESSION['user_id'] = $user['id'];
      header("Location: ../dashboard.php");
      exit;
    } else {
      // invalid login
      echo "Invalid credentials";
      exit;
    }
  }

  if (isset($_POST['full_name'])) {
    // registration flow
    $full = $_POST['full_name'];
    $email = $_POST['email'];
    $pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (full_name, email, password_hash) VALUES (?, ?, ?)");
    $stmt->execute([$full, $email, $pwd]);
    // auto login
    $id = $pdo->lastInsertId();
    $_SESSION['user_id'] = $id;
    header("Location: ../dashboard.php");
    exit;
  }
}

// Logout
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: ../index.html");
  exit;
}
