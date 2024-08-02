<?php
require 'connect_and_create_table.php';

// Periksa apakah data POST ada
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['min_price'])) {
    $min_price = $_POST['min_price'];

    // Validasi harga minimum
    if (is_numeric($min_price) && $min_price >= 0) {
        // SQL untuk memilih produk dengan harga di atas harga minimum
        $sql = "SELECT * FROM products WHERE price > :min_price";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['min_price' => $min_price]);

        // Menampilkan hasil dalam tabel HTML
        echo "<h2>Produk dengan harga di atas $min_price</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                </tr>";

        // Loop melalui setiap baris hasil query
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars(number_format($row['price'], 2)) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Harga minimum harus berupa angka positif.";
    }
} else {
    echo "Silakan masukkan harga minimum.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Filter Products</title>
</head>
<body>

<!-- Formulir untuk memasukkan harga minimum -->
<form action="filter_products.php" method="post">
    <label for="min_price">Harga Minimum:</label>
    <input type="number" id="min_price" name="min_price" step="0.01" min="0" required>
    <input type="submit" value="Tampilkan Produk">
</form>

</body>
</html>
