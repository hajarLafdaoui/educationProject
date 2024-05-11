<?php 
session_start();
@include '0-config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $who_asked = $_POST['who_asked'];
    $question = $_POST['question'];
    $who_answred = $_POST['namee'];
    $answer = $_POST['contentt'];

    $stmt = $pdo->prepare("INSERT INTO answ (who_asked, question, who_answred, answer) VALUES (:who_asked, :question, :who_answred, :answer)");
    $stmt->bindParam(':who_asked', $who_asked);
    $stmt->bindParam(':question', $question);
    $stmt->bindParam(':who_answred', $who_answred);
    $stmt->bindParam(':answer', $answer);
    $stmt->execute();
 
header("Location: ".$_SERVER['PHP_SELF']);
exit();
}
// Fetch all questions asked by the user who is going to answer
$who_answred = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : ''; // Assuming 'user_name' is the session variable containing the user's name
$stmt = $pdo->prepare("SELECT COUNT(*) AS num_questions FROM qs WHERE name = :who_asked");
$stmt->bindParam(':who_asked', $who_answred);
$stmt->execute();
$questions_count = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch maximum number of answers for the questions asked by the user
$stmt = $pdo->prepare("SELECT MAX(answers_count) AS max_answers FROM (SELECT COUNT(*) AS answers_count FROM answ WHERE who_asked = :who_asked GROUP BY question) AS counts");
$stmt->bindParam(':who_asked', $who_answred);
$stmt->execute();
$max_answers = $stmt->fetch(PDO::FETCH_ASSOC)['max_answers'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="all.css"> -->
    <link rel="stylesheet" href="QuestionCss.css">
    
</head>
<body>
   
    <div class='body'>
        
        <div class="side">
            <ul class='firstList'> 
                <li>
                    <img class='marginRight' src="http://localhost/EDU-main/EDU-main/Education/Login&Questions/Icons/home.png" alt="" width='15px'>
                    <a href='http://localhost/EDU-main/EDU-main/Education/Html/index.php'>Home</a>
                </li>
                <li class='dropIcon'>
                    <img src="http://localhost/EDU-main/EDU-main/Education/Login&Questions/Icons/questions.png" alt="" width='18px' height='20px'>
                    <div class="dropdown">       
                        <button class="btn d-inline  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            questions
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Recent questions</a></li>
                            <li><a class="dropdown-item" href="#">Trending questions</a></li>
                            <li><a class="dropdown-item" href="#">Most read</a></li>
                            <li><a class="dropdown-item" href="#">Most answered</a></li>
                        </ul>
                    </div>
                </li>
            </ul> 
        </div>
   
        <div class='center'>
        
            <form action="" class='search-form'>
                <input class="SearchInput" type="search" name='content' placeholder="Search for a question" aria-label="Search">
                <button class='Search' type="submit">Search</button>
            </form>
   
            <?php
            $res = $pdo->prepare("SELECT date, name, content FROM qs");
            $res->execute();
            $count = 0;
            while($row = $res->fetch(PDO::FETCH_ASSOC)){
                $date = $row["date"];
                $who_asked = $row["name"];
                $question = $row["content"];
            ?>

            <div class='question'>
                <div class='questionImg'>
                    <img src='user1.png' alt='user' class='userImg'>
                    <div class='questionContent'>
                        <span class='name'><?php echo $who_asked; ?></span>
                        <span class='date'>Asked in: <?php echo $date; ?></span>
                        <p class=''><?php echo $question; ?></p>
                        <?php
                        echo "<button onclick=\"visibility('form$count', '$who_asked', '$question')\" id='Answer$count' class='Answer'  style='display: block;'>Answer</button>";
                        echo "<button onclick='visibility(\"form$count\")' id='Close$count' class='Close' style='display: none;'>Close</button>";
                        ?>
                    </div>
                </div>
                

                <div id="form<?php echo $count; ?>" class="commentbox" style="display: none;">
                    <img src="user1.png" alt="user" class="userImg">
                    <div class="content">
                        <form action="" method="post" id="question-form">

                            <input type="hidden" name="who_asked" value="<?php echo htmlspecialchars($who_asked); ?>">
                            <input type="hidden" name="question" value="<?php echo htmlspecialchars($question); ?>">
                            <input class="nameContent name" type="text" name="namee" placeholder="" value='<?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : ''; ?>' readonly>
                            <div class="form-group">
                                <textarea id="content<?php echo $count; ?>" name="contentt" class="form-control nameContent"></textarea>
                            </div>
                            <div class="buttons form-group">
                                <button class="send" type="submit" id="save<?php echo $count; ?>">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                

                <script>
                ClassicEditor.create(document.querySelector('#content<?php echo $count; ?>')).then(editor => {
                    editor.model.document.on('change:data', () => {
                        const data = editor.getData();
                        const saveBtn = document.querySelector('#save<?php echo $count; ?>');
                        if (data.trim().length > 0) {
                            saveBtn.removeAttribute('disabled');
                        } else {
                            saveBtn.setAttribute('disabled', 'disabled');
                        }
                    });
                }).catch(error => {
                    console.error(error);
                });
                </script>

            </div>

            <?php
            $count++; 
            }
            ?>
        </div>



        <div class='otherSide'>
            <a href='http://localhost/Education/Login&Questions/Questions/1-index.php' class='OtherSideButton'>Ask a question</aR5>
            <ul class='otherSideList'>
                <!-- <li class='Status'>Stats</li> -->
                <li><a href="http://localhost/EDU-main/EDU-main/Education/Login&Questions/Questions/answer.php">Stats </a></li>
                <hr>
                <li> Questions:(<?php echo $questions_count['num_questions']; ?>)</li>
                <li>Answers:(<?php echo $max_answers; ?>)</li>
            </ul>
        </div>

    </div>

<script>
    function visibility(formId, who_asked, question) {
        const form = document.getElementById(formId);
        const buttonAnswer = document.getElementById('Answer' + formId.slice(4)); 
        const buttonClose = document.getElementById('Close' + formId.slice(4)); 

        if (form.style.display === 'block') {
            form.style.display = 'none';
            buttonAnswer.style.display = 'block'; 
            buttonClose.style.display = 'none'; 
        } else {
            form.style.display = 'block';
            buttonAnswer.style.display = 'none'; 
            buttonClose.style.display = 'block'; 
        }  
        sessionStorage.setItem('who_asked', who_asked);
        sessionStorage.setItem('question', question);
    }
    
</script>
<script>
    function viewAnswers() {
        document.getElementById('viewAnswersForm').submit();
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>
</html>
