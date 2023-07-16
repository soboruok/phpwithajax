<?php
require 'db.php'; 


//Login
function CheckingUserName($username,$con){
    $sql = "SELECT userID from users where userID='$username'"; 
    $run_query = mysqli_query($con,$sql);
    $count = mysqli_num_rows($run_query);
    return $count; 
}

//Signup
function SignupInsert($username,$email,$hashedPwd,$con){
    $sql = "INSERT INTO users(userID, userEmail, userPassword,created_at,updated_at) VALUES('$username','$email','$hashedPwd',CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)"; 
    mysqli_query($con,$sql);
}


//Confirm encrypted password and entered password
function CheckingPassword($username, $password, $con){

    $sql__password = "SELECT userPassword FROM users WHERE userID = '$username'"; 
    $run_query_password=mysqli_query($con,$sql__password);
    $row = mysqli_fetch_array($run_query_password); 
    
    $pwdCheck = password_verify($password, $row['userPassword']);

    return $pwdCheck; 
}

//get user unique number
function GetUserNumber($username, $con){
    $sql = "SELECT userID FROM users WHERE userID = '$username'";
    $run_query=mysqli_query($con,$sql);
    $row = mysqli_fetch_array($run_query); 

    return $row['userID']; 
}






?>