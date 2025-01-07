<?php
session_start();

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $name = $_POST["name"];
    $caption=$_POST["caption"];

    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'dpImages/'. $file_name;
    

    require_once 'database.php';
    
    //checking wheather the email already exist
    $sql = "SELECT * FROM users WHERE email = '{$email}' LIMIT 1"; //sql for validating weather e mail already exist or not

    $resultset = mysqli_query($conn, $sql);

    

    //if exist re direct to signup page
    if(mysqli_num_rows($resultset) ==1){
        header('location:signup.php?error=email-already-exist');

    }
    else{
        //if not exist creating data on database
        $sql = "INSERT INTO users (name,email,password,file,caption) VALUES ('{$name}','{$email}','{$pwd}','{$file_name}' , '{$caption}')";
        $result = mysqli_query($conn, $sql);
        move_uploaded_file($tempname , $folder);
        echo "successful";
        header('location: login.php');//redirecting to the login page
    }
}
else{
    
}