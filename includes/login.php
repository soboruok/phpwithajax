<?php
// login.php
include './db.php'; 
include './lib.php'; 


// Get the submitted username and password
$userid=mysqli_real_escape_string($con, $_POST['loginUserId']);
$password=mysqli_real_escape_string($con, $_POST['loginUserPassword']);



if(empty($userid) || empty($password)){
    $error = 'emptyfields';
    $response = array('error' => $error);
    echo json_encode($response);
    exit();
} else {
    //Check if the entered user exists
    $count = CheckingUserName($userid,$con); 
    //echo $count; 
    if($count > 0){

        //Confirm encrypted password and entered password 
        $pwdCheck = CheckingPassword($userid, $password, $con);

            if($pwdCheck == false){
                $error = 'wrongpwd';
                $response = array('error' => $error);
                echo json_encode($response);
                exit();

            } else if($pwdCheck == true){

                $idNumber=GetUserNumber($userid, $con);

                //세션등록
                session_start(); 
                $_SESSION['userId'] = $idNumber; 
                $_SESSION['userUid'] = $userid;
                $_SESSION['is_admin'] = 10; //only admin 10 access 

                $error = 'success';
                $response = array('error' => $error);
                echo json_encode($response);
                exit();

            } else {
                $error = 'wrongpwd';
                $response = array('error' => $error);
                echo json_encode($response);
                exit();
            }

        } else {
            $error = 'nouser';
            $response = array('error' => $error);
            echo json_encode($response);
            exit();
        }
}


?>
