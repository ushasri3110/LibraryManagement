<?php
// Include database connection
include('database.php');

// Check if form was submitted to create a new book
if (isset($_POST["create"])) {
    // Escape user inputs to prevent SQL injection
    $bookName = mysqli_real_escape_string($conn, $_POST["bookName"]);
    $authorName = mysqli_real_escape_string($conn, $_POST["authorName"]);
    $edition = mysqli_real_escape_string($conn, $_POST["edition"]);
    $year = mysqli_real_escape_string($conn, $_POST["year"]);
    $quantity = mysqli_real_escape_string($conn, $_POST["quantity"]);
    $category = mysqli_real_escape_string($conn, $_POST["category"]); // Capture category

    // Handle image upload
    if (isset($_FILES['bookImage'])) {
        $image = $_FILES['bookImage'];
        $imageName = $image['name'];
        $imageTmpName = $image['tmp_name'];
        $imageType = $image['type'];

        // Check if file is an image
        if (strpos($imageType, 'image') !== false) {
            // Define upload directory
            $uploadDir = 'uploads/';
            // Generate a unique filename to prevent overwriting existing files
            $imagePath = $uploadDir . uniqid() . '_' . $imageName;
            // Move the uploaded file to the destination directory
            if (move_uploaded_file($imageTmpName, $imagePath)) {
                // Store image URL in the database
                $sqlInsert = "INSERT INTO books (book, author, edition, year, quantity, category, image_url) 
                              VALUES ('$bookName', '$authorName', '$edition', '$year', '$quantity', '$category', '$imagePath')";

                // Execute SQL query
                if(mysqli_query($conn, $sqlInsert)){
                    // Book added successfully
                    session_start();
                    $_SESSION["create"] = "Book Added Successfully!";
                    header("Location: BookAvailability.php");
                    exit();
                } else {
                    // Handle database error
                    die("Error: " . mysqli_error($conn));
                }
            } else {
                // Handle file upload error
                die("Error uploading file");
            }
        } else {
            // Handle non-image file upload
            die("Uploaded file is not an image");
        }
    } else {
        // Handle no image uploaded
        die("No image uploaded");
    }
}

// Check if form was submitted to edit an existing book
if (isset($_POST["edit"])) {
    // Escape user inputs to prevent SQL injection
    $bookName = mysqli_real_escape_string($conn, $_POST["bookName"]);
    $authorName = mysqli_real_escape_string($conn, $_POST["authorName"]);
    $edition = mysqli_real_escape_string($conn, $_POST["edition"]);
    $year = mysqli_real_escape_string($conn, $_POST["year"]);
    $quantity = mysqli_real_escape_string($conn, $_POST["quantity"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);

    // Check if image was uploaded
    if (isset($_FILES['bookImage'])) {
        $image = $_FILES['bookImage'];
        $imageName = $image['name'];
        $imageTmpName = $image['tmp_name'];
        $imageType = $image['type'];

        // Check if file is an image
        if (strpos($imageType, 'image') !== false) {
            // Define upload directory
            $uploadDir = 'uploads/';
            // Generate a unique filename to prevent overwriting existing files
            $imagePath = $uploadDir . uniqid() . '_' . $imageName;
            // Move the uploaded file to the destination directory
            if (move_uploaded_file($imageTmpName, $imagePath)) {
                // Update book details and image URL in the database
                $sqlUpdate = "UPDATE books SET book = '$bookName', author = '$authorName', edition = '$edition', year = '$year', quantity = '$quantity', image_url = '$imagePath' WHERE id = '$id'";

                if(mysqli_query($conn, $sqlUpdate)){
                    // Book updated successfully
                    session_start();
                    $_SESSION["update"] = "Book Updated Successfully!";
                    header("Location: BookAvailability.php");
                    exit();
                } else {
                    // Handle database error
                    die("Error: " . mysqli_error($conn));
                }
            } else {
                // Handle file upload error
                die("Error uploading file");
            }
        } else {
            // Handle non-image file upload
            die("Uploaded file is not an image");
        }
    } else {
        // Proceed with updating book details without changing the image
        $sqlUpdate = "UPDATE books SET book = '$bookName', author = '$authorName', edition = '$edition', year = '$year', quantity = '$quantity' WHERE id = '$id'";

        if(mysqli_query($conn, $sqlUpdate)){
            // Book updated successfully
            session_start();
            $_SESSION["update"] = "Book Updated Successfully!";
            header("Location: BookAvailability.php");
            exit();
        } else {
            // Handle database error
            die("Error: " . mysqli_error($conn));
        }
    }
}

// Redirect if no valid action is found
header("Location: BookAvailability.php");
exit();
?>
