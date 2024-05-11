<?php

// Establish database connection
$host = 'localhost';
$dbname = 'qss';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Execute a query to select all questions along with their names
$stmt = $pdo->query("SELECT name, content FROM qs");

// Fetch all results as an associative array
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Open or create a file to store the questions


// Write each question to the file
// foreach ($questions as $question) {
//    echo "Name: " . $question['name'] ;
//    echo "Question: " . $question['content'] ;
// }

// Close the file
 
// Display the questions on the web page
echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Questions</title>";
echo "</head>";
echo "<body>";

echo "<h1>Questions</h1>";
echo "<ul>";
foreach ($questions as $question) {
    echo "<li>";
    echo "<strong>Name:</strong> " . htmlspecialchars($question['name']) . "<br>";
    echo "<strong>Question:</strong> " . htmlspecialchars($question['content']);
    echo "</li>";
}
echo "</ul>";

echo "</body>";
echo "</html>";

// Get the output buffer contents and write them to the file
// $output = ob_get_clean();
// file_put_contents("questions.txt", $output, FILE_APPEND);

// echo "Questions have been written to questions.txt";
?>
