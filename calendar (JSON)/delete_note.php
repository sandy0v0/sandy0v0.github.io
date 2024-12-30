<?php
$notesFile = 'notes.json';

// 讀取現有便條資料
if (file_exists($notesFile)) {
    $notes = json_decode(file_get_contents($notesFile), true);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];

        // 刪除指定的便條
        unset($notes[$id]);

        // 儲存回 JSON 文件
        file_put_contents($notesFile, json_encode($notes, JSON_PRETTY_PRINT));
    }
}

// 回到主畫面
header("Location: index.php");
exit;
?>
