<?php
include('../../database.php');
if (isset($_POST["feed"])) {
    $email=mysqli_real_escape_string($conn, $_POST["email"]);
    $opt= mysqli_real_escape_string($conn, $_POST["opt"]);
    $comment= mysqli_real_escape_string($conn, $_POST["comment"]);
    $description= mysqli_real_escape_string($conn, $_POST["description"]);
    $sqlInsert = "INSERT INTO feedback(email,opt , comment ,description) VALUES ('$email','$opt','$comment','$description')";
    if(mysqli_query($conn,$sqlInsert)){
        session_start();
        $_SESSION["feed"] = "Feedback Added Successfully!";
        header("Location:feedback.php");
    }else{
        die("Something went wrong");
    }
}
?>