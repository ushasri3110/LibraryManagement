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
            <h1>Books List</h1>
            <div>
            <a href="../../User1.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <?php
        session_start();
        if (isset($_SESSION["reserve"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["reserve"];
            ?>
        </div>
        <?php
        unset($_SESSION["reserve"]);
        }
        ?>
        <?php
        if (isset($_SESSION["outofstock"])) {
        ?>
        <div class="alert alert-danger">
            <?php 
            echo $_SESSION["outofstock"];
            ?>
        </div>
        <?php
        unset($_SESSION["outofstock"]);
        }
        ?>
          <!-- Category: Fiction -->
       <h2 id="fiction" style="padding:20px 0px;">Category: Fiction</h2>
        <div class="books-block" id="fiction-books">
            <?php
            // Include database connection
            include('../../database.php');
            
            // Fetch books for Fiction category
            $sqlSelectFiction = "SELECT * FROM books WHERE category = 'Fiction'";
            $resultFiction = mysqli_query($conn,$sqlSelectFiction);
            while($dataFiction = mysqli_fetch_array($resultFiction)){
                ?>
                <div class="book-container">
                    <table>
                    <tr>
                            <td colspan="2">
                            <img src="../../Adminfolder/BookAvailability/<?php echo $dataFiction['image_url']; ?>" alt="Book Cover" width="200px" height="250px" style="margin:0px 14%">
                            </td>
                        <tr>
                            <td>Book Name:</td>
                            <td><?php echo $dataFiction['book']; ?></td>
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
                            <td><?php echo $dataFiction['year']; ?></td>
                        </tr>
                        <tr>
                            <td>Quantity:</td>
                            <td><?php echo $dataFiction['quantity']; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <a href="reserveForm.php?id=<?php echo $dataFiction['id']; ?>" class="btn btn-primary">Reserve Book</a>
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
            $sqlSelectHistory = "SELECT * FROM books WHERE category = 'History'";
            $resultHistory = mysqli_query($conn,$sqlSelectHistory);
            while($dataHistory = mysqli_fetch_array($resultHistory)){
                ?>
                <div class="book-container">
                    <table>
                    <tr>
                            <td colspan="2">
                            <img src="../../Adminfolder/BookAvailability/<?php echo $dataHistory['image_url']; ?>" alt="Book Cover" width="200px" height="250px" style="margin:0px 14%">
                            </td>
                        <tr>
                            <td>Book Name:</td>
                            <td><?php echo $dataHistory['book']; ?></td>
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
                            <td><?php echo $dataHistory['year']; ?></td>
                        </tr>
                        <tr>
                            <td>Quantity:</td>
                            <td><?php echo $dataHistory['quantity']; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <a href="reserveForm.php?id=<?php echo $dataHistory['id']; ?>" class="btn btn-primary">Reserve Book</a>
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
            $sqlSelectComics = "SELECT * FROM books WHERE category = 'Comics'";
            $resultComics = mysqli_query($conn,$sqlSelectComics);
            while($dataComics = mysqli_fetch_array($resultComics)){
                ?>
                <div class="book-container">
                    <table>
                    <tr>
                            <td colspan="2">
                            <img src="../../Adminfolder/BookAvailability/<?php echo $dataComics['image_url']; ?>" alt="Book Cover" width="200px" height="250px" style="margin:0px 14%">
                            </td>
                        <tr>
                            <td>Book Name:</td>
                            <td><?php echo $dataComics['book']; ?></td>
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
                            <td><?php echo $dataComics['year']; ?></td>
                        </tr>
                        <tr>
                            <td>Quantity:</td>
                            <td><?php echo $dataComics['quantity']; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <a href="reserveForm.php?id=<?php echo $dataComics['id']; ?>" class="btn btn-primary">Reserve Book</a>
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
            $sqlSelectMystery = "SELECT * FROM books WHERE category = 'Mystery'";
            $resultMystery = mysqli_query($conn,$sqlSelectMystery);
            while($dataMystery = mysqli_fetch_array($resultMystery)){
                ?>
                <div class="book-container">
                    <table>
                    <tr>
                            <td colspan="2">
                            <img src="../../Adminfolder/BookAvailability/<?php echo $dataMystery['image_url']; ?>" alt="Book Cover" width="200px" height="250px" style="margin:0px 14%">
                            </td>
                        <tr>
                            <td>Book Name:</td>
                            <td><?php echo $dataMystery['book']; ?></td>
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
                            <td><?php echo $dataMystery['year']; ?></td>
                        </tr>
                        <tr>
                            <td>Quantity:</td>
                            <td><?php echo $dataMystery['quantity']; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <a href="reserveForm.php?id=<?php echo $dataMystery['id']; ?>" class="btn btn-primary">Reserve Book</a>
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
            $sqlSelectMathematics = "SELECT * FROM books WHERE category = 'Mathematics'";
            $resultMathematics = mysqli_query($conn,$sqlSelectMathematics);
            while($dataMathematics = mysqli_fetch_array($resultMathematics)){
                ?>
                <div class="book-container">
                    <table>
                    <tr>
                            <td colspan="2">
                            <img src="../../Adminfolder/BookAvailability/<?php echo $dataMathematics['image_url']; ?>" alt="Book Cover" width="200px" height="250px" style="margin:0px 14%">
                            </td>
                        <tr>
                            <td>Book Name:</td>
                            <td><?php echo $dataMathematics['book']; ?></td>
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
                            <td><?php echo $dataMathematics['year']; ?></td>
                        </tr>
                        <tr>
                            <td>Quantity:</td>
                            <td><?php echo $dataMathematics['quantity']; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <a href="reserveForm.php?id=<?php echo $dataMathematics['id']; ?>" class="btn btn-primary">Reserve Book</a>
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
            $sqlSelectProgramming = "SELECT * FROM books WHERE category = 'Programming'";
            $resultProgramming = mysqli_query($conn,$sqlSelectProgramming);
            while($dataProgramming = mysqli_fetch_array($resultProgramming)){
                ?>
                <div class="book-container">
                    <table>
                    <tr>
                            <td colspan="2">
                            <img src="../../Adminfolder/BookAvailability/<?php echo $dataProgramming['image_url']; ?>" alt="Book Cover" width="200px" height="250px" style="margin:0px 14%">
                            </td>
                        <tr>
                            <td>Book Name:</td>
                            <td><?php echo $dataProgramming['book']; ?></td>
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
                            <td><?php echo $dataProgramming['year']; ?></td>
                        </tr>
                        <tr>
                            <td>Quantity:</td>
                            <td><?php echo $dataProgramming['quantity']; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <a href="reserveForm.php?id=<?php echo $dataProgramming['id']; ?>" class="btn btn-primary">Reserve Book</a>
                        </td>
                        </tr>
                    </table>
                </div>
                <?php
            }
            ?>
        </div>  
        <!-- Category: Electronics-->
        <h2 id="Electronics" style="padding:20px 0px;">Category: Electronics</h2>
        <div class="books-block" id="Electronics-books">
            <?php
            // Fetch books for Electronicscategory
            $sqlSelectElectronics= "SELECT * FROM books WHERE category = 'Electronics'";
            $resultElectronics= mysqli_query($conn,$sqlSelectElectronics);
            while($dataElectronics= mysqli_fetch_array($resultElectronics)){
                ?>
                <div class="book-container">
                    <table>
                    <tr>
                            <td colspan="2">
                            <img src="../../Adminfolder/BookAvailability/<?php echo $dataElectronics['image_url']; ?>" alt="Book Cover" width="200px" height="250px" style="margin:0px 14%">
                            </td>
                        <tr>
                            <td>Book Name:</td>
                            <td><?php echo $dataElectronics['book']; ?></td>
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
                            <td><?php echo $dataElectronics['year']; ?></td>
                        </tr>
                        <tr>
                            <td>Quantity:</td>
                            <td><?php echo $dataElectronics['quantity']; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <a href="reserveForm.php?id=<?php echo $dataElectronics['id']; ?>" class="btn btn-primary">Reserve Book</a>
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
            $sqlSelectAptitude = "SELECT * FROM books WHERE category = 'Aptitude'";
            $resultAptitude = mysqli_query($conn,$sqlSelectAptitude);
            while($dataAptitude = mysqli_fetch_array($resultAptitude)){
                ?>
                <div class="book-container">
                    <table>
                    <tr>
                            <td colspan="2">
                            <img src="../../Adminfolder/BookAvailability/<?php echo $dataAptitude['image_url']; ?>" alt="Book Cover" width="200px" height="250px" style="margin:0px 14%">
                            </td>
                        <tr>
                            <td>Book Name:</td>
                            <td><?php echo $dataAptitude['book']; ?></td>
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
                            <td><?php echo $dataAptitude['year']; ?></td>
                        </tr>
                        <tr>
                            <td>Quantity:</td>
                            <td><?php echo $dataAptitude['quantity']; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <a href="reserveForm.php?id=<?php echo $dataAptitude['id']; ?>" class="btn btn-primary">Reserve Book</a>
                        </td>
                        </tr>
                    </table>
                </div>
                <?php
            }
            ?>
        </div>  
        <!-- Category: CompetitiveExams -->
        <h2 id="CompetitiveExams" style="padding:20px 0px;">Category: Competitive Exams</h2>
        <div class="books-block" id="CompetitiveExams-books">
            <?php
            // Fetch books for CompetitiveExams category
            $sqlSelectCompetitiveExams = "SELECT * FROM books WHERE category = 'CompetitiveExams'";
            $resultCompetitiveExams = mysqli_query($conn,$sqlSelectCompetitiveExams);
            while($dataCompetitiveExams = mysqli_fetch_array($resultCompetitiveExams)){
                ?>
                <div class="book-container">
                    <table>
                    <tr>
                            <td colspan="2">
                            <img src="../../Adminfolder/BookAvailability/<?php echo $dataCompetitiveExams['image_url']; ?>" alt="Book Cover" width="200px" height="250px" style="margin:0px 14%">
                            </td>
                        <tr>
                            <td>Book Name:</td>
                            <td><?php echo $dataCompetitiveExams['book']; ?></td>
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
                            <td><?php echo $dataCompetitiveExams['year']; ?></td>
                        </tr>
                        <tr>
                            <td>Quantity:</td>
                            <td><?php echo $dataCompetitiveExams['quantity']; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <a href="reserveForm.php?id=<?php echo $dataCompetitiveExams['id']; ?>" class="btn btn-primary">Reserve Book</a>
                        </td>
                        </tr>
                    </table>
                </div>
                <?php
            }
            ?>
        </div>  
        <!-- Category: Magazines -->
        <h2 id="Magazines" style="padding:20px 0px;">Category: Magazines</h2>
        <div class="books-block" id="Magazines-books">
            <?php
            // Fetch books for Magazines category
            $sqlSelectMagazines = "SELECT * FROM books WHERE category = 'Magazines'";
            $resultMagazines = mysqli_query($conn,$sqlSelectMagazines);
            while($dataMagazines = mysqli_fetch_array($resultMagazines)){
                ?>
                <div class="book-container">
                    <table>
                    <tr>
                            <td colspan="2">
                            <img src="../../Adminfolder/BookAvailability/<?php echo $dataMagazines['image_url']; ?>" alt="Book Cover" width="200px" height="250px" style="margin:0px 14%">
                            </td>
                        <tr>
                            <td>Magazine Name:</td>
                            <td><?php echo $dataMagazines['book']; ?></td>
                        </tr>
                        <tr>
                            <td>Year:</td>
                            <td><?php echo $dataMagazines['year']; ?></td>
                        </tr>
                        <tr>
                            <td>Quantity:</td>
                            <td><?php echo $dataMagazines['quantity']; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <a href="reserveForm.php?id=<?php echo $dataMagazines['id']; ?>" class="btn btn-primary">Reserve Book</a>
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