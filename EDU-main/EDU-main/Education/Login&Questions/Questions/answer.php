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
  
    // Redirect back to the same page after submitting the answer
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// Fetch all questions asked by the user who is going to answer
$who_answred = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : ''; // Assuming 'user_name' is the session variable containing the user's name
$stmt = $pdo->prepare("SELECT date, name, content FROM qs WHERE name = :who_asked");
$stmt->bindParam(':who_asked', $who_answred);
$stmt->execute();
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="QuestionCss.css">
    <!-- Your HTML head content goes here -->
</head>
<body>
    <style>
        .answer{
            margin-left: 300px !important;
        }
        .question{
            margin-left: 200px;
            /* border: none; */
        }
        .bor{
            /* margin-left: 100px; */
            border: none;
        }
        .user{
            font-size:35px;
                        font-weight: bold;
                         font-weight: 600; 
    color: #3498db;

        }
        h2{
            font-size: 30px;
            text-align : center;
            margin: 40px !important;
        }
        .content{
            margin-top: 10px;
        }
        .userImg{
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }
    </style>
    <!-- Your HTML body content goes here -->

    <!-- Display all questions asked by the user -->
    <h2>Questions Asked by <span class='user'> <?php echo $who_answred; ?></span></h2>
        <?php if ($questions): ?>
        <ul>
            <?php foreach ($questions as $question): ?>
            <li class='question bor'>
                <div class='questionImg '>
                    <img src='user1.png' alt='user' class='userImg'>
                    <div class='questionContent'>
                        <span class='name'><?php echo $question['name']; ?></span>
                        <span class='date'><?php echo $question['date']; ?></span>
                        <p class='content'><?php echo $question['content']; ?></p>
                    </div>
                </div>
            </li>
                <!-- Display answers for this question -->
            <li class='answer question'>
                    <?php
                        // Fetch answers for this question
                        $stmt = $pdo->prepare("SELECT who_answred, answer FROM answ WHERE question = :question");
                        $stmt->bindParam(':question', $question['content']); // Assuming 'content' is the column in 'qs' table storing the question content
                        $stmt->execute();
                        $answers = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // Display answers
                        foreach ($answers as $answer) {  ?>
                            <div class='questionImg'>
                                <img src='user1.png' alt='user' class='userImg'>
                                <div class='questionContent'>
                                    <span class='name'><?php echo $answer['who_answred'] ; ?></span>
                                    <p class=''><?php echo  $answer['answer']; ?></p>
                                </div>
                            </div>
                       <?php } ?>
                
            </li>

            <?php endforeach; ?>
        </ul>
        <?php else: ?>
            <p>No questions found.</p>
        <?php endif; ?>

    <!-- Your HTML body content continues here -->
</body>
</html>
