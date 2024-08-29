<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM product WHERE ID=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Product deleted successfully";
    } else {
        echo "Error deleting product: " . $conn->error;
    }
    header("Location: read.php");

    $conn->close();
}
?>

<form method="POST" action="delete.php">
    ID: <input type="number" name="id"><br>
    <input type="submit" value="Delete">
</form>
