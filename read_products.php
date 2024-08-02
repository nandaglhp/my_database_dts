<?php
require 'connect_and_create_table.php';
$sql = "SELECT * FROM products";
$stmt = $pdo->query($sql);
// loop ambil products

// Menampilkan data dalam bentuk tabel HTML
echo "<table border='1'>
        <tr>
            <th>Name</th>
            <th>Price</th>
        </tr>";

// Loop untuk mengambil setiap baris dari hasil query
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
    echo "<td>" . htmlspecialchars(number_format($row['price'], 2)) . "</td>";
    echo "</tr>";
}

echo "</table>";
