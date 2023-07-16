<?php

include './db.php'; 

//category section title price qty regdate file memo
// $category = $_POST['category'] ?? '';
// $section = $_POST['section'] ?? '';
// $title = $_POST['title'] ?? '';
// $price = $_POST['price'] ?? '';
// $qty = $_POST['qty'] ?? '';
// $photo = $_FILES['photo'] ?? '';
// $memo = $_POST['memo'] ?? '';

$response = array();
$error = '';



// 이미지 파일 정보 가져오기
$fileName = $_FILES['photo']['name'];
$fileType = $_FILES['photo']['type'];
$fileTmpName = $_FILES['photo']['tmp_name'];
$fileError = $_FILES['photo']['error'];
$fileSize = $_FILES['photo']['size'];

// 파일 데이터 읽기
$fileData = addslashes(file_get_contents($fileTmpName));

// 기타 폼 데이터 가져오기
$category = $_POST['category'];
$section = $_POST['section'];
$title = $_POST['title'];
$price = $_POST['price'];
$qty = $_POST['qty'];
$memo = $_POST['memo'];

//파일 확장자 확인
$fileExt = explode(".",$fileName);
$fileActualExt = strtolower(end($fileExt)); 
$allowed = array("jpg", "jpeg","png","pdf"); 

//dataValidation, success, fail, filesize, uploadFail, filetype
if(in_array($fileActualExt, $allowed)){
    if($fileError === 0) {
        if($fileSize < 2000000){
            $imageFullName = uniqid("", true) . "." . $fileActualExt; 
            $fileDestination = "../productImg/".$imageFullName; 
        
            if(empty($category)||empty($section)||empty($title)||empty($price)||empty($qty)||empty($memo)){
                $error = 'dataValidation';
                

            } else {
                $sql = "insert into products (category,display, section,title,price,qty,photo,memo,created_at, updated_at) 
                        values ('$category', 0, '$section', '$title', '$price', '$qty', '$imageFullName' ,'$memo',NOW(), Now()); ";
                if ($con->query($sql) === true) {
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $response['success'] = true;
                    $response['message'] = "Data processed successfully.";
                    
                } else {
                    $error = 'fail';
                }
            }
        } else {
            $error = 'filesize';
        }
    } else {
        $error = 'uploadFail';
    }
} else {
    $error = 'filetype';
}


// 오류 발생 시 응답
if (!empty($error)) {
    $response['success'] = false;
    $response['message'] = "Error occurred: " . $error;
}

echo json_encode($response);
exit();

?>