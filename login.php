<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modern Login Page</title>
  <link rel="stylesheet" href="styles\login.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

  <div class="login-container">
    <div class="login-box">
      <h2>Welcome Back</h2>
      <p>Please login to your account</p>
      
      <form action="loginINC.php" method="POST">
        <div class="input-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>

        <div class="options">
          <label>
            <input type="checkbox" name="remember">
            Remember me
          </label>
          <a href="#">Forgot password?</a>
        </div>

        <button type="submit" class="btn" name="submit">Login</button>
      </form>

      <p class="signup-text">Don't have an account? <a href="signup.php">Sign up here</a></p>
    </div>
  </div>

</body>
</html>
