<?php
// view_answers.php

// Include your database configuration file
@include '0-config.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values of who_asked and question from the form
    $who_asked = $_POST['who_asked'];
    $question = $_POST['question'];

    // Fetch all answers for the given question
    $stmt = $pdo->prepare("SELECT * FROM answ WHERE who_asked = :who_asked AND question = :question");
    $stmt->bindParam(':who_asked', $who_asked);
    $stmt->bindParam(':question', $question);
    $stmt->execute();
    $answers = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Answers</title>
    <!-- Add any CSS styling if needed -->
</head>
<body> 
    
    <h1>Answers for the Question: <?php echo $question; ?></h1>
    <?php if (isset($answers) && !empty($answers)) : ?>
        <ul>
            <?php foreach ($answers as $answer) : ?>
                <li>
                    <strong>Answered by:</strong> <?php echo $answer['who_answred']; ?><br>
                    <strong>Answer:</strong> <?php echo $answer['answer']; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No answers found for this question.</p>
    <?php endif; ?>
</body>
</html>
