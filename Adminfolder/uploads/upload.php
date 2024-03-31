<!DOCTYPE html>
<html>
<head>
    <title>Upload Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" href="../../static/images/book.png" type="image/x-icon">
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
            <h1>Upload Book</h1>
            <div>
            <a href="../../Admin1.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <?php
        session_start();
        if (isset($_SESSION["upload"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["upload"];
            ?>
        </div>
        <?php
        unset($_SESSION["upload"]);
        }
        ?>
<form method="post" enctype="multipart/form-data" action="upload.php">
    <div class="form-element my-4">
        <input type="text" class="form-control" name="bookName" placeholder="Enter Book Name">
    </div>
    <div class="form-element my-4">
        <input type="text" class="form-control" name="authorName" placeholder="Enter Author Name">
    </div>
    <div class="form-element my-4">
        <input type="text" class="form-control" name="edition" placeholder="Enter Edition">
    </div>
    <div class="form-element my-4">
        <input type="text" class="form-control" name="year" placeholder="Enter Published Year">
    </div>
    <div class="form-group my-4">
        <select id="category" class="form-control" name="category" required>
        <option value="">Select Category</option>
                    <option value="Fiction" >Fiction</option>
                    <option value="History" >History</option>
                    <option value="Comics" >Comics</option>
                    <option value="Mystery">Mystery</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Programming">Programming</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Aptitude">Aptitude</option>
                    <option value="CompetitiveExams">Competitive Exams</option>
        </select>
    </div>
    <div class="form-element my-4">
        <input type="file" class="form-control" name="bookImage" accept="image/*" required>
    </div>
    <div class="form-element my-4">
        <input type="file" name="file" accept=".pdf,.doc,.docx,.txt,.xlsx,.pptx,.zip,.rar">
    </div>
    <div class="form-element my-4">
        <input type="submit" name="submit" value="Upload Book" class="btn btn-primary">
    </div>
</form>
</div>
</body>
</html>
<?php 
include('../../database.php');
 
if (isset($_POST["submit"])) {
    
    // Retrieve form data
    $title = mysqli_real_escape_string($conn, $_POST["bookName"]);
    $author = mysqli_real_escape_string($conn, $_POST["authorName"]);
    $edition = mysqli_real_escape_string($conn, $_POST["edition"]);
    $year = mysqli_real_escape_string($conn, $_POST["year"]);
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $imageUrl = ''; // Initialize image URL variable
     
    // Check if an image file was uploaded
    if(isset($_FILES["bookImage"]) && $_FILES["bookImage"]["error"] == 0){
        // File name with a random number so that similar don't get replaced
        $imageName = rand(1000,10000)."-".$_FILES["bookImage"]["name"];
     
        // Temporary file name to store file
        $imageTmpName = $_FILES["bookImage"]["tmp_name"];
       
        // Upload directory path
        $uploadsDir = 'uploads';
        
        // Check if the directory exists, if not, create it
        if (!file_exists($uploadsDir)) {
            mkdir($uploadsDir, 0777, true); // Create directory with full permissions (0777)
        }

        // Move the uploaded file to the specified location
        if(move_uploaded_file($imageTmpName, $uploadsDir.'/'.$imageName)) {
            $imageUrl = $uploadsDir.'/'.$imageName; // Set the image URL
        } else {
            echo "Error uploading image file";
        }
    }
   
    // File name with a random number so that similar don't get replaced
    $pdfName = rand(1000,10000)."-".$_FILES["file"]["name"];
 
    // Temporary file name to store file
    $pdfTmpName = $_FILES["file"]["tmp_name"];
   
    // Upload directory path
    $uploadsDir = 'file';
    
    // Check if the directory exists, if not, create it
    if (!file_exists($uploadsDir)) {
        mkdir($uploadsDir, 0777, true); // Create directory with full permissions (0777)
    }

    // Move the uploaded file to the specified location
    if(move_uploaded_file($pdfTmpName, $uploadsDir.'/'.$pdfName)) {
        // SQL query to insert into database
        $sql = "INSERT INTO `uploadbook` (bookName, author, edition, publishedYear, image_url, file, category) VALUES ('$title', '$author', '$edition', '$year', '$imageUrl' ,'$pdfName', '$category')";
        
        // Execute the query
        if(mysqli_query($conn, $sql)){
            session_start();
            $_SESSION["upload"] = "Book Uploaded Successfully!";
            header("Location:upload.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error uploading PDF file";
    }
}
?>
