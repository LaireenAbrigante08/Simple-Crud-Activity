<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $barcode = $_POST['barcode'];

    $sql = "UPDATE product SET 
            Name='$name', 
            Description='$description', 
            Quantity=$quantity, 
            Price=$price, 
            Barcode='$barcode' 
            WHERE ID=$id";

if ($conn->query($sql) === TRUE) {
    echo "<p>Product updated successfully. <a href='read.php'>Return to list</a></p>";
} else {
    echo "<p>Error updating product: " . $conn->error . "</p>";
}

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>
    <div class="container">
        <h1>Update Product</h1>
        
        <?php if(isset($message)) echo $message; ?>

        <form method="POST" action="update.php">
            <label for="id">ID:</label>
            <input type="number" name="id" id="id" value="<?php echo htmlspecialchars($_POST['id']); ?>" readonly><br>
            
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($_POST['name']); ?>"><br>
            
            <label for="description">Description:</label>
            <textarea name="description" id="description"><?php echo htmlspecialchars($_POST['description']); ?></textarea><br>
            
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" value="<?php echo htmlspecialchars($_POST['quantity']); ?>"><br>
            
            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" id="price" value="<?php echo htmlspecialchars($_POST['price']); ?>"><br>
            
            <label for="barcode">Barcode:</label>
            <input type="text" name="barcode" id="barcode" value="<?php echo htmlspecialchars($_POST['barcode']); ?>"><br>
            
            <input type="submit" value="Update" class="btn">
        </form>
    </div>
</body>
</html>