<?php
// Include database connection
include('../../database.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch file details from the database based on ID
    $sql = "SELECT * FROM uploadbook WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $fileName = $row['file'];
        $filePath = '../../Adminfolder/uploads/file/' . $fileName;

        // Check if the file exists
        if(file_exists($filePath)) {
            // Set headers for file download
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            header('Content-Length: ' . filesize($filePath));

            // Output the file
            readfile($filePath);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "Invalid ID.";
    }
} else {
    echo "Invalid request.";
}
?>
