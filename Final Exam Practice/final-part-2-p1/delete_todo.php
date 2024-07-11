<?php 
$dsn = "mysql:host=localhost;dbname=c3015_final";
$pdo = new PDO($dsn, 'root', 'root');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['article_id'])) {
    $deleteStatement = $pdo->prepare('DELETE FROM todos WHERE id = ?');
    $deleteStatement->execute([$_POST['article_id']]);
    header('Location: index.php');
    exit;
}