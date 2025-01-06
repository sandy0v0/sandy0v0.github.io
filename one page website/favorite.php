<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit;
}

$host = 'localhost';
$dbname = 'music_app';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $item_id = $_POST['item_id'];
    $is_favorite = $_POST['is_favorite'] === 'true';

    $stmt = $pdo->prepare("REPLACE INTO favorites (user_id, item_id, is_favorite) VALUES (:user_id, :item_id, :is_favorite)");
    $stmt->execute(['user_id' => $user_id, 'item_id' => $item_id, 'is_favorite' => $is_favorite]);

    echo json_encode(['success' => true]);
}
?>