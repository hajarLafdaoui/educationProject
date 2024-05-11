<?php session_start(); 
@include '0-config.php';  

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $original_content = $_POST['original_content'];
    $edited_content = $_POST['edited_content'];

    $stmt = $pdo->prepare("UPDATE qs SET content = :edited_content WHERE content = :original_content");
    $stmt->bindParam(':edited_content', $edited_content);
    $stmt->bindParam(':original_content', $original_content);
    $stmt->execute();

    $_SESSION['content'] = $edited_content;
 
    header("Location: 2-changes.php");
    exit(); 
} else {
    echo "Error: No form submission detected";
}
?>


