<?php
include('../../database.php');

if (isset($_POST["issue"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $department = mysqli_real_escape_string($conn, $_POST["department"]);
    $dateofissue = mysqli_real_escape_string($conn, $_POST["dateofissue"]);
    $bookTitle = mysqli_real_escape_string($conn, $_POST["bookTitle"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $edition = mysqli_real_escape_string($conn, $_POST["edition"]);
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $dateofreturn = mysqli_real_escape_string($conn, $_POST["dateofreturn"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);

    // Check if date of return is greater than date of issue
    if ($dateofreturn <= $dateofissue) {
        session_start();
        $_SESSION["error"] = "Date of return should be greater than date of issue";
        header("Location: issueBook.php");
        exit(); // Stop execution if validation fails
    }

    // Check if the book title exists in the database
    $sqlCheckTitle = "SELECT * FROM books WHERE book = '$bookTitle'";
    $result = mysqli_query($conn, $sqlCheckTitle);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Book title found, proceed with inserting the record
        $sqlInsert = "INSERT INTO issuebook(name, department, dateofissue, booktitle, author, edition, category, dateofreturn, email, mobile) 
                      VALUES ('$name', '$department', '$dateofissue', '$bookTitle', '$author','$edition', '$category',  '$dateofreturn', '$email', '$mobile')";
        
        if(mysqli_query($conn, $sqlInsert)) {
            session_start();
            $_SESSION["issue"] = "Book Issued Successfully!";
            header("Location:issueBook.php");
            exit();
        } else {
            die("Error inserting record: " . mysqli_error($conn)); // Print error message
        }
    } else {
        session_start();
        $_SESSION["notfound"] = "Book not found";
        header("Location:issueBook.php");
        exit();
    }
}
// Decrement book quantity in the books table
$sql_decrement_quantity = "UPDATE books SET quantity = quantity - 1 WHERE book= '$bookTitle' AND author = '$author' AND edition = '$edition'";
if (!mysqli_query($conn, $sql_decrement_quantity)) {
    die("Error decrementing book quantity: " . mysqli_error($conn)); // Print error message
}
?>
