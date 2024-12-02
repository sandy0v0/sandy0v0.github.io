<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $id = $_POST['id'] ?? null;

    if ($id) {
        // 編輯便條
        $stmt = $pdo->prepare("UPDATE notes SET content = :content WHERE id = :id");
        $stmt->execute([':content' => $content, ':id' => $id]);
    } else {
        // 新增便條
        $stmt = $pdo->prepare("INSERT INTO notes (content) VALUES (:content)");
        $stmt->execute([':content' => $content]);
    }

    header('Location: index.php');
    exit();
}
?>
