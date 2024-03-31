<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../../static/images/book.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Book List</title>
    <style>
        table {
            text-align: left;
        }
        table td{
            padding: 10px;
        }
        body{
            background-color: rgb(32, 1, 1);
            color: white;
        }
        .books-block{
            display: flex;
            gap: 50px; /* Spacing between items */
            overflow-x: auto; /* Enable horizontal scrollbar */
            max-width: 100%; /* Ensure it doesn't overflow container */
            padding-bottom: 20px; /* Add some padding at the bottom for better visibility */
        }
        .books-block table {
            width: 330px; /* Set width for each table */
        }
        .book-container {
            border: 1px solid white;
            padding: 20px;
            border-radius: 8px;
            width: 350px; /* Adjust width to fit your design */
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Book List</h1>
            <div>
            <a href="../../User1.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <h2 id="fiction" style="padding:20px 0px;">Category: Fiction</h2>
        <div class="books-block" id="fiction-books">
            <?php
            // Include database connection
            include('../../database.php');
            
            // Fetch books for Fiction category
            $sqlSelectFiction = "SELECT * FROM uploadbook WHERE category = 'Fiction'";
            $resultFiction = mysqli_query($conn,$sqlSelectFiction);
            while($dataFiction = mysqli_fetch_array($resultFiction)){
                ?>
                <div class="book-container">
                    <table>
                        <tr>
                            <td colspan="2">
                            <img src="../../Adminfolder/uploads/<?php echo $dataFiction['image_url']; ?>" alt="Book Cover" width="200px" height="250px" style="margin:0px 14%">
                        </td>
                        </tr>
                        <tr>
                            <td>Book Name:</td>
                            <td><?php echo $dataFiction['bookName']; ?></td>
                        </tr>
                        <tr>
                            <td>Author:</td>
                            <td><?php echo $dataFiction['author']; ?></td>
                        </tr>
                        <tr>
                            <td>Edition:</td>
                            <td><?php echo $dataFiction['edition']; ?></td>
                        </tr>
                        <tr>
                            <td>Year:</td>
                            <td><?php echo $dataFiction['publishedYear']; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <a href="downloadprocess.php?id=<?php echo $dataFiction['id']; ?>" class="btn btn-primary">Download</a>
                        </td>
                        </tr>
                    </table>
                </div>
                <?php
            }
            ?>
        </div>
        

        
        <!-- Category: History -->
        <h2 id="History" style="padding:20px 0px;">Category: History</h2>
        <div class="books-block" id="History-books">
            <?php
            // Fetch books for History category
            $sqlSelectHistory = "SELECT * FROM uploadbook WHERE category = 'History'";
            $resultHistory = mysqli_query($conn,$sqlSelectHistory);
            while($dataHistory = mysqli_fetch_array($resultHistory)){
                ?>
                <div class="book-container">
                    <table>
                    <tr>
                            <td colspan="2">
                            <img src="../../Adminfolder/uploads/<?php echo $dataHistory['image_url']; ?>" alt="Book Cover" width="200px" height="250px" style="margin:0px 14%">
                        </td>
                        </tr>
                        <tr>
                            <td>Book Name:</td>
                            <td><?php echo $dataHistory['bookName']; ?></td>
                        </tr>
                        <tr>
                            <td>Author:</td>
                            <td><?php echo $dataHistory['author']; ?></td>
                        </tr>
                        <tr>
                            <td>Edition:</td>
                            <td><?php echo $dataHistory['edition']; ?></td>
                        </tr>
                        <tr>
                            <td>Year:</td>
                            <td><?php echo $dataHistory['publishedYear']; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <a href="downloadprocess.php?id=<?php echo $dataHistory['id']; ?>" class="btn btn-primary">Download</a>
                        </td>
                        </tr>
                    </table>
                </div>
                <?php
            }
            ?>
        </div>
        
         <!-- Category: Comics -->
         <h2 id="Comics" style="padding:20px 0px;">Category: Comics</h2>
        <div class="books-block" id="Comics-books">
            <?php
            // Fetch books for Comics category
            $sqlSelectComics = "SELECT * FROM uploadbook WHERE category = 'Comics'";
            $resultComics = mysqli_query($conn,$sqlSelectComics);
            while($dataComics = mysqli_fetch_array($resultComics)){
                ?>
                <div class="book-container">
                    <table>
                    <tr>
                            <td colspan="2">
                            <img src="../../Adminfolder/uploads/<?php echo $dataComics['image_url']; ?>" alt="Book Cover" width="200px" height="250px" style="margin:0px 14%">
                        </td>
                        </tr>
                        <tr>
                            <td>Book Name:</td>
                            <td><?php echo $dataComics['bookName']; ?></td>
                        </tr>
                        <tr>
                            <td>Author:</td>
                            <td><?php echo $dataComics['author']; ?></td>
                        </tr>
                        <tr>
                            <td>Edition:</td>
                            <td><?php echo $dataComics['edition']; ?></td>
                        </tr>
                        <tr>
                            <td>Year:</td>
                            <td><?php echo $dataComics['publishedYear']; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <a href="downloadprocess.php?id=<?php echo $dataComics['id']; ?>" class="btn btn-primary">Download</a>
                        </td>
                        </tr>
                    </table>
                </div>
                <?php
            }
            ?>
        </div>
        <!-- Category: Mystery -->
        <h2 id="mystery" style="padding:20px 0px;">Category: Mystery</h2>
        <div class="books-block" id="mystery-books">
            <?php
            // Fetch books for Mystery category
            $sqlSelectMystery = "SELECT * FROM uploadbook WHERE category = 'Mystery'";
            $resultMystery = mysqli_query($conn,$sqlSelectMystery);
            while($dataMystery = mysqli_fetch_array($resultMystery)){
                ?>
                <div class="book-container">
                    <table>
                    <tr>
                            <td colspan="2">
                            <img src="../../Adminfolder/uploads/<?php echo $dataMystery['image_url']; ?>" alt="Book Cover" width="200px" height="250px" style="margin:0px 14%">
                        </td>
                        </tr>
                        <tr>
                            <td>Book Name:</td>
                            <td><?php echo $dataMystery['bookName']; ?></td>
                        </tr>
                        <tr>
                            <td>Author:</td>
                            <td><?php echo $dataMystery['author']; ?></td>
                        </tr>
                        <tr>
                            <td>Edition:</td>
                            <td><?php echo $dataMystery['edition']; ?></td>
                        </tr>
                        <tr>
                            <td>Year:</td>
                            <td><?php echo $dataMystery['publishedYear']; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <a href="downloadprocess.php?id=<?php echo $dataMystery['id']; ?>" class="btn btn-primary">Download</a>
                        </td>
                        </tr>
                    </table>
                </div>
                <?php
            }
            ?>
        </div>
         <!-- Category: Mathematics -->
         <h2 id="Mathematics" style="padding:20px 0px;">Category: Mathematics</h2>
        <div class="books-block" id="Mathematics-books">
            <?php
            // Fetch books for Mathematics category
            $sqlSelectMathematics = "SELECT * FROM uploadbook WHERE category = 'Mathematics'";
            $resultMathematics = mysqli_query($conn,$sqlSelectMathematics);
            while($dataMathematics = mysqli_fetch_array($resultMathematics)){
                ?>
                <div class="book-container">
                    <table>
                    <tr>
                            <td colspan="2">
                            <img src="../../Adminfolder/uploads/<?php echo $dataMathematics['image_url']; ?>" alt="Book Cover" width="200px" height="250px" style="margin:0px 14%">
                        </td>
                        </tr>
                        <tr>
                            <td>Book Name:</td>
                            <td><?php echo $dataMathematics['bookName']; ?></td>
                        </tr>
                        <tr>
                            <td>Author:</td>
                            <td><?php echo $dataMathematics['author']; ?></td>
                        </tr>
                        <tr>
                            <td>Edition:</td>
                            <td><?php echo $dataMathematics['edition']; ?></td>
                        </tr>
                        <tr>
                            <td>Year:</td>
                            <td><?php echo $dataMathematics['publishedYear']; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <a href="downloadprocess.php?id=<?php echo $dataMathematics['id']; ?>" class="btn btn-primary">Download</a>
                        </td>
                        </tr>
                    </table>
                </div>
                <?php
            }
            ?>
        </div>
         <!-- Category: Programming -->
         <h2 id="Programming" style="padding:20px 0px;">Category: Programming</h2>
        <div class="books-block" id="Programming-books">
            <?php
            // Fetch books for Programming category
            $sqlSelectProgramming = "SELECT * FROM uploadbook WHERE category = 'Programming'";
            $resultProgramming = mysqli_query($conn,$sqlSelectProgramming);
            while($dataProgramming = mysqli_fetch_array($resultProgramming)){
                ?>
                <div class="book-container">
                    <table>
                    <tr>
                            <td colspan="2">
                            <img src="../../Adminfolder/uploads/<?php echo $dataProgramming['image_url']; ?>" alt="Book Cover" width="200px" height="250px" style="margin:0px 14%">
                        </td>
                        </tr>
                        <tr>
                            <td>Book Name:</td>
                            <td><?php echo $dataProgramming['bookName']; ?></td>
                        </tr>
                        <tr>
                            <td>Author:</td>
                            <td><?php echo $dataProgramming['author']; ?></td>
                        </tr>
                        <tr>
                            <td>Edition:</td>
                            <td><?php echo $dataProgramming['edition']; ?></td>
                        </tr>
                        <tr>
                            <td>Year:</td>
                            <td><?php echo $dataProgramming['publishedYear']; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <a href="downloadprocess.php?id=<?php echo $dataProgramming['id']; ?>" class="btn btn-primary">Download</a>
                        </td>
                        </tr>
                    </table>
                </div>
                <?php
            }
            ?>
        </div>
         <!-- Category: Electronics -->
         <h2 id="Electronics" style="padding:20px 0px;">Category: Electronics</h2>
        <div class="books-block" id="Electronics-books">
            <?php
            // Fetch books for Electronics category
            $sqlSelectElectronics = "SELECT * FROM uploadbook WHERE category = 'Electronics'";
            $resultElectronics = mysqli_query($conn,$sqlSelectElectronics);
            while($dataElectronics = mysqli_fetch_array($resultElectronics)){
                ?>
                <div class="book-container">
                    <table>
                    <tr>
                            <td colspan="2">
                            <img src="../../Adminfolder/uploads/<?php echo $dataElectronics['image_url']; ?>" alt="Book Cover" width="200px" height="250px" style="margin:0px 14%">
                        </td>
                        </tr>
                        <tr>
                            <td>Book Name:</td>
                            <td><?php echo $dataElectronics['bookName']; ?></td>
                        </tr>
                        <tr>
                            <td>Author:</td>
                            <td><?php echo $dataElectronics['author']; ?></td>
                        </tr>
                        <tr>
                            <td>Edition:</td>
                            <td><?php echo $dataElectronics['edition']; ?></td>
                        </tr>
                        <tr>
                            <td>Year:</td>
                            <td><?php echo $dataElectronics['publishedYear']; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <a href="downloadprocess.php?id=<?php echo $dataElectronics['id']; ?>" class="btn btn-primary">Download</a>
                        </td>
                        </tr>
                    </table>
                </div>
                <?php
            }
            ?>
        </div>
         <!-- Category: Aptitude -->
         <h2 id="Aptitude" style="padding:20px 0px;">Category: Aptitude</h2>
        <div class="books-block" id="Aptitude-books">
            <?php
            // Fetch books for Aptitude category
            $sqlSelectAptitude = "SELECT * FROM uploadbook WHERE category = 'Aptitude'";
            $resultAptitude = mysqli_query($conn,$sqlSelectAptitude);
            while($dataAptitude = mysqli_fetch_array($resultAptitude)){
                ?>
                <div class="book-container">
                    <table>
                    <tr>
                            <td colspan="2">
                            <img src="../../Adminfolder/uploads/<?php echo $dataAptitude['image_url']; ?>" alt="Book Cover" width="200px" height="250px" style="margin:0px 14%">
                        </td>
                        </tr>
                        <tr>
                            <td>Book Name:</td>
                            <td><?php echo $dataAptitude['bookName']; ?></td>
                        </tr>
                        <tr>
                            <td>Author:</td>
                            <td><?php echo $dataAptitude['author']; ?></td>
                        </tr>
                        <tr>
                            <td>Edition:</td>
                            <td><?php echo $dataAptitude['edition']; ?></td>
                        </tr>
                        <tr>
                            <td>Year:</td>
                            <td><?php echo $dataAptitude['publishedYear']; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <a href="downloadprocess.php?id=<?php echo $dataAptitude['id']; ?>" class="btn btn-primary">Download</a>
                        </td>
                        </tr>
                    </table>
                </div>
                <?php
            }
            ?>
        </div>
         <!-- Category: CompetitiveExams -->
         <h2 id="CompetitiveExams" style="padding:20px 0px;">Category: CompetitiveExams</h2>
        <div class="books-block" id="CompetitiveExams-books">
            <?php
            // Fetch books for CompetitiveExams category
            $sqlSelectCompetitiveExams = "SELECT * FROM uploadbook WHERE category = 'CompetitiveExams'";
            $resultCompetitiveExams = mysqli_query($conn,$sqlSelectCompetitiveExams);
            while($dataCompetitiveExams = mysqli_fetch_array($resultCompetitiveExams)){
                ?>
                <div class="book-container">
                    <table>
                    <tr>
                            <td colspan="2">
                            <img src="../../Adminfolder/uploads/<?php echo $dataCompetitiveExams['image_url']; ?>" alt="Book Cover" width="200px" height="250px" style="margin:0px 14%">
                        </td>
                        </tr>
                        <tr>
                            <td>Book Name:</td>
                            <td><?php echo $dataCompetitiveExams['bookName']; ?></td>
                        </tr>
                        <tr>
                            <td>Author:</td>
                            <td><?php echo $dataCompetitiveExams['author']; ?></td>
                        </tr>
                        <tr>
                            <td>Edition:</td>
                            <td><?php echo $dataCompetitiveExams['edition']; ?></td>
                        </tr>
                        <tr>
                            <td>Year:</td>
                            <td><?php echo $dataCompetitiveExams['publishedYear']; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <a href="downloadprocess.php?id=<?php echo $dataCompetitiveExams['id']; ?>" class="btn btn-primary">Download</a>
                        </td>
                        </tr>
                    </table>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>
</html>
</body>
</html>