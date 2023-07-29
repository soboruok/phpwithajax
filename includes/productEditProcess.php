<?php
include './db.php'; 

$response = array();
$error = '';

// Get the product ID from the POST data
$productId = $_POST['productId'];

// 기존 이미지 파일 정보 가져오기
$fileName = $_FILES['photo']['name'];
$fileType = $_FILES['photo']['type'];
$fileTmpName = $_FILES['photo']['tmp_name'];
$fileError = $_FILES['photo']['error'];
$fileSize = $_FILES['photo']['size'];

// 기타 폼 데이터 가져오기
$title = $_POST['title'];
$price = $_POST['price'];
$qty = $_POST['qty'];
$memo = $_POST['memo'];

// 파일 확장자 확인
$fileExt = explode(".", $fileName);
$fileActualExt = strtolower(end($fileExt));
$allowed = array("jpg", "jpeg", "png", "pdf");

// Check if a new file is uploaded
if ($fileError === 0 && in_array($fileActualExt, $allowed)) {
    if ($fileSize < 2000000) {
        $imageFullName = uniqid("", true) . "." . $fileActualExt;
        $fileDestination = "../productImg/" . $imageFullName;

        // Perform the update operation with the new file
        $sql = "UPDATE products 
                SET  title = '$title',
                    price = '$price',
                    qty = '$qty',
                    photo = '$imageFullName',
                    memo = '$memo' 
                WHERE pid = '$productId'";

        if ($con->query($sql) === true) {
            //move new file
            move_uploaded_file($fileTmpName, $fileDestination);
            

            //remove old photo
            $fileFullPath = "../productImg/" . $fileName;
            
            if (file_exists($fileFullPath)) {
                if (unlink($fileFullPath)) {
                    $response['file_deleted'] = true;
                    $response['file_message'] = 'File deleted successfully';
                } else {
                    $response['file_deleted'] = false;
                    $response['file_message'] = 'Failed to delete the file';
                }
            } 

            
            $response['success'] = true;
            $response['message'] = "Data processed successfully.";
        } else {
            $error = 'fail';
        }
    } else {
        $error = 'filesize';
    }
} else {
    // No new file is uploaded, update the record without changing the file
    $sql = "UPDATE products 
            SET title = '$title',
                price = '$price',
                qty = '$qty',
                memo = '$memo' 
            WHERE pid = '$productId'";

    if ($con->query($sql) === true) {
        $response['success'] = true;
        $response['message'] = "Data processed successfully.";
    } else {
        $error = 'fail';
    }
}

// 오류 발생 시 응답
if (!empty($error)) {
    $response['success'] = false;
    $response['message'] = "Error occurred: " . $error;
}

echo json_encode($response);
exit();
?>
