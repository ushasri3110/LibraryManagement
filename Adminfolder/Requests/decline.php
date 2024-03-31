<?php
if (isset($_GET['id'])) {
    include("../../database.php");
    $id = $_GET['id'];

    // Fetch the book details
    $sql_fetch = "SELECT bookName, email, authorName,edition FROM reservebooks WHERE id='$id'";
    $result = mysqli_query($conn, $sql_fetch);
    if (!$result) {
        die("Error fetching book details: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    $book_name = $row['bookName'];
    $email = $row['email'];
    $authorName = $row['authorName'];
    $edition = $row['edition'];
    // Insert status into the status table
    $status = 'Declined';
    $sql_status = "INSERT INTO status (email, bookName, author,edition, status) VALUES ('$email', '$book_name', '$authorName','$edition', '$status')";
    if (!mysqli_query($conn, $sql_status)) {
        die("Error inserting status: " . mysqli_error($conn));
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
