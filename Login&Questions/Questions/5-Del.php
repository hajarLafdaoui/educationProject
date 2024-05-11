<?php
@include  "0-config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = $_POST['content'] ?? '';
    $name = $_POST['name'] ?? '';

    $stmt = $pdo->prepare("DELETE FROM qs WHERE content = :content AND name = :name");
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':name', $name);
    $stmt->execute();
    
    header("Location:http://localhost/Education/Html/index.php"); 
    exit();
} else {
    echo "Error: No form submission detected";
}
?>
