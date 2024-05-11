<?php

@include '1-config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   // header('location:3-login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>
 
   <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

* {
   font-family: 'Poppins', sans-serif;
   margin: 0;
   padding: 0;
   box-sizing: border-box;
   outline: none;
   border: none;
   text-decoration: none;
}

/* admin_page.php, user_page.php */
.container {
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding: 20px;
   padding-bottom: 60px;
}

.container .content {
   text-align: center;
}

.container .content h3 {
   font-size: 30px;
   color: #25aae1  !important;
}

.container .content h3 span {
   background: #25aae1 !important;
   color: #fff;
   border-radius: 5px;
   padding: 0 15px;
}

.container .content h1 {
   font-size: 50px;
   color: #333;
}

.container .content h1 span {
   color: #25aae1 !important;
}

.container .content p {
   font-size: 25px;
   margin-bottom: 20px;
}

.container .content .btn {
   display: inline-block;
   padding: 10px 30px;
   font-size: 20px;
   background: #333;
   color: #fff;
   margin: 0 5px;
   text-transform: capitalize;
}

.container .content .btn:hover {
   background:  !important;
}
</style>

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>user</span></h3>
      <h1>welcome <span><?php echo htmlspecialchars($_SESSION['user_name']) ?></span></h1>
      <p>this is an user page</p>
      <a href="3-login_form.php" class="btn">login</a>
      <a href="6-logout.php" class="btn">logout</a>
      <a href="http://localhost/EDU-main/EDU-main/Education/Html/index.php" class="btn">Home</a>
   </div>

</div>

</body>
</html>
