
<?php
require_once 'database.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles\edit.css">
  <title>Profile Page</title>
  
</head>
<body>
  <div class="container">
    <!-- Back Arrow -->
    <a href="javascript:history.back()" class="back-arrow">
      ← <span>Go Back</span>
    </a>

    <!-- Profile Section -->
    <div class="profile-section">
      <img src="<?php echo 'dpImages/'.$_SESSION['dp'] ?>"  alt="User Profile">
      <h3>Name: <?php echo $_SESSION['name']; ?></h3>
      <p>Email: <?php echo $_SESSION['email']; ?></p>

      <form method="POST" action="editINC.php">
      <button class="delete">Delete Account</button>
</form>
    </div>

    <!-- Form Section -->
    <form method="POST" action="editINC.php" enctype="multipart/form-data">
      <label for="name">User Name</label>
      <input type="text" id="name" name="name" placeholder="Adeesha Harshana" value="<?php echo $_SESSION['name']; ?>">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="adeeshaharshana@gmail.com" value="<?php echo $_SESSION['email']; ?>" readonly>
      <label for="vehicle">Password</label>
      <input type="password" id="vehicle" name="pwd" placeholder="abc-123" value="<?php echo $_SESSION['password']; ?>">
      <label for="name">Caption</label>
      <input type="text" id="name" name="caption"  value="<?php echo isset($_SESSION['caption']) ? $_SESSION['caption'] : '';?>">
      
      <label for="image">Upload a profile picture</label>
      <input type="file" id="image" name="image">
      <button type="submit" name="submit">Save Changes</button>
    </form>
  </div>
</body>
</html>
