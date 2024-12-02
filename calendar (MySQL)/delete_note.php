<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $stmt = $pdo->prepare("DELETE FROM notes WHERE id = :id");
    $stmt->execute([':id' => $id]);

    header('Location: index.php');
    exit();
}
?>
