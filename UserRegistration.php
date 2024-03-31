<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: User1.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="static/images/book.png" type="image/x-icon">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="static/css/User.css">
    <style>
        .alert{
            color:white;
            font-size: 20px;
            padding-bottom:15px;
        }
        button{
            padding:7px 10px;
            border-radius: 20px;
            cursor: pointer;
        }
        .btn-class{
            padding:10px;
        }
        </style>
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
    <div class="container">
    <center>
        <div class="btn-class"><a href="index.php"><button><i class="fas fa-home"></i></i>&nbsp;&nbsp;Home</button></a></div>
        </center>
        <div class="forms-wrapper">
            <!-- sign in form -->
            <form id="signin-form" class="signin-form" action="usersignin.php" method="POST">
                <a href="#" class="signup-btn">Sign Up</a>
                <?php
                if (isset($_SESSION["password"])) {?>
                <div class="alert">
                <?php
                echo $_SESSION["password"];?>
                </div>
                <?php
                unset($_SESSION["password"]);
                }
                ?>
               <?php
                if (isset($_SESSION["email"])) {?>
                <div class="alert">
                <?php
                echo $_SESSION["email"];?>
                </div>
                <?php
                unset($_SESSION["email"]);
                }
                ?>
                <h2>Sign In</h2>
                <div class="inputs-wrapper">
                    <input id="signin-email" type="email" name="email" placeholder="Your Email">
                    <input id="signin-password" type="password" name="password" placeholder="Password">
                    <input type="submit" value="Sign In" name="signin">
                </div>
            </form>
            <!--end of  sign in form -->
            <!-- sign up form -->
            <form id="signup-form" class="signup-form" action="usersignup.php" method="POST">
                <a href="#" class="signin-btn">Sign In</a>
                <?php
                if (isset($_SESSION["successfull"])) {?>
                <div class="alert">
                <?php
                echo $_SESSION["successfull"];?>
                </div>
                <?php
                unset($_SESSION["successfull"]);
                }
                ?>
                <h2>Sign Up</h2>
                <div class="inputs-wrapper">
                    <input id="signup-name" type="text" name="name" placeholder="Your Name">
                    <input id="signup-email" type="email" name="email" placeholder="Your Email">
                    <input id="signup-password" type="password" name="password" placeholder="Password">
                    <input id="signup-confirm-password" type="password" name="confirm_password" placeholder="Confirm Password">
                    <input type="submit" value="Sign Up" name="submit">
                </div>
            </form>
            <!--end of  sign up form -->
        </div>
    </div>
    <script>
        const signUpBtn = document.querySelector(".signup-btn");
        const signInBtn = document.querySelector(".signin-btn");
        const formsWrapper = document.querySelector(".forms-wrapper");

        signUpBtn.addEventListener("click", (e) => {
            e.preventDefault();
            formsWrapper.classList.add("change");
        });

        signInBtn.addEventListener("click", (e) => {
            e.preventDefault();
            formsWrapper.classList.remove("change");
        });
    </script>  
</body>
</html>