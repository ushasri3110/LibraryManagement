<?php
session_start();
if (!isset($_SESSION["admin"])) {
   header("Location: adminsignin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="icon" href="static/images/book.png" type="image/x-icon">
    <link rel="stylesheet" href="static/css/Admin1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script>
        // Function to handle button clicks and redirect to the specified page
        function redirectToPage(pageURL) {
            window.open(pageURL, '_blank'); // Open in a new tab
        }
    </script>
</head>
<body>

<div class="cursor">
      
      <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
      </div>
        
  
    <script>
  const coords = { x: 0, y: 0 };
  const circles = document.querySelectorAll(".circle");
  
  const cursor = document.querySelector(".cursor");
  
  circles.forEach(function (circle, index) {
    circle.x = 0;
    circle.y = 0;
    circle.style.backgroundColor = "grey";
  });
  
  window.addEventListener("mousemove", function (e) {
    coords.x = e.clientX;
    coords.y = e.clientY;
  });
  
  function animateCircles() {
    let x = coords.x;
    let y = coords.y;
  
    cursor.style.top = x;
    cursor.style.left = y;
    
    circles.forEach(function (circle, index) {
      circle.style.left = x - 12 + "px";
      circle.style.top = y - 12 + "px";
  
      circle.style.scale = (circles.length - index) / circles.length;
  
      circle.x = x;
      circle.y = y;
  
      const nextCircle = circles[index + 1] || circles[0];
      x += (nextCircle.x - x) * 0.3;
      y += (nextCircle.y - y) * 0.3;
    });
  
    requestAnimationFrame(animateCircles);
  }
  
  animateCircles();
  
    </script>
    <div class="background">
        <a href="logout.php"><button>Log Out</button></a>
        <div class="features-block">
            <div class="feature"><i class="fas fa-home"></i></i>&nbsp;&nbsp;<a href="index.php"><b>Home</b></a></div>
        </div>

        <div class="row" style="margin:7%">
            <div class="column" >
                <a href="Adminfolder/BookAvailability/BookAvailability.php"><button>Available Books</button></a>
            </div>
            <div class="column">
                <a href="Adminfolder/uploads/upload.php"><button>Upload</button></a>
            </div>
            <div class="column">
            <a href="Adminfolder/Requests/requests.php"><button>Requests</button></a>
            </div>
            <div class="column">
            <a href="Adminfolder/UsersList/userslist.php"><button>User's List</button></a>
            </div>
        </div>

        <div class="row" style="margin:5%">
            <div class="column" >
                <a href="Adminfolder/IssueBook/issueBook.php"><button>Issue Book</button></a>
            </div>
            <div class="column">
            <a href="Adminfolder/CollectBook/collectbook.php"><button>Collect Book</button></a>
            </div>
            <div class="column">
                <a href="Adminfolder/suggestions/displaySuggestion.php"><button>Suggestions</button></a>
            </div>
        </div>
        
        
    </div>
</body>
</html>
