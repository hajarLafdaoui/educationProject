 <?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
  
    <style>
        div{
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
            margin-top:150px;
        }
    </style>
</head>
<body>
    <p>dd</p>

    <p>cccccccccccccccccccccccccc</p>
<?php 
   if (isset($_REQUEST['name']) && isset($_REQUEST['content'])) {
        // Get the name and content from session
        $name = $_REQUEST['name'];
        $content = $_REQUEST['content'];
        echo "$name";
        echo "$content";

   }

    // Check if form data is available in session
    // if (isset($_SESSION['name']) && isset($_SESSION['content'])) {
    //     // Get the name and content from session
    //     $name = $_SESSION['name'];
    //     $content = $_SESSION['content'];
        
    //     // Display the submitted data with edit functionality
    //     echo "<div>";
        
    //     echo "<h3>Thank you, $name, for Asking</h3>";
    //     echo "<pre> <h3>Your question:$content</h3> </pre>";

    //     echo "<form action='Edit.php' method='post'>";
    //         echo "<button type='submit'>Edit</button>";
    //     echo "</form>";

    //     echo "</div>";
   

    //     // Clear session variables
    //     unset($_SESSION['name']);
    //     unset($_SESSION['content']);
    // } else {
    //     // If the form data is not available in session, display an error message
    //     echo "<h2>Error: No form submission detected</h2>";
    // }
?>



</body>
</html> 
