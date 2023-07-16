<?php

include_once "../connection.php";
if (isset($_POST['privateVideoId']) || isset($_POST['batchId'])) {
    $privateVideoID = $_POST['privateVideoId'];
    $batchID = $_POST['batchId'];

    $checkDataExist = $pdo->prepare("SELECT * FROM batch_has_video WHERE batch_batchId = ? AND video_publicVideoId = ?");
    $checkDataExist->execute([$batchID, $privateVideoID]);
    $checkData = $checkDataExist->fetchAll(PDO::FETCH_ASSOC);
    if (count($checkData) > 0) {
        echo "Data exists";
    } else {
        $insertData = $pdo->prepare("INSERT INTO batch_has_video (batch_batchId, video_publicVideoId) VALUES (?,?)");
        $insertData->execute([$batchID, $privateVideoID]);
        echo "Success";
    }
}
?>