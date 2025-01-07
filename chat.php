<?php
session_start();

if(isset($_POST["send"])){
    $email = $_SESSION["email"];
    $message = $_POST["message"];
    $name = $_SESSION["name"];
    $table_name = $_SESSION['table_name'];
    

    require_once 'database.php';
    
        //if not exist creating data on database
        $sql = "INSERT INTO $table_name (name,email,message) VALUES ('{$name}','{$email}','{$message}') ";
        $result = mysqli_query($conn, $sql);
        echo "successful";
         $_SESSION['table_name'] = $table_name;
        header('location: index.php');//redirecting to the login page
    
}

if(isset($_POST['logout'])){

    session_start();

    // Destroy the session and clear session data
    session_unset();
    session_destroy();

    // Redirect to the login page
    header("Location: login.php");
    exit();

}
?>

