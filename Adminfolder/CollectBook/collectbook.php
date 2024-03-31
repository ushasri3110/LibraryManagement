<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collect Book</title>
    <link rel="icon" href="../../static/images/book.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: rgb(32, 1, 1);
            color: #FFF;
        }
        /* Custom styles for form */
        .form-group input,
        .form-group select {
            width: 100%;
            max-width: 500px; /* Set max-width as per your requirement */
        }
        .container {
            margin-top: 100px; /* Adjust top margin as needed */
            position:relative
        }
        img{
            width:400px;
            height:auto;
            position: absolute;
            top:8%;
            left:60%;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <header class="d-flex justify-content-between my-4">
        <h1>Collect Book</h1>
        <div>
            <a href="../../Admin1.php" class="btn btn-primary">Back</a>
        </div>
    </header>

    <?php
    session_start();
    if (isset($_SESSION["collect"])) {
        ?>
        <div class="alert alert-success">
            <?php echo $_SESSION["collect"]; ?>
        </div>
        <?php unset($_SESSION["collect"]);
    }
    ?>

    <?php
    if (isset($_SESSION["notfound"])) {
        ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION["notfound"]; ?>
        </div>
        <?php unset($_SESSION["notfound"]);
    }
    ?>
     <img src="../../static/images/collect.png">
    <form action="collectbookprocess.php" id="bookForm" method="POST">
        <div class="form-group mb-3">
            <label for="candidateName">Name of Candidate:</label>
            <input type="text" id="candidateName" name="name" class="form-control" placeholder="Enter Name of Candidate" required>
        </div>

        <div class="form-group mb-3">
            <label for="department">Department:</label>
            <select id="department" class="form-control" name="department" required>
                <option value="">Select Department</option>
                <option value="AIE">AIE</option>
                <option value="CSE">CSE</option>
                <option value="CCE">CCE</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="bookTitle">Book Title:</label>
            <input type="text" id="bookTitle" name="bookTitle" class="form-control" placeholder="Enter book title" required>
        </div>

        <div class="form-group mb-3">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" class="form-control" placeholder="Enter Author Name" required>
        </div>
        
        <div class="form-group mb-3">
                <label for="edition">Edition:</label>
                <input type="text" id="edition" name="edition" class="form-control" placeholder="Enter Edition" required> 
            </div>

        <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter email of candidate" required>
        </div>

        <div class="form-group mb-3">
            <label for="mobileNumber">Mobile Number:</label>
            <input type="tel" id="mobileNumber" name="mobile" class="form-control" placeholder="Enter mobile number of candidate" pattern="[0-9]{10}" title="Please enter a 10-digit mobile number" required>
        </div>

        <div class="form-element my-4">
            <input type="submit" name="collect" value="Collect Book" class="btn btn-primary">
            <input type="reset" value="Clear All" class="btn btn-warning">
        </div>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
