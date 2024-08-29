<?php
include 'db.php';

$sql = "SELECT * FROM product";
$result = $conn->query($sql);

echo "<div style='margin-bottom: 20px;'>
        <form action='create.php' method='GET' style='display:inline;'>
            <input type='submit' value='Create New Product'>
        </form>
      </div>";

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Barcode</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["ID"] . "</td>
                <td>" . $row["Name"] . "</td>
                <td>" . $row["Description"] . "</td>
                <td>" . $row["Quantity"] . "</td>
                <td>" . $row["Price"] . "</td>
                <td>" . $row["Barcode"] . "</td>
                <td>" . $row["Created_at"] . "</td>
                <td>" . $row["Updated_at"] . "</td>
                <td>
                    <form action='update.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='id' value='" . $row["ID"] . "'>
                        <input type='hidden' name='name' value='" . $row["Name"] . "'>
                        <input type='hidden' name='description' value='" . $row["Description"] . "'>
                        <input type='hidden' name='quantity' value='" . $row["Quantity"] . "'>
                        <input type='hidden' name='price' value='" . $row["Price"] . "'>
                        <input type='hidden' name='barcode' value='" . $row["Barcode"] . "'>
                        <input type='submit' value='Update'>
                    </form>
                </td>
                <td>
                    <form action='delete.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='id' value='" . $row["ID"] . "'>
                        <input type='submit' value='Delete' onclick='return confirm(\"Are you sure you want to delete this product?\");'>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No products found.";
}

$conn->close();
?>
