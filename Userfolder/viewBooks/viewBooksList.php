<?php
session_start();

if(isset($_POST['search'])) {
    // Form submitted, process the data
    include("../../database.php");

    // Sanitize input data
    $email = mysqli_real_escape_string($conn, $_POST["email"]);

    // Retrieve books from issuebook table
    $sqlIssueBooks = "SELECT * FROM issuebook WHERE email = '$email'";
    $resultIssueBooks = mysqli_query($conn, $sqlIssueBooks);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../static/images/book.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Book List</title>
    <style>
        table  td, table th{
        vertical-align:middle;
        padding:20px!important;
        color:white;
        }
        table th{
            text-decoration: underline;
        }
        body{
            background-color: rgb(32, 1, 1);
            color:white;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Your Books</h1>
            <div>
            <a href="../../User1.php" class="btn btn-primary">Back</a>
            </div>
        </header>
         <!-- Form to input email -->
    <form method="POST" action=viewBooksList.php>
        <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your E-mail">
        </div>
        <div class="form-element my-4">
        <button type="submit" class="btn btn-primary" name="search">Search</button>
        </div>
    </form>
        <table class="table table-bordered">
        <thead>
            <tr>
            <th>Id</th>
                <th>Book Name</th>
                <th>Author</th>
                <th>Category</th>
                <th>Edition</th>
                <th>Date Of Issue</th>
                <th>Date Of Return</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include('../../database.php');

            if(isset($_POST['search'])) {
                // Fetch book details from issuebook table
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $sqlIssueBooks = "SELECT * FROM issuebook WHERE email = '$email'";
                $resultIssueBooks = mysqli_query($conn, $sqlIssueBooks);

                // Function to display book details in table row format
                function displayBooks($result)
                {
                    while ($data = mysqli_fetch_array($result)) {
                ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['booktitle']; ?></td>
                            <td><?php echo $data['author']; ?></td>
                            <td><?php echo $data['edition']; ?></td>
                            <td><?php echo $data['category']; ?></td>
                            <td><?php echo $data['dateofissue']; ?></td>
                            <td><?php echo $data['dateofreturn']; ?></td>
                        </tr>
                <?php
                    }
                }

                // Display books from issuebook table
                displayBooks($resultIssueBooks);
            }
            ?>
        </tbody>
        </table>
    </div>
</body>
</html>
