<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../static/images/book.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Add New Book</title>
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
            <h1>Add New Book</h1>
            <div>
                <a href="BookAvailability.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        
        <form id="bookForm" action="processbook.php" method="post" enctype="multipart/form-data">
            <div class="form-element my-4">
                <input type="text" class="form-control"  name="bookName" placeholder="Enter Book Name" required>
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="authorName" placeholder="Enter Author Name" required>
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="edition" placeholder="Enter Edition" required>
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control"  name="year" placeholder="Enter Published Year" required>
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control"  name="quantity" placeholder="Enter No.of Copies Available" required>
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
                    <option value="Magazines">Magazines</option>
                    
                </select>
            </div>
            <div class="form-element my-4">
            <input type="file" class="form-control" name="bookImage" accept="image/*" required>
            </div>
            <div class="form-element my-4">
                <input type="submit" name="create" value="Add Book" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>
