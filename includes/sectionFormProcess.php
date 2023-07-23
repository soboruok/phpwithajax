<?php

include './db.php'; 


$response = array();
$error = '';

// uidx bcategory bsection

// 기타 폼 데이터 가져오기
$uidx = $_POST['uidx'];
$bcategory = $_POST['bcategory'];
$bsection = $_POST['bsection'];

        
if(empty($uidx)||empty($bcategory)||empty($bsection)){
    $error = 'dataValidation';
    

} else {
    $sql = "insert into sections (uidx, bcategory,bsection) 
            values ('$uidx','$bcategory', '$bsection'); ";
           
    if ($con->query($sql) === true) {
        $response['success'] = true;
        $response['message'] = "Data processed successfully.";
        $response['refresh'] = true;// Add this line to indicate a successful response and trigger a page refresh
        
    } else {
        $error = 'fail';
    }
}
  


// Output the response or error if necessary
if (isset($response)) {
    echo json_encode($response);
} else {
    echo $error;
}

?>