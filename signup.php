<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modern Signup Page</title>
  <link rel="stylesheet" href="styles\login.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

  <div class="login-container">
    <div class="login-box">
      <h2>Create an Account</h2>
      <p>Join us and start your journey</p>

      <form action="signupINC.php" method="POST" enctype="multipart/form-data">
        <div class="input-group">
          <label for="name">User Name</label>
          <input type="text" id="name" name="name" placeholder="Enter your full name" required>
        </div>

        <div class="input-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Create a password" required>
        </div>

        <div class="input-group">
          <label for="confirm-password">Confirm Password</label>
          <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
        </div>

        <div class="input-group">
          <label for="confirm-password">Caption</label>
          <input type="text" id="confirm-password" name="caption" placeholder="Enter your Caption" >
        </div>

        <div class="input-group">
        <label for="profile-pic">Upload a profile picture</label>
        <input type="file" id="profile-pic" name="image">
        </div>

        <button type="submit" class="btn" name="submit">Sign Up</button>
      </form>

      <p class="signup-text">Already have an account? <a href="login.php">Login here</a></p>
    </div>
  </div>

</body>
</html>
