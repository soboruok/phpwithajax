<?php

include './db.php'; 
include './lib.php'; 

$email = mysqli_real_escape_string($con, $_POST['userEmail']);
$username = mysqli_real_escape_string($con, $_POST['userID']);
$password = mysqli_real_escape_string($con, $_POST['userPassword']);
$passwordRepeat = mysqli_real_escape_string($con, $_POST['rePassword']);



if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
  $error = 'empty';
  $response = array('error' => $error);
  echo json_encode($response);
  exit();
} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  $error = 'Wrong Email';
  $response = array('error' => $error);
  //json_encode는 JSON 형식으로 인코딩한 후 출력{"error":"empty"}
  //JSON 문자열은 JavaScript에서 받아서 파싱하여 사용 
  //JSON.parse(jsonString);
  echo json_encode($response);
  exit();
} else if(!preg_match("/^[a-zA-Z]*$/", $username)){
  $error = 'Wrong userName';
  $response = array('error' => $error);
  echo json_encode($response);
  exit();
} else if($password !== $passwordRepeat){
  $error = 'Password Error';
  $response = array('error' => $error);
  echo json_encode($response);
  exit();
} else {
  //checking userName from DB
  $count = CheckingUserName($username,$con);
  if($count > 0){
    $error = 'SQL Error';
    $response = array('error' => $error);
    echo json_encode($response);
    exit();
  } else {
      $hashedPwd = password_hash($password, PASSWORD_DEFAULT); 
      //save member
      SignupInsert($username,$email,$hashedPwd,$con);
      $response = array();
      echo json_encode($response);
       
  }
}

mysqli_close($con); 

?>