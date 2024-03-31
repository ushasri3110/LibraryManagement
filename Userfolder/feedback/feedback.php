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
        table  td{
        vertical-align:middle;
        text-align:left;
        padding:20px!important;
        color:white;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1>Feedback Form</h1>
            <div>
            <a href="../../User1.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <?php
        session_start();
        if (isset($_SESSION["feed"])) {
            ?>
            <div class="alert alert-success">
                <?php 
                echo $_SESSION["feed"];
                ?>
            </div>
            <?php
            unset($_SESSION["feed"]);
            }
            ?>
        
        <form action="processfeedback.php" method="post">
        <table class="table table-bordered">
            <tr>
                <div class="form-elemnt my-4">
                <td>Email</td>
                <td>
                <input type="email" class="form-control"  name="email" placeholder="Enter Email">
                </td>
            </div>
            </tr>
            <tr>   
               <div class="form-elemnt">
                    <td style="width:40%">What kind of comment would you like to send?</td>
                    <td > <div class="form-check">
                        <input class="form-check-input" type="radio" name="opt" id="flexRadioDefault1" value="Complaint">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Complaint
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="opt" id="flexRadioDefault2" value="Problem">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Problem
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="opt" id="flexRadioDefault3" value="Suggestion">
                        <label class="form-check-label" for="flexRadioDefault3">
                            Suggestion
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="opt" id="flexRadioDefault4" value="Praise">
                        <label class="form-check-label" for="flexRadioDefault4">
                            Praise
                        </label>
                    </div>
                </div></td>
            </tr>
            <tr>
                <div class="form-elemnt">
                    <td>What about the library do you want to comment on?</td>
                    <td><input type="text" class="form-control" name="comment" placeholder="What about the library do you want to comment on?"></td>
                </div>
            </tr>
            <tr>
            <div class="form-elemnt">
                <td>Enter your comments in the space provided</td>
                <td><textarea class="form-control" name="description" rows="5" placeholder="Enter your comments in the space provided"></textarea></td>
            </div>
            </tr>
            </table>
            <div class="form-element my-4" style="text-align:right">
                <input type="submit" name="feed" value="Submit" class="btn btn-primary">
            </div>
        </form>
        
    </div>
</body>
</html>