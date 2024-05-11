<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script> 
</head>
<body>

<?php
$name = $_SESSION['name'];
$content = $_SESSION['content'];
$stripped_content = strip_tags($content);
?>


<div class='container'>
    <form class='commentbox' action='4-processEdite.php' method='post'>

        <img src="user1.png" alt="user" class='userImg'  >
        <div class='content'>
            <input type="text" name="name" placeholder=""   value="<?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : ''; ?>" readonly class='nameContent name'>

            <input type='hidden' name='original_content' value='<?php echo htmlspecialchars($content); ?>'>
            <div class="form-group">
                <textarea id="content" name="edited_content" class="form-control nameContent"><?php echo htmlspecialchars($stripped_content); ?></textarea>
            </div>
            <button id="save" type='submit'>Save Changes</button>
        </div>


</form>
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
