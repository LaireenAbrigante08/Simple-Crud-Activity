<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $barcode = $_POST['barcode'];

    $sql = "INSERT INTO product (Name, Description, Quantity, Price, Barcode)
            VALUES ('$name', '$description', $quantity, $price, '$barcode')";

    if ($conn->query($sql) === TRUE) {
        echo "<p class='success'>New product created successfully</p>";
    } else {
        echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }

    header("Location: read.php");

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>
    <div class="container">
        <h1>Create Product</h1>
        <form method="POST" action="create.php">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea><br>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required><br>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required><br>
            <label for="barcode">Barcode:</label>
            <input type="text" id="barcode" name="barcode" required><br>
            <input type="submit" value="Create">
        </form>
    </div>
</body>
</html>
