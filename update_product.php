<?php 

require 'connect_and_create_table.php';

$id = 1;
$new_price = 17500.00;
$sql = "UPDATE products SET price = :price WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['price' => $new_price, 'id' => $id]);

echo "Data berhsil diupdate";