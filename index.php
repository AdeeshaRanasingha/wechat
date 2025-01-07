<?php

  require_once 'database.php';
  session_start();

  if (!isset($_SESSION["email"])) {
    header("Location: login.php");
}
    
?>

<?php

// Get the user to chat with from the URL
if (isset($_GET['chat_with'])) {
    $chat_with = mysqli_real_escape_string($conn, $_GET['chat_with']);

    if($chat_with != 'hollyshit'){

      

        // Create table name based on the two users
      $table_name =  $_SESSION['name'] . '_' . $chat_with;

      

      // Check if the table already exists
      $check_table = "SHOW TABLES LIKE '$table_name'";
      $result = mysqli_query($conn, $check_table);

      if (mysqli_num_rows($result) == 0) {

        $table_name = $chat_with . '_' . $_SESSION['name'];
        $check_table = "SHOW TABLES LIKE '$table_name'";
        $result = mysqli_query($conn, $check_table);

        if (mysqli_num_rows($result) == 0){
            // Create a new chat table if it doesn't exist
          $create_table_query = "
          CREATE TABLE $table_name (
              ID INT AUTO_INCREMENT PRIMARY KEY,
              name VARCHAR(50),
              message VARCHAR(50),
              email VARCHAR(10),
              timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
          )
      ";
      mysqli_query($conn, $create_table_query);
        }

          
      }

      
    }
    else{
      $table_name='chats';
    }

    

}
else if($_SESSION['time']==1){
  $table_name='chats';
  $_SESSION['time']++;
}
else{
  $table_name=$_SESSION['table_name'];
}

$_SESSION['table_name']=$table_name;
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WECHAT</title>
  <link rel="stylesheet" href="styles\index.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/9e7cd11b0c.js" crossorigin="anonymous"></script>
</head>
<body>



  <div class="chat-container">
    <aside class="sidebar">
      <div class="profile">
        <img src="<?php echo 'dpImages/'.$_SESSION['dp'] ?>" alt="User Profile" style="width: 100px; height: 100px; border-radius: 50%;">
        <h3><?php echo $_SESSION['name']; ?></h3>
        <button class="toggle-sidebar-btn" onclick="toggleSidebar()"> ☰ </button>	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;

        <i class="fa-solid fa-pen" onclick='window.location.href = "edit.php"'></i>

        
      </div>
      <ul class="contact-list">

      <?php
        $query = "SELECT * FROM users";
        $query_run = mysqli_query($conn, $query);

        
        //displaying details
        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) 
            {
              if($_SESSION['name'] == $row['name']){
                continue;
              }

              
                ?>
                    
                    <li class="contact active" onclick='redirect("<?php echo $row['name']; ?>")'>
                    <img src="<?php echo 'dpImages/'.$row['file'] ?>" alt="User Profile" style="width: 40px; height: 40px; border-radius: 50%;">
                    <div class="contact-info">
                      <h4><?php echo $row['name']; ?></h4>
                      <p><?php echo $row['caption']; ?></p>
                    </div>
                  </li>


                    
                <?php

              
        }
       } else {
            echo "<tr><td colspan='8'>No record found</td></tr>";
        }
        ?>

                  <li class="contact active" onclick='redirect("hollyshit")'>
                    <img src="dpImages\WhatsApp Image 2024-11-20 at 22.44.11_804062ca.jpg" alt="Contact" style="width: 40px; height: 40px; border-radius: 50%;">
                    <div class="contact-info">
                      <h4>Holly SHIT</h4>
                      <p>&#10084;&#65039; &#128420;</p>
                    </div>
                  </li><br><br>

                  <form action="chat.php" method="POST">
                  
                    
                    
                    <button class="delete-account-btn" name="logout">Logout</button>
                      
                    </form>
                  
        <!-- Add more contacts here -->
      </ul>
    </aside>

    <main class="chat-main">
      <header class="chat-header">
        <h2><?php echo $_SESSION['table_name'] ?></h2> <button class="toggle-sidebar-btn" onclick="toggleSidebar()">☰</button>
      </header>

      
      <div class="chat-messages">
        
        <?php
        $table_name = $_SESSION['table_name'];
        $query = "SELECT * FROM $table_name";
        $query_run = mysqli_query($conn, $query);

        
        //displaying details
        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) 
            {
              if($_SESSION['name'] == $row['name']){

              
                ?>
                    
                    <div class='message sent'>
                    <p><?php echo $row['message']; ?></p>
                    </div>
                    
                <?php

              }
              else{
                ?>
                    <p><?php echo $row['name']; ?> :</p>
                    <div class="message received">
                    <p><?php echo $row['message']; ?></p>
                    </div>
                    
                <?php
              }
            }
        } else {
            echo "<tr><td colspan='8'>No record found</td></tr>";
        }

        // Update the last known message ID after displaying new messages
        $query = "SELECT MAX(ID) AS latest_message_id FROM chats";

        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
        $row = mysqli_fetch_assoc($query_run);
        $_SESSION['last_known_message_id'] = $row['latest_message_id'];
        }

        ?>
        
        
        <!-- Add more messages -->
      </div>
      
      <footer class="chat-footer">
      <form action="chat.php" method="POST">
        <input type="text" placeholder="Type a message..." name="message">
        <button class="send-btn" name="send" onclick="button()">Send</button>
      </form>
      </footer>
    </main>
  </div>

  <script src="index.js"> </script>
<?php
$_SESSION['table_name']=$table_name;
?>


</body>
</html>
