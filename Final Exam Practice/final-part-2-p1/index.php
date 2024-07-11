<?php

$dsn = "mysql:host=localhost;dbname=c3015_final";
$pdo = new PDO($dsn, 'root', 'root');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $statement = $pdo->prepare('INSERT INTO todos (title) VALUES (?)');
    $statement->execute([$title]);
    header('Location: index.php');
    exit;
}

$selectTodosStatement = $pdo->prepare('SELECT * FROM todos');
$selectTodosStatement->execute(); // will return if it exeuted properly

$todos = $selectTodosStatement->fetchAll();

// var_dump($todos);
// exit;
?>

<!DOCTYPE html>
<html>
    <header>

    </header>
    <body>
        <form action="index.php" method="post">
            <label>
                Todo: <input type="text" name="title" placeholder="your todo">
            </label>
            <input type="submit"  value="Add">
        </form>
        <?php foreach($todos as $todo): ?>
            <div>
                <?= $todo['title'] ?>
                <form action="delete_todo.php" method="post">
                    <input type="hidden" value="<?= $todo['id'] ?>" name="article_id">
                    <input type="submit" value="delete">
                </form>
            </div>
        <?php endforeach; ?>
    </body>
</html>