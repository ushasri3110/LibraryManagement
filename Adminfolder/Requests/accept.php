<?php
if (isset($_GET['id'])) {
    include("../../database.php");
    $id = $_GET['id'];

    // Fetch the book details from the reservebooks table
    $sql_fetch = "SELECT bookName, email, authorName,edition FROM reservebooks WHERE id='$id'";
    $result = mysqli_query($conn, $sql_fetch);
    if (!$result) {
        die("Error fetching book :details " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    $book_name = $row['bookName'];
    $email = $row['email'];
    $authorName = $row['authorName'];
    $edition = $row['edition'];

    // Insert status into the status table
    $status = 'Accepted';
    $sql_status = "INSERT INTO status (email, bookName, author, edition,status) VALUES ('$email', '$book_name', '$authorName', '$edition','$status')";
    if (!mysqli_query($conn, $sql_status)) {
        die("Error inserting status: " . mysqli_error($conn));
    }

    // Decrement book quantity in the books table
    $sql_decrement_quantity = "UPDATE books SET quantity = quantity - 1 WHERE book= '$book_name' AND author = '$authorName' AND edition = '$edition'";
    if (!mysqli_query($conn, $sql_decrement_quantity)) {
        die("Error decrementing book quantity: " . mysqli_error($conn));
    }

    // Delete reservation from the reservebooks table
    $sql_delete = "DELETE FROM reservebooks WHERE id='$id'";
    if (!mysqli_query($conn, $sql_delete)) {
        die("Error deleting reservation: " . mysqli_error($conn));
    }

    // If everything is successful, set session message and redirect
    session_start();
    $_SESSION["accepted"] = "Reservation for book '$book_name' is Accepted!";
    header("Location: requests.php");
    exit();
} else {
    echo "Book does not exist";
}
?>
