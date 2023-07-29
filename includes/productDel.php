<?php
include './db.php'; 

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the product ID from the POST data
    $productId = $_POST['productId'];


    $sql = "select photo FROM products WHERE pid = $productId";
    $result = mysqli_query($con, $sql); 

    // Fetch the data and send it back as a JSON response
    if ($result) {
        // Fetch the data for the selected product
        $row = mysqli_fetch_assoc($result);
        $photo = $row['photo'];
    }
    



    // Perform the deletion operation based on the product ID
    // Replace this with your actual deletion logic
    $sql = "DELETE FROM products WHERE pid = $productId";
    $result = mysqli_query($con, $sql);

    // Prepare the response
    $response = array();

    if ($result) {
        // Check if any rows were affected
        if (mysqli_affected_rows($con) > 0) {
            // Deletion successful
            $response['success'] = true;
            $response['message'] = 'Product deleted successfully';

            // Delete the corresponding file
            $filePath = "../productImg/"; // 삭제할 파일이 위치한 경로로 변경해야 합니다.
            $fileName = $photo; // 삭제할 파일 이름으로 변경해야 합니다.
           

            $fileFullPath = $filePath . $fileName;

            if (file_exists($fileFullPath)) {
                if (unlink($fileFullPath)) {
                    $response['file_deleted'] = true;
                    $response['file_message'] = 'File deleted successfully';
                } else {
                    $response['file_deleted'] = false;
                    $response['file_message'] = 'Failed to delete the file';
                }
            } else {
                $response['file_deleted'] = false;
                $response['file_message'] = 'File not found';
            }
        } else {
            // No rows affected, deletion failed
            $response['success'] = false;
            $response['message'] = 'Failed to delete the product';
        }
    } else {
        // Deletion query execution failed
        $response['success'] = false;
        $response['message'] = 'Deletion query failed: ' . mysqli_error($con);
    }

    // Return the response as JSON
    echo json_encode($response);
    exit();
}
?>
