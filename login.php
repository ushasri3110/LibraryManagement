<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
            body {
            display: flex;
            align-items: center;
            position: relative;
            /* background: linear-gradient(to bottom right, #070630 0%,#060454 100%); */
            background-color: rgb(32, 1, 1);
            /* background-image: url("static/images/LoginBackground.jpg"); */
            min-height: 100vh;
            }

            .animation-container {
                display: block;
                position: relative;
                width: 800px;
                max-width: 100%;
                margin: 0 auto;
                
                .lightning-container {
                    position: absolute;
                    top: 50%;
                    left: 0;
                    display: flex;
                    transform: translateY(-50%);
                    
                    .lightning {
                        position: absolute;
                        display: block;
                        height: 12px;
                        width: 12px;
                        border-radius: 12px;
                        transform-origin: 6px 6px;

                        animation-name: woosh;
                        animation-duration: 1.5s;
                        animation-iteration-count: infinite;
                        animation-timing-function: cubic-bezier(0.445, 0.050, 0.550, 0.950);
                        animation-direction: alternate;

                        &.white {
                            background-color: white;
                            box-shadow: 0px 50px 50px 0px transparentize(white, 0.7);
                        }

                        &.red {
                            background-color: #fc7171;
                            box-shadow: 0px 50px 50px 0px transparentize(#fc7171, 0.7);
                            animation-delay: 0.2s;
                        }

                        &.green {
                            background-color: #71fcfc;
                            box-shadow: 0px 50px 50px 0px transparentize(#71fcfc, 0.7);
                            animation-delay: 0.4s; /* Adjust the delay */
                        }
                    }
                }
                
                
                .boom-container {
                    position: absolute;
                    display: flex;
                    width: 80px;
                    height: 80px;
                    text-align: center;
                    align-items: center;
                    transform: translateY(-50%);
                left: 200px;
                top: -145px;
                    
                    .shape {
                        display: inline-block;
                        position: relative;
                        opacity: 0;
                        transform-origin: center center;
                        
                        &.triangle {
                            width: 0;
                            height: 0;
                            border-style: solid;
                            transform-origin: 50% 80%;
                            animation-duration: 1s;
                            animation-timing-function: ease-out;
                            animation-iteration-count: infinite;
                            margin-left: -15px;
                            border-width: 0 2.5px 5px 2.5px;
                            border-color: transparent transparent #42e599 transparent;
                            animation-name: boom-triangle;
                            
                            &.big {
                                margin-left: -25px;
                                border-width: 0 5px 10px 5px;
                                border-color: transparent transparent #fade28 transparent;
                                animation-name: boom-triangle-big;
                            }
                        }
                        
                        &.disc {
                            width: 8px;
                            height: 8px;
                            border-radius: 100%;
                            background-color: #d15ff4;
                            animation-name: boom-disc;
                            animation-duration: 1s;
                            animation-timing-function: ease-out;
                            animation-iteration-count: infinite;
                        }
                        
                        &.circle {
                            width: 20px;
                            height: 20px;
                            animation-name: boom-circle;
                            animation-duration: 1s;
                            animation-timing-function: ease-out;
                            animation-iteration-count: infinite;
                            border-radius: 100%;
                            margin-left: -30px;
                            
                            &.white {
                                border: 1px solid white;
                            }
                            
                            &.big {
                                width: 40px;
                                height: 40px;
                                margin-left: 0px;
                                
                                &.white {
                                    border: 2px solid white;
                                }
                            }
                        }
                        
                        &:after {
                            background-color: rgba(178, 215, 232, 0.2);
                        }
                    }
                    
                    .shape {
                        &.triangle, &.circle, &.circle.big, &.disc {
                            animation-delay: .38s;
                            animation-duration: 3s;
                        }
                        
                        &.circle {
                            animation-delay: 0.6s;
                        }
                    }
                    
                    &.second {
                        left: 485px;
                        top: 155px;

                    }
                
                &.third { /* Added CSS rule for .third class */
                left: 800px ;
                top: -130px;
                .shape.triangle.big {
                    border-color: transparent transparent #f00 transparent; /* Changed border color to red */
                }
            
                }
                }
            }

            @keyframes woosh {
                0% {
                    width: 12px;
                    transform: translate(-200px, 20px) rotate(-25deg);
                }
                15% {
                    width: 50px;
                }
                30% {
                    width: 12px;
                    transform: translate(214px, -150px) rotate(-35deg);
                }
                30.1% {
                    transform: translate(214px, -150px) rotate(46deg);
                }
                50% {
                    width: 110px;
                }
                70% {
                    width: 12px;
                    transform: translate(500px, 150px) rotate(46deg);
                }
                70.1% {
                    transform: translate(500px, 150px) rotate(-37deg);
                }
                
                85% {
                    width: 50px;
                }
                100% {
                    width: 12px;
                    transform: translate(800px, -130px) rotate(-37deg);
                }
            }

            @keyframes boom-circle {
                0% {
                    opacity: 0;
                }
                5% {
                    opacity: 1;
                }
                30% {
                    opacity: 0;
                    transform: scale(3);
                }
                100% {
                }
            }

            @keyframes boom-triangle-big {
                0% {
                    opacity: 0;
                }
                5% {
                    opacity: 1;
                }
                40% {
                    opacity: 0;
                    transform: scale(2.5) translate(50px, -50px) rotate(360deg);
                }
                100% {
                }
            }

            @keyframes boom-triangle {
                0% {
                    opacity: 0;
                }
                5% {
                    opacity: 1;
                }
                30% {
                    opacity: 0;
                    transform: scale(3) translate(20px, 40px) rotate(360deg);
                }
                100% {
                }
            }

            @keyframes boom-disc {
                0% {
                    opacity: 0;
                }
                5% {
                    opacity: 1;
                }
                40% {
                    opacity: 0;
                    transform: scale(2) translate(-70px, -30px);
                }
                100% {
                    
                }
            }


                /* Styles for the transparent background */
                body{
                    background-color: rgb(32, 1, 1);
                }
                .overlay {
                    position: fixed;
                    /* with the following 3 lines the black transparent box be in the middle of the page */
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    width: 50%;
                    height: 50%;
                    background-color: rgba(255, 192, 203, 0.6); /* Pink with 50% opacity */
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    z-index: 999; /* Ensure it appears above other content */
                    border-radius: 10px;
                }
                .overlay:hover {
                    background-color: rgba(173, 216, 230, 0.6); /* Light blue with 50% opacity */
                }

                /* Styles for the links */
                .links {
                    text-align: center;
                }
                .links a {
                    display: block;
                    margin-bottom: 20px;
                    color: white;
                    text-decoration: none;
                    font-size: 24px;
                    position: relative;
                    transition: background-color 0.3s ease, color 0.3s ease; /* Transitions for background color and text color */
                }
                .button{
                    padding: 10px 20px;
                    background-color: rgb(32, 1, 1); 
                    color: white; 
                    text-decoration: none;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    position: relative;
                }
                /* Adding hover effect specifically to the text */
                .button:hover::before {
                    transform: scaleX(1);
                    transform-origin: bottom left;
                }
                .button:hover i {
                    text-decoration: none; /* Remove underline on hover */
                }
                /* Styling the icons */
                .button i {
                    margin-right: 5px;
                }
                /* Adding hover effect to the icons */
                .button i:hover {
                    text-decoration: none; /* Remove underline on hover */
                }
                /* Adding hover effect to the icon before */
                .button:hover i::before {
                    transform: scaleX(1);
                    transform-origin: bottom left;
                }
                /* Change text color to black and background color to white on hover */
                .button:hover {
                    color: black;
                    background-color: white;
                }

                .cursor {
                    pointer-events: none;
                    position: fixed;
                    display: block;
                    border-radius: 0;
                    mix-blend-mode: difference;
                    top: 0;
                    left: 0;
                    z-index: 9999999999999999;  
                    }

                .circle {
                        position: absolute;
                        display: block;
                        width: 26px;
                        height: 26px;
                        border-radius: 20px;
                        background-color: #fff;
                    }


    </style>
</head>
<body>

    <!-- cursor -->
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

<div class="animation-container">
        <div class="lightning-container">
            <div class="lightning white"></div>
            <div class="lightning red"></div>
            <div class="lightning green"></div> <!-- Added green lightning -->
        </div>
        <div class="boom-container">
            <div class="shape circle big white"></div>
            <div class="shape circle white"></div>
            <div class="shape triangle big yellow"></div>
            <div class="shape disc white"></div>
            <div class="shape triangle blue"></div>
        </div>
        <div class="boom-container second">
            <div class="shape circle big white"></div>
            <div class="shape circle white"></div>
            <div class="shape disc white"></div>
            <div class="shape triangle blue"></div>
        </div>
        <div class="boom-container third"> <!-- Added .third class -->
            <div class="shape circle big white"></div>
            <div class="shape circle white"></div>
            <div class="shape triangle big red"></div> <!-- Changed color to red -->
            <div class="shape disc white"></div>
            <div class="shape triangle blue"></div>
        </div>
        
    </div>                

    <div class="overlay">
        <div class="links">
          <a href="AdminRegistration.php" class="button"><i class="fas fa-user"></i>&nbsp;&nbsp;Admin</a>
          <a href="UserRegistration.php" class="button"><i class="fas fa-user"></i>&nbsp;&nbsp;User</a>
        </div>
    </div>
</body>
</html>