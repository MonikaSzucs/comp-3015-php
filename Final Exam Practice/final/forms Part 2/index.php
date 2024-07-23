<?php 

require_once 'helpers/helpers.php';

// Database credentials
$dsn = "mysql:host=localhost;dbname=c3015_final";
$username = "root";
$password = "root";

try {
    // Establish PDO connection
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exceptions
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['grocery']) && isset($_POST['quantity'])) {
        $grocery = $_POST['grocery'];
        $quantity = $_POST['quantity'];

        // Validate input (replace with your validation logic)
        if (!validGrocery($grocery)) {
            header('Location: index.php?grocery_error=Invalid grocery name');
            exit();
        } 
        if (!validQuantity($quantity)) {
            header('Location: index.php?quantity_error=Invalid quantity');
            exit();
        }

        // Insert item into inventory using prepared statement
        $stmt = $pdo->prepare("INSERT INTO inventory (item_name, quantity) VALUES (:item_name, :quantity)");
        $stmt->execute(['item_name' => $grocery, 'quantity' => $quantity]);

        // Redirect to avoid duplicate form submissions
        header("Location: index.php");
        exit();
    }

    // Handle delete functionality
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
        $item_id = $_POST['item_id'];

        // Delete item from inventory using prepared statement
        $stmt = $pdo->prepare("DELETE FROM inventory WHERE id = :id");
        $stmt->execute(['id' => $item_id]);

        // Redirect to avoid re-posting on refresh
        header("Location: index.php");
        exit();
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
    <?php require_once 'layout/header.php'?>
    <form method="POST" action="#">
            <div>
                <label>Grocery:</label>
                <span class="error"><?= isset($_GET['grocery_error']) ? htmlspecialchars($_GET['grocery_error']) : '' ?></span>
                <input type="text" name="grocery" placeholder="e.g., Pineapples">
            </div>
            <div>
                <label>Quantity:</label>
                <span><?= isset($_GET['quantity_error']) ? htmlspecialchars($_GET['quantity_error']) : '' ?></span>
                <input type="text" name="quantity">
            </div>
            <input type="submit" value="Add">
        </form>

        <h2>Inventory</h2>
        <form method="GET" action="#">
            <input type="text" name="search" placeholder="Search by grocery">
            <input type="submit" value="Search">
            <input type="submit" name="reset" value="Reset">
        </form>

        <ul>
            <?php
            try {
                // Handle search functionality
                if (isset($_GET['search'])) {
                    $search = $_GET['search'];

                    // Perform search using prepared statement
                    $statement = $pdo->prepare("SELECT * FROM inventory WHERE item_name LIKE :search");
                    $statement->execute(['search' => "%$search%"]);
                    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    // Display all inventory items by default
                    $statement = $pdo->query("SELECT * FROM inventory");
                    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
                }

                foreach ($results as $row) {
                    echo "<div style='display: flex; flex-flow: row;'><span style='padding-right: 20px'>{$row['item_name']} - {$row['quantity']}</span>";
                    echo "<form method='POST' action=''>";
                    echo "<input type='hidden' name='item_id' value='{$row['id']}'>";
                    echo "<input type='submit' name='delete' value='Delete'>";
                    echo "</form>";
                    echo "</div>";
                    
                }
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
            ?>
        </ul>
    </body>
</html>

<style>
    span.error {
        color: red;
    }
</style>