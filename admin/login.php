<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login — Pay & Park</title>
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card w-100" style="max-width: 400px;">
      <div class="card-header bg-dark text-white">
        <h3 class="mb-0">Admin Login</h3>
      </div>
      <div class="card-body">
        <form class="needs-validation" novalidate action="dashboard.php" method="post">
          <div class="mb-3">
            <label for="adminuser" class="form-label">Username</label>
            <input type="text" class="form-control" id="adminuser" name="username" required>
            <div class="invalid-feedback">Enter username</div>
          </div>
          <div class="mb-3">
            <label for="adminpwd" class="form-label">Password</label>
            <input type="password" class="form-control" id="adminpwd" name="password" required>
            <div class="invalid-feedback">Enter password</div>
          </div>
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../js/script.js"></script>
</body>
</html>
