<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>

<?php
$name = $_SESSION['name'];
// Check if edited content is available in the session
if (isset($_SESSION['content'])) {
    $content = $_SESSION['content'];
} else {
    // If edited content is not available, use the original content
    $content = $_SESSION['original_content'];
}
?>

<div class="container commentbox">
    <img src="user1.png" alt="user" class="userImg">  
    <div class='all '>
        
        <span class='name'><?=$name?></span>
        <p class='' ><?=$content?></p>

        <div class='forms '>
            <form action='3-Edit.php' method='post' > 
                <input type='hidden' name='content' value='<?=$content?>'>
                <button class='Edit' type='submit'>Edit</button>
            </form>

            <form action='5-Del.php' method='post'>
                <input type='hidden' name='name' value='<?=$name?>'>
                <input type='hidden' name='content' value='<?=$content?>'>
                <button class='Edit' type='submit'>Delete</button>
            </form>

            
            
<!--           
            <form action='http://localhost/Education/Login&Questions/Questions/allQuestions.php' method='post'>
                <button class='Delete' type='submit'>See questions</button>
            </form>  -->
            <form action='http://localhost/Education/Html/index.php' method='post'>
                <button class='Delete' type='submit'>Home</button>
            </form> 
        </div>

    </div>
</div>



</body>
</html>