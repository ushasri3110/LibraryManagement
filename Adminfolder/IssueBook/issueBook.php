<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issuing A Book</title>
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
            width:450px;
            height:auto;
            position: absolute;
            top:15%;
            left:60%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <header class="d-flex justify-content-between my-4">
            <h1>Issue Book</h1>
            <div>
                <a href="../../Admin1.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        
        <!-- PHP session messages -->
        <?php
        session_start();
        if (isset($_SESSION["issue"])) {
        ?>
        <div class="alert alert-success">
            <?php echo $_SESSION["issue"]; ?>
        </div>
        <?php
        unset($_SESSION["issue"]);
        }
        ?>

        <?php
        if (isset($_SESSION["notfound"])) {
        ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION["notfound"]; ?>
        </div>
        <?php
        unset($_SESSION["notfound"]);
        }
        ?>

        <?php
        if (isset($_SESSION["error"])) {
        ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION["error"]; ?>
        </div>
        <?php
        unset($_SESSION["error"]);
        }
        ?>
        <img src="../../static/images/issue.png">
        <!-- Form -->
        <form action="issuebookprocess.php" id="bookForm" method="POST">
            <div class="form-group mb-3">
                <label for="candidateName">Name of Candidate:</label>
                <input type="text" id="candidateName" class="form-control" name="name" placeholder="Enter Name of Candidate" required> 
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
                <label for="issueDate">Date of Issue:</label>
                <input type="date" id="issueDate" name="dateofissue" class="form-control" placeholder="Select Date" required> 
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
                <label for="category">Category:</label>
                <select id="category" class="form-control" name="category" required>
                    <option value="">Select Category</option>
                    <option value="Fiction">Fiction</option>
                    <option value="History">History</option>
                    <option value="Comics">Comics</option>
                    <option value="Mystery">Mystery</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Programming">Programming</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Aptitude">Aptitude</option>
                    <option value="CompetitiveExams">Competitive Exams</option>
                    <option value="Magazines">Magazines</option>
                </select>
             </div>

            <div class="form-group mb-3">
                <label for="returnDate">Date of returning book:</label>
                <input type="date" id="returnDate" name="dateofreturn" class="form-control" placeholder="Date of returning a book" required> 
            </div>

            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email of candidate" required> 
            </div>

            <div class="form-group mb-3">
                <label for="mobileNumber">Mobile Number:</label>
                <input type="tel" id="mobileNumber" class="form-control" name="mobile" placeholder="Enter mobile number of candidate" pattern="[0-9]{10}" title="Please enter a 10-digit mobile number" required> 
            </div>
         
            <div class="form-element my-4">
                <input type="submit" name="issue" value="Issue Book" class="btn btn-primary">
                <input type="reset"  value="Clear All" class="btn btn-warning">
            </div>
        </form>
    </div>
    
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
