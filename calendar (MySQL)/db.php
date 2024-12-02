<?php
$host = 'localhost';        // 資料庫主機
$dbname = 'notes_db';       // 資料庫名稱
$user = 'root';             // 使用者名稱（替換為你的 MySQL 使用者）
$password = '';             // 密碼（替換為你的 MySQL 密碼）

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('資料庫連線失敗：' . $e->getMessage());
}
