<?php

// Informasi koneksi ke database
$host = 'localhost';  
$db = 'my_database';  
$user = 'root';       
$pass = '';          

try {
    // Membuat koneksi ke database menggunakan PDO
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4"; 
    $pdo = new PDO($dsn, $user, $pass);  
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

    echo "Koneksi ke database berhasil.<br>";

    // SQL untuk membuat tabel 'products'
    $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,  
        name VARCHAR(100) NOT NULL,       
        price FLOAT NOT NULL,             
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
    )";

    // Menjalankan perintah SQL
    $pdo->exec($sql);

    echo "Tabel 'products' berhasil dibuat.";

} catch (PDOException $e) {
    // Menangani error saat koneksi atau eksekusi SQL gagal
    echo "Koneksi atau pembuatan tabel gagal: " . $e->getMessage();
}

