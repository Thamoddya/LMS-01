<?php
include_once "../connection.php";

$videoID = $_POST['videoID'];
$batchID = $_POST['batchID'];

// Query the database to fetch the videos for the selected subject
if (empty($videoID) || empty($batchID)) {
    echo "Select Video and Batch";
} else {
    try {
        $DeleteVideo = $pdo->prepare("DELETE FROM batch_has_video WHERE batch_batchId = '".$batchID."' AND video_publicVideoId = '".$videoID."' ");
        $DeleteVideo->execute();
        echo "Unassign Successful";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>