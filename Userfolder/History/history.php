<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="icon" href="../../static/images/book.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            background-color: rgb(32, 1, 1);
            color: #FFF;
        }
    </style>
</head>
<body>
    <div class="container">
            <header class="d-flex justify-content-between my-4">
            <h1>History</h1>
            <div>
            <a href="../../User1.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form action="history.php" method="post">
            <div class="form-element my-4">
                <input type="text" class="form-control" name="email" placeholder="Enter Email">
            </div>
            <div class="form-element my-4">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Book Name</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Edition</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('../../database.php');
                if(isset($_POST['submit'])) {
                    $email = mysqli_real_escape_string($conn, $_POST["email"]);
                    $sqlSelect = "SELECT * FROM status WHERE email='$email'";
                    $result = mysqli_query($conn, $sqlSelect);
                    if(mysqli_num_rows($result) > 0) {
                        while($data = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $data['email'] . "</td>";
                            echo "<td>" . $data['bookName'] . "</td>";
                            echo "<td>" . $data['category'] . "</td>";
                            echo "<td>" . $data['author'] . "</td>";
                            echo "<td>" . $data['edition'] . "</td>";
                            echo "<td>" . $data['status'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found</td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
