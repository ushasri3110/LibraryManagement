<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amrita Library</title>
    <link rel="icon" href="static/images/book.png" type="image/x-icon">
    <!-- for facebook etc icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="static/css/Home.css">
    <style>
         body, html {
      margin: 0;
      padding: 0;
    }

    .background-container {
      position: relative;
      width: 100vw;
      height: 100vh;
      background-image: url('static/images/Amma\'s_image_homepage.jpg'); /* Replace 'your-background-image.jpg' with the path to your background image */
      background-size: cover;
    }

    .circle1 {
  position: absolute;
  width: 80px; /* Adjust as needed */
  height: 40px; /* Adjust as needed */
  background-color: rgba(255, 255, 255); /* Adjust color and opacity as needed */
  border-radius: 50%;
  border: 2px solid orange; /* Border color and width */
}

.circle2 {
  position: absolute;
  width: 60px; /* Adjust as needed */
  height: 30px; /* Adjust as needed */
  background-color: rgba(255, 255, 255); /* Adjust color and opacity as needed */
  border-radius: 50%;
  border: 2px solid orange; /* Border color and width */
}


    .circle1 {
      top: 115px; /* Adjust top position as needed */
      left: 750px; /* Adjust left position as needed */
    }

    .circle2 {
      top: 165px; /* Adjust top position as needed */
      left: 670px; /* Adjust left position as needed */
    }

    .neon-text {
    font-size: 24px; /* Adjust font size as needed */
    color: #2600ff; /* Deep orange color */
    text-shadow: 0 0 5px #FFA500, 0 0 10px #FFA500, 0 0 15px #FFA500, 0 0 20px #FFA500, 0 0 35px #FFA500, 0 0 40px #FFA500, 0 0 50px #FFA500, 0 0 75px #FFA500;
}



    .text-scroller {
      position: absolute;
      top: 35px; /* Adjust to move the text scroller higher */
      right: 150px;
      width: 500px; /* Adjust as needed */
      height: 80px; /* Adjust as needed */
      background-color: rgba(255, 255, 255, 0.8); /* Background color for the text scroller */
      padding: 5px;
      border-radius: 50%; /* Circular border */
      overflow: hidden;
      border: 3px solid #FFA500; /* Border color - Adjust as needed */
    }

    .text-scroller marquee {
      width: 100%;
      height: 100%;
      overflow: hidden;
      white-space: nowrap;
    }

    /* Additional styles to center the text horizontally and vertically */
    .text-scroller marquee p {
      display: inline-block;
      vertical-align: middle;
      line-height: 50px; /* Adjusted to match the height of .text-scroller */
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

    <!-- navbar -->
    <div class="navbar">
        <!-- for opening navbar's login, about etc -->
        <input type="checkbox" class="checkbox" id="click" hidden>
        <!-- sidebar -->
        <div class="sidebar">
            <label for="click">
                    <!-- for 3 line navbar dashboard -->
                <div class="menu-icon">
                    <div class="line line-1"></div>
                    <div class="line line-2"></div>
                    <div class="line line-3"></div>
                </div>

            </label>

            <ul class="social-icons-list">
                <li><a href="https://www.facebook.com/AmritaUniversity" class="social-link" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
                <li><a href="https://www.instagram.com/amritaamaravati/" class="social-link" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="https://twitter.com/AmritaUniversty" class="social-link" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                <li><a href="#" class="social-link"><i class="fa-brands fa-google-plus-g"></i></a></li>
            </ul>
            <div class="year">
                <p>2024</p>
            </div>
        </div>
        <!-- end of sidebar -->
        <!-- navigation  -->
        <nav class="navigation">
            <div class="navigation-header">
                <h1 class="navigation-heading">Amrita Library</h1>
                <form class="navigation-search">
                    <input type="text" class="navigation-search-input" placeholder="Search...">
                    <button class="navigation-search-btn"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <ul class="navigation-list">
                <li class="navigation-item"><a href="login.php" class="navigation-link">Login</a></li>
                <li class="navigation-item"><a href="#about-section" class="navigation-link">About</a></li>
                <li class="navigation-item"><a href="#location-section" class="navigation-link">Location</a></li>
                <li class="navigation-item"><a href="#resource-section" class="navigation-link">Resources</a></li>
                <li class="navigation-item"><a href="#contact-section" class="navigation-link">Contact</a></li>
            </ul>
            <div class="copyright">&copy; 2024. All rights reserved.</div
        </nav>
        <!-- end of navigation -->
    </div>
    <!-- end of navbar -->

    <!-- header -->
    <header>
    <div class="banner">
        <h1 class="banner-heading">Welcome To Amrita Library</h1>
        <p class="banner-paragraph">Infinite wisdom, one shelf at a time</p>
        <a href="login.php"><button class="banner-button">Login</button></a>
    </div>
</header>
    <!-- end of header -->

   <!-- About us start -->
   <section class="about-us">
   <div id="about-section">
    <hr>
    <h1 align="center">ABOUT US</h1>
   </div>
    
    <div class="row">
        <div  class="column">
            <h2 align="center"> About University</h2>
            <p>
                Amrita Vishwa Vidyapeetham is a multi-disciplinary, research-intensive, private university, educating a vibrant student 
                population of over 24,000 by 1700+ strong faculty. Accredited with the highest possible ‘A++’ grade by NAAC, Amrita offers 
                more than 250 UG, PG, and Ph.D. programs in Engineering, Management, and Medical Sciences including Ayurveda, Life Sciences, Physical Sciences, Agriculture Sciences, Arts & Humanities, and Social & Behavioral Sciences.
            </p>
        
            <p>
                With its extensive network of eight campuses spread across Amaravati, Amritapuri, Bengaluru, Chennai, Coimbatore, Kochi, Mysuru,
                 and NCR Delhi (Faridabad), Amrita University stands as one of India’s preeminent private educational institutions. Encompassing 
                 an expansive area of over 1200 acres, these campuses offer an impressive built-up space of more than 100 lakh square feet. Renowned 
                 for its commitment to academic excellence, Amrita University consistently ranks among the top-tier private universities in the nation, 
                 solidifying its reputation as a beacon of quality education.
            </p>
        </div>
    
        <div class="column">
            <!-- <h2 align="center">Scroll Bar</h2> -->
            <!-- Scroll bar start -->
            <div class="slideshow-container">

                <div class="mySlides fade">
                  <img src="static/images/sliderImage1.jpg" style="width:100%;height:auto;">
                </div>
                
                <div class="mySlides fade">   
                  <img src="static/images/sliderImage2.jpg" style="width:100%;height:auto;">
                </div>
                
                <div class="mySlides fade">             
                  <img src="static/images/sliderImage3.jpg" style="width:100%;height:auto;">
                </div>

                <div class="mySlides fade">             
                    <img src="static/images/sliderImage4.jpg" style="width:100%;height:auto;">
                </div>

                <div class="mySlides fade">             
                    <img src="static/images/sliderImage5.jpg" style="width:100%;height:auto;">
                </div>

                
                </div>
                <br>
                
                <div style="text-align:center">
                  <span class="dot"></span> 
                  <span class="dot"></span> 
                  <span class="dot"></span>
                  <span class="dot"></span> 
                  <span class="dot"></span>  
                </div>
            <!-- Scroll bar end -->
        </div>
      </div>
    </section>
<!-- About us end -->

    <!-- Location start -->
    <section class="location">
    <div style="font-size: 1.6rem;" id="location-section">
        <hr>
        <h1 align="center">LOCATION</h1>
    </div>
   
    <center>
        <div>
            <!-- Google Map Code -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3826.3687253118674!2d80.5348226746077!3d16.456856828945327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a35f3b8d11685ad%3A0xae0ba33082b34cf6!2sAmrita%20Vishwa%20Vidyapeetham%20Amaravati!5e0!3m2!1sen!2sin!4v1708802522356!5m2!1sen!2sin"
                    width="95%"
                    height="400"
                    frameborder="0"
                    style="border:0;"
                    allowfullscreen=""
                    aria-hidden="false"
                    tabindex="0">
            </iframe>
        </div>
    </center>
    </section>
    <!-- Location end -->

    <!-- Trending News start -->
    <div style="font-size: 1.6rem;" id="resource-section">
        <hr>
        <h1  align="center">RESOURCES</h1>
        <center><h3>Amrita Library is a valuable partner in user’s pursuit towards excellence in 
            learning and research.</h3></center><br>
        <div class="resource-div">
                <div>
                <img src="static/images/resourceImage1.jpg">
                <h2>Collections</h2>
                Amrita Vishwa Vidyapeetham's Library Collections encompass rich and varied domains of printed volumes...
                </div>
                <div>
                <img src="static/images/resourceImage2.jpg">
                <h2>Services</h2>
                Various services offered by Amrita Vishwa Vidyapeetham's library are committed to meet the needs of the students...
                </div>
                <div>
                <img src="static/images/resourceImage3.jpg">
                <h2>People</h2>
                People at Amrita Library support access to key databases, effectively use the library's vast information resources...
                </div>
        </div>
    </div>
    <!-- Trending News end -->
    <!-- library contact start -->
    <div class='content'>
        <div style="font-size: 1.6rem;" class="contact-block" id="contact-section">
            <hr>
            <h1  align="center">CONTACT US</h1>
            <div class="contact">
                <div>
                    <h3><u>Amaravati</u></h3>
                    <p>amrita.library@av.amrita.edu</p>
                    <p>+91 (476) 2806504</p>
                </div>
                <div>
                <h3><u>Amritapuri</u></h3>
                    <p>central.library@am.amrita.edu</p>
                    <p>+91 (476) 2806402</p>
                </div>
            </div>
            <div class="contact">
                <div>
                    <h3><u>Kochi</u></h3>
                    <p>librarian@aims.amrita.edu</p>
                    <p>+91 (484) 2801234</p>
                </div>
                <div>
                <h3><u>Bengaluru</u></h3>
                    <p>bm_prasanna@blr.amrita.edu</p>
                    <p>+91 (80) 25183700</p>
                </div>
            </div>
            <div class="contact">
                <div>
                    <h3><u>Mysuru</u></h3>
                    <p>asasmysore@gmail.com</p>
                    <p>+91 (821) 2340911</p>
                </div>
                <div>
                <h3><u>Coimbatore</u></h3>
                    <p>univhq@amrita.edu</p>
                    <p>+91 (422) 2685000</p>
                </div>
            </div>
            <div class="contact-map">
                <img src="static/images/map.png">
            </div>
        </div>

    </div>

    <!-- library contact end -->

    <script>
                     function highlightNavigationItems(searchInput) {
            const navigationItems = document.querySelectorAll('.navigation-item');
            const searchTerm = searchInput.value.toLowerCase();

            navigationItems.forEach(item => {
                const itemText = item.textContent.toLowerCase();
                if (itemText.includes(searchTerm)) {
                    item.classList.add('highlighted');
                } else {
                    item.classList.remove('highlighted');
                }
            });
        }

        // Event listener for search input changes
        const searchInput = document.querySelector('.navigation-search-input');
        searchInput.addEventListener('input', () => {
            highlightNavigationItems(searchInput);
        });
                let slideIndex = 0;
                showSlides();
                
                function showSlides() {
                  let i;
                  let slides = document.getElementsByClassName("mySlides");
                  let dots = document.getElementsByClassName("dot");
                  for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                  }
                  slideIndex++;
                  if (slideIndex > slides.length) {slideIndex = 1}    
                  for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                  }
                  slides[slideIndex-1].style.display = "block";  
                  dots[slideIndex-1].className += " active";
                  setTimeout(showSlides, 2000); // Change image every 2 seconds
                }
                
                </script>

    <div>

    </div> 
    
    <div class="background-container">
        <div class="circle1 circle1"></div>
        <div class="circle2 circle2"></div>
        <div class="text-scroller neon-text">
        <marquee behavior="scroll" direction="left"><p>There are two kinds of education: education for living and education for life. While education for a living is essential for success in the academic and material sense, education for life equips young people with the knowledge, skills, and values needed to lead an ethical and beneficial existence</p></marquee>
        </div>
    </div>

    <footer class="site-footer">
        <div class="container">
            <div class="left-content">
                <p>@ ICTS, Amrita Vishwa Vidyapeetham, Amaravati.</p> 
                <p>All rights Reserved.</p>
            </div>
            <div class="right-content">
            
                <span>E-NOTICE BOARD |</span>
                <span>PTP-PUBLICATION TRACKING PORTAL |</span>
                <span>AMRITA INTERCOM</span>
            </div>
        </div>
    </footer>
            
</body>
</html>
