<?php  
session_start();  
@include '1-config.php';  //To get the name of the user
@include '0-config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $stmt = $pdo->prepare("INSERT INTO qs (name, content) VALUES (:name, :content)");

    // Set parameters
    $name = $_POST['name'];
    $content = $_POST['content'];

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':content', $content);
    $stmt->execute();
 
    // store data in session variables
    $_SESSION['name'] = $name;
    $_SESSION['content'] = $content;

    header("Location: 2-changes.php");
    exit();
} else {
    // echo "Error: No form submission detected";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script> <!-- CKEditor script -->

</head>
<body>
<div class="container">

    <div class="titles">
        <h1>Ask a question <br>
            <span>We are happy to hear from you</span>
        </h1>
    </div>

    <div class="commentbox">
        <img src="user1.png" alt="user">

        <div class="content">
            <form action="" method="post" id="question-form">

                <input class="nameContent name" type="text" name="name" placeholder=""   value="<?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : ''; ?>" readonly>
                <div class="form-group">
                    <textarea id="content" name="content" class="form-control nameContent"></textarea>
                </div>
                <div class="buttons form-group">
                    <button type="submit" id="save">Save</button>
                </div>
                
            </form>
        </div>
        
    </div>
    
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                const data = editor.getData();
                const saveBtn = document.querySelector("#save");
                if (data.trim().length > 0) {
                    saveBtn.removeAttribute("disabled");
                } else {
                    saveBtn.setAttribute("disabled", "disabled");
                }
            });
        })
        .catch(error => {
            console.error(error);
        });

</script>
</body>
</html>
