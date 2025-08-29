<?php
include "koneksi_akun.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <style>
    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f7f7f7;
    }
    .login-container {
      width: 100%;
      max-width: 400px;
      padding: 2rem;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .login-container h2 {
      margin-bottom: 1.5rem;
    }
    .form-control {
      margin-bottom: 1rem;
    }
    .btn-primary {
      width: 100%;
    }
    @media (max-width: 767.98px) {
      .login-container {
        padding: 1.5rem;
      }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2 class="text-center">Login</h2>
    <form method="POST" action="process_login.php">
      <!-- Username Input -->
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class= "form-control" id="username" name="username" placeholder="Enter your username" required />
      </div>
      <!-- Password Input -->
      <div class="mb-3">
        <label for="password" name="password">Password</label>
        <input type="password" class="form-control" id="password" name= "password" placeholder="Enter your password" required />
      </div>
      <!-- Login Button with Link -->
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Login</=>
      </div>
      <!-- Forgot Password Link -->
      <div class="text-center mt-3">
        <a href="#">Forgot Password?</a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
