<?php 

require 'connect_and_create_table.php';

$id = 2;
$sql = 'DELETE FROM products WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

echo "id $id berhasil dihapus";