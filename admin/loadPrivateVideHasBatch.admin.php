<?php
include_once "../connection.php";

$batchID = $_POST['batchID'];

// Query the database to fetch the videos for the selected subject
$getVideoData = $pdo->prepare("SELECT * FROM batch_has_video 
    INNER JOIN video ON video.publicVideoId = batch_has_video.video_publicVideoId 
    WHERE batch_has_video.batch_batchId = ?");
$getVideoData->execute([$batchID]);
$videoDataRows = $getVideoData->fetchAll(PDO::FETCH_ASSOC);

// Generate HTML options for the second select tab
$options = '';
foreach ($videoDataRows as $videoData) {
    $options .= '<option value="' . $videoData['video_publicVideoId'] . '">' . $videoData['videoName'] . '</option>';
}
echo $options;
?>