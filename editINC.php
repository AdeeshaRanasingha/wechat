<?php

require_once 'database.php';


if(isset($_POST['delete'])){

session_start();
$sql = "DELETE FROM users WHERE email='{$_SESSION['email']}'";
$result = mysqli_query($conn, $sql);
header("Location: login.php");//redirecting to login form

}

if(isset($_POST['submit'])){
    $email = $_POST["email"];
    $name = $_POST["name"];
    $pwd = $_POST["pwd"];
    $caption = $_POST["caption"];
    

    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'dpImages/'. $file_name;



   

    //updating the database
    $sql = "UPDATE users set name = '$name' , password = '$pwd' ,  file = '$file_name' , caption='$caption' WHERE email = '$email'";

    $result = mysqli_query($conn , $sql);

    move_uploaded_file($tempname , $folder);
    
    if(!$result){
        die("querry failed");//getting errors
    }
    else{
        //again filling the details of the form with the new data entered
        $sql = "SELECT * FROM users WHERE email= '{$email}' LIMIT 1";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_array($result);//getting relevent row regard to email

            session_start();//saving the details to sessions
            $_SESSION['name'] = $row['name'];
            
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['caption'] = $row['caption'];
    
            $_SESSION['dp'] = $row['file'];
            
            header('location:edit.php?successfully-updated');//redirecting to the site
        }
            
        }
}