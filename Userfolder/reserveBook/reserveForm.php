<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../static/images/book.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Edit Book</title>
    <style>
    body{
            background-color: rgb(32, 1, 1);
            color:white;
        }
        </style>
</head>
<body>
    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1>Reserve Book</h1>
            <div>
            <a href="displayBooks.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form action="processreserve.php" method="post">
            <?php 
                if (isset($_GET['id'])) {
                include('../../database.php');
                $id = $_GET['id'];
                $sql = "SELECT * FROM books WHERE id=$id";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                ?>
                <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
                </div>
                <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="email" placeholder="Enter Your Email" required>
                </div>
                <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="mobile" placeholder="Enter Your Mobile Number" required>
                </div>
                <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="bookName" placeholder="Enter Book Name" value="<?php echo $row["book"]; ?>">
                </div>
                <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="authorName" placeholder="Enter Author Name" value="<?php echo $row["author"]; ?>">
                </div>
                <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="edition" placeholder="Enter Edition" value="<?php echo $row["edition"]; ?>">
                </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control"  name="year" placeholder="Enter Published Year" value="<?php echo $row["year"]; ?>">
            </div>
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <div class="form-element my-4">
                <input type="submit" name="reserve" value="Reserve Book" class="btn btn-primary">
            </div>
                <?php
            }else{
                echo "<h3>Book Does Not Exist</h3>";
            }
            ?>
        </form>
    </div>
</body>
</html>