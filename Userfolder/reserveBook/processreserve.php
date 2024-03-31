<?php
if (isset($_POST["reserve"])) {
    include('../../database.php'); // Include your database connection
    
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);
    $bookName = mysqli_real_escape_string($conn, $_POST["bookName"]);
    $authorName = mysqli_real_escape_string($conn, $_POST["authorName"]);
    $edition = mysqli_real_escape_string($conn, $_POST["edition"]);
    $year = mysqli_real_escape_string($conn, $_POST["year"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    
    // Fetch the current quantity of the book
    $sqlQuantity = "SELECT quantity FROM books WHERE id = '$id'";
    $resultQuantity = mysqli_query($conn, $sqlQuantity);
    $rowQuantity = mysqli_fetch_assoc($resultQuantity);
    $currentQuantity = $rowQuantity['quantity'];
    
    // Check if there are available books
    if ($currentQuantity > 0) {
        // // Decrease the quantity by 1
        // $newQuantity = $currentQuantity - 1;
        
        // // Update the database with the new quantity
        // $sqlUpdate = "UPDATE books SET quantity = '$newQuantity' WHERE id = '$id'";
        // mysqli_query($conn, $sqlUpdate);
        
        // Insert reservation details into the reservebooks table
        $sqlInsert = "INSERT INTO reservebooks (name, email, mobile, bookName, authorName, edition,year) VALUES ('$name', '$email', '$mobile', '$bookName', '$authorName','$edition', '$year')";
        
        if (mysqli_query($conn, $sqlInsert)) {
            session_start();
            $_SESSION["reserve"] = "Request Sent Successfully!";
            header("Location:displayBooks.php");
            exit(); // Make sure to exit after redirection
        } else {
            die("Something went wrong");
        }
    } else {
        session_start();
        $_SESSION["outofstock"] = "Sorry, the book '$bookName' is out of stock.";
        header("Location: displayBooks.php");
        exit(); 
    }
}
?>
