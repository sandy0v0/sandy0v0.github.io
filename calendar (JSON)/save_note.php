<?php
$notesFile = 'notes.json';

// 確保 JSON 文件存在
if (!file_exists($notesFile)) {
    file_put_contents($notesFile, json_encode([]));
}

// 讀取現有便條資料
$notes = json_decode(file_get_contents($notesFile), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?: uniqid(); // 如果沒有 ID，生成新 ID
    $content = $_POST['content'];

    // 新增或更新便條
    $notes[$id] = ['content' => $content];

    // 儲存回 JSON 文件
    file_put_contents($notesFile, json_encode($notes, JSON_PRETTY_PRINT));
}

// 回到主畫面
header("Location: index.php");
exit;
?>
