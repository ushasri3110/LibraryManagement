<?php
session_start();

if(isset($_POST['collect'])) {
    // Form submitted, process the data
    include("../../database.php");

    // Sanitize input data
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $department = mysqli_real_escape_string($conn, $_POST["department"]);
    $bookTitle = mysqli_real_escape_string($conn, $_POST["bookTitle"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $edition = mysqli_real_escape_string($conn, $_POST["edition"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);

    // Insert the data into the database (you might want to add error handling here)
    $sqlInsert = "INSERT INTO collectedbooks (name, department, bookTitle, author,edition, email, mobile) 
                  VALUES ('$name', '$department', '$bookTitle', '$author','$edition', '$email', '$mobile')";

    if(mysqli_query($conn, $sqlInsert)) {
        // Remove the data from the issuebook table based on email and book title and edition
        $sqlDelete = "DELETE FROM issuebook WHERE email = '$email' AND booktitle = '$bookTitle' AND edition = '$edition'";
        if(mysqli_query($conn, $sqlDelete)) {
            $_SESSION["collect"] = "Book collected successfully!";
        } else {
            $_SESSION["notfound"] = "Failed to collect the book. Please try again.";
        }
    } else {
        $_SESSION["notfound"] = "Failed to collect the book. Please try again.";
    }
    $sql_increment_quantity = "UPDATE books SET quantity = quantity + 1 WHERE book= '$bookTitle' AND author = '$author' AND edition = '$edition'";
    if (!mysqli_query($conn, $sql_increment_quantity)) {
        die("Error incrementing book quantity: " . mysqli_error($conn));
    }

    // Redirect back to the same page to display the session messages
    header("Location: collectbook.php");
    exit(); // Ensure script stops execution after redirect
}
?>
