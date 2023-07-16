<?php
include 'db.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the product ID from the POST data
    $productId = $_POST['productId'];

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