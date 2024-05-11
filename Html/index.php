<?php  
session_start();  
@include '1-config.php';  // Include configuration for the second database  to get the username
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="main_style.css">
    <!-- bootstrap css -->
    <!-- <link rel="stylesheet" href="Files\CSS\bootstrap.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- gsap -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js" integrity="sha512-DkPsH9LzNzZaZjCszwKrooKwgjArJDiEjA5tTgr3YX4E6TYv93ICS8T41yFHJnnSmGpnf0Mvb5NhScYbwvhn2w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');

* {
    box-sizing: border-box;
    padding: 0;
    margin: 0;
    font-family: "Roboto", sans-serif !important;
}
:root {
    --white: #fff;
    --black: #000;
    --gray: #666;
    --offgray: #666;
}
body {
    background-color: var(--white) !important;
    height: 100vh !important;
}
#iconmoon {
    width: 24px;
    cursor: pointer !important;
    margin-right: 10px;
    margin-top: 32px !important;
}
.dark-theme {
    --white: #000;
    --black: #fff;
    --gray: #fff;
    --offgray: #000000;
}
::marker {
    color: var(--white) !important;
}
.navbar {
    height: 80px;
    margin: 0px;
    border-radius: 30px !important;
    padding: 0.5rem;
    margin-top: 10px;
    /* background-color: #04befe; */
}
/* NAVBAR BRAND */
.navbar-brand {
    font-weight: 500 !important;
    color: #25aae1 !important;
    font-size: 24px !important;
    transition: 0.2s color !important;
}
.navbar-brand:hover {
    color: var(--black) !important;
}
/* BUTTONS */
.Sign-up,
.log-in {
    padding: 12px 30px !important;
    font-size: 16px !important;
    font-weight: 600 !important;
    cursor: pointer !important;
    text-align: center !important;
    border: none !important;
}
.log-in {
    color: var(--gray) !important;
}
.Sign-up {
    color: var(--white) !important;
    background-size: 300% 100%;
    border-radius: 50px !important;
    transition: all .4s ease-in-out;
    background-image: linear-gradient(to right, #25aae1, #4481eb, #04befe, #3f86ed);
    box-shadow: 0 4px 15px 0 rgba(65, 132, 234, 0.75);
}
.Sign-up:hover {
    background-position: 100% 0;
    transition: all .4s ease-in-out;
}
.log-in:hover {
    color: #25aae1 !important;
}
/* NAVBAR TOGGLER */
.navbar-toggler {
    border: none !important;
    font-size: 1.25rem !important;
    color: var(--black) !important;
    margin-top: 4px;
}
.navbar-toggler:focus,
.btn-close:focus {
    box-shadow: none !important;
    outline: none !important;
}
.dark-theme .navbar-toggler-icon {
    filter: invert(1) !important;
}
/* NAV LINKS */
.nav-link {
    color: var(--gray) !important;
    font-weight: 500 !important;
    font-size: large !important;
    position: relative !important;
}
.nav-link:hover,
.nav-link:active {
    color: var(--black) !important;
}
/* DARK MODE */
.dark-theme .offcanvas {
    background-color: var(--white) !important;
}
.dark-theme .offcanvas-body .nav-link {
    color: var(--gray) !important;
}
.dark-theme .btn-close {
    filter: invert(1) !important;
}
.dark-theme .dropdown-item:hover {
    background-color: #939090;
}
/* DROPDOWN MENU */
.dropdown-menu {
    background-color: transparent !important;
    border: transparent !important;
}
.dropdown-menu .dropdown-item {
    color: var(--black) !important;
}
.dropdown-menu {
    margin-top: 0 !important;
    padding: 0 !important;
    text-align: center;
    width: auto !important;
}
/* MEDIA */
@media (min-width:991px) {
    .nav-link::before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 2px;
        background-color: #9bddff;
        visibility: hidden;
        transition: 0.3s ease-in-out;
    }
    .nav-link:hover::before,
    .nav-link:active::before {
        width: 100%;
        visibility: visible;
    }
}
@media screen and (max-width:500px) {
    .nav-link::before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 2px;
        background-color: #9bddff;
        visibility: hidden;
        transition: width 0.3s ease-in-out;
    }
    .nav-link:hover::before,
    .nav-link:active::before {
        width: calc(100% - 250px);
        visibility: visible;
    }
    .dropdown-menu {
        position: static !important;
        width: max-content !important;
        margin-top: 0 !important;
        box-shadow: none !important;
        background-color: transparent !important;
        text-align: center !important;
        padding: 0 !important;
        width: fit-content !important;
    }
    .dropdown-menu li a {
        padding: 5px 0 !important;
        margin: 0 !important;
    }
    h1 {
        font-size: 5px !important;
        font-weight: 100 !important;
        margin-top: 0 !important;
        padding-top: 0 !important;
    }
    .p-1 {
        padding: 0 !important;
        margin: 0 !important;
        text-align: start !important;
        font-size: 10px !important;
        line-height: 1 !important;
    }
    .hero-section {
        margin-top: 1px;
        padding: 1px;
    }
    .third {
        border-radius: 20px !important;
        font-size: 1rem !important;
        font-weight: 300 !important;
        margin: 8px;
        padding: 8px 4px !important;
        text-decoration: none;
        border-color: #3498db;
        color: var(--black) !important;
        box-shadow: 0 0 40px 40px#3498db inset, 0 0 0 0#3498db;
        transition: all 150ms ease-in-out;
    }
    span{
        font-size: smaller;
        font-weight: 100;
    }
}
.hero-section {
    margin-top: 100px;
    padding: 130px;
}
/* CONTACT  */
body .media ul {
    list-style: none;
    position: fixed;
    right: 20px;
    top: 63%;
    padding: 10px 10px;
}
.media ul li,
.drop-1,
.drop-2,
.nav-link {
    font-size: 18px !important;
    margin: 24px 0 !important;
    transition: .3s !important;
}
.media ul li:hover {
    transform: scale(1.5);
}
h1 {
    color: var(--black) !important;
    font-size: 48px !important;
    font-weight: bold !important;
    color: var(--black);
    line-height: 1.2 !important;
    text-align: center !important;
    margin-bottom: 15px !important;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2) !important;
}
.p-1 {
    font-size: 16px !important;
    line-height: 1.5 !important;
    margin-bottom: 20px !important;
    color: var(--gray) !important;
}
.third {
    border-radius: 20px !important;
    font-size: 1.3rem !important;
    font-weight: 500 !important;
    margin: 10px;
    padding: 10px 30px !important;
    text-decoration: none;
    border-color: #3498db;
    color: var(--black) !important;
    box-shadow: 0 0 40px 40px #3498db inset, 0 0 0 0#3498db;
    transition: all 150ms ease-in-out;
}
.third:hover {
    box-shadow: 0 0 10px 0#3498db inset, 0 0 10px 4px#3498db;
}
.username-flex{
    display: flex;
    justify-content: center;
    align-items: center;
}
.username,.icon-user{
    font-size: 1.3rem !important;
    margin-top: 16px ;
    font-weight: bold ;
    color: var(--black) ;
}
.username{
    margin-top: 31px;
}
.icon-user{
    margin-right: 10px ;
    background-color:#25aae1 ;
    border-radius: 10% ;
    width: 35px ;
    text-align: center ;
    background: #3498db ;
    margin-top: 35px;
}
.bn26{
    margin-top: 20px;
}
</style>
</head>
<body>
    <!-- navbar -->
    <nav class="container-fluid navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand me-auto" href="#"><i> ELLIB</i></a>
    
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <!-- menu items -->
                        <li class="nav-item">
                        <a class="nav-link mx-lg-2 active home-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link mx-lg-2 " href="http://localhost/Education/Login&Questions/Questions/allQuestions.php">Questions</a>
                        </li>   
                        <!-- dropdown -->
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            EducHub
                        </a>
                        <ul class="dropdown-menu ">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                        </li>
                        <!-- end of dropdown -->

                        <li class="nav-item">
                        <a class="nav-link mx-lg-2 " href="#">Services</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link mx-lg-2 " href="#">Contact</a>
                        </li>
            
                        <li class="nav-item">
                            <?php
                            if (isset($_SESSION['user_name'])) :
                                $userName = htmlspecialchars($_SESSION['user_name']);
                                $formattedUserName = strtoupper(substr($userName, 0, 1)) . substr($userName, 1);
                            ?>  
                                <a class="nav-link mx-lg-2 " href="http://localhost/Education/Login&Questions/Login_system/6-logout.php">logout</a>
                            <?php endif; ?>
                        </li>

                        <li>
                            <ul>
                                <li class="nav-item"><img src="http://localhost/Education/Dark_theme_icon/moon.png" id="iconmoon" alt=""></li>
                            </ul>
                            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </li>
                    </ul>
                <!-- end of menu items -->
                </div>
            </div>
         
            <ul class='username-flex'>
                <li>
                    <?php  
                        if (isset($_SESSION['user_name'])) {
                            $userName = $_SESSION['user_name'];
                            $firstLetter = strtoupper(substr($userName, 0, 1));
                            ?>
                            <p  class='icon-user'> <?php  echo $firstLetter ; ?> </p>
                        <?php } ?>
                    
                </li>
                <li>
                    <?php
                        if (isset($_SESSION['user_name'])) {
                            $userName = htmlspecialchars($_SESSION['user_name']);
                            $formattedUserName = strtoupper(substr($userName, 0, 1)) . substr($userName, 1);
                    ?>  
                            <p class='username'><?php echo $formattedUserName;?></p> 
                    <?php  
                        }else{
                    ?>
                        <a href="http://localhost/Education/Login&Questions/Login_system/3-login_form.php">
                            <button class="bn632-hover bn26 Sign-up">Log in</button>
                        </a>
                    <?php } ?>
                </li>
            </ul>
    </nav>

    <!-- hero-section -->
    <main class="container">
      <section class="hero-section">

        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
              <!-- content -->
                <div class="col-md-12">
                    <h1>Teacher Training Corner</h1>
                    <p class="p-1">Ask anything, share knowledge! Whether you're a future teacher or seasoned educator,
    this is your space to seek advice and share insights. Join our community and let's learn together!</p>
                    <a href="http://localhost/Education/Login&Questions/Questions/1-index.php" class="btn third" ><span> Questions welcome! </span></a>
                </div>
                <!-- media -->
                <div class=" media">
                  <ul>
                      <li> <a href="#"><img src="http://localhost/Education/Media_icons/facebook.png" alt="facebook" width="20px"></a></li>
                      <li> <a href="#"><img src="http://localhost/Education/Media_icons/instagram.png" alt="instagram" width="20px"></a></li>
                      <!-- <li> <a href="#"><img src="Media_icons/twitter.png" alt="twitter" width="20px"></a></li> -->
                  </ul>
                </div>
            </div>
        </div>
    </section>
     
    <!-- btootstrap js -->
    <!--document.body.classList.toggle("dark-theme");  toggles the presence of the class "dark-theme" on the <body> element of the HTML document. If the class is not present, it adds it; if it's already present, it removes it. -->
    <!-- <script src="Files\JS\bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
    <script>
      var icon = document.getElementById("iconmoon");
      icon.onclick = function(){
        document.body.classList.toggle("dark-theme");
        if (document.body.classList.contains("dark-theme")){
          iconmoon.src = "http://localhost/Education/Dark_theme_icon/sun.png"

        }else{
          iconmoon.src = "http://localhost/Education/Dark_theme_icon/moon.png"
        }
      }
    </script>
    
</body>
</html>