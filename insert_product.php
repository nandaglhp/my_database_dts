<?php
require 'connect_and_create_table.php';

$name = 'Laptop';
$price = 15000.00;

$sql = "INSERT INTO products (name, price) VALUES (:name, :price)";
$stmt = $pdo->prepare($sql);

$stmt->execute(['name' => $name, 'price' => $price]);

echo "Data berhasil ditambahkan!";