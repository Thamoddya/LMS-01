<?php
session_start();
include_once "../connection.php";
$student = $_SESSION['student'];
$titleID = $_POST['titleID'];

$getVideoDataQyery = "SELECT * FROM video INNER JOIN subjecttitle ON subjecttitle.id = video.subjectTitle_id WHERE private = '0' AND subjectTitle_id = ?";
$getPublicVideoData = $pdo->prepare($getVideoDataQyery);
$getPublicVideoData->execute([$titleID]);

$PublicVideoData = $getPublicVideoData->fetchAll(PDO::FETCH_ASSOC);

if (count($PublicVideoData) == 0) {
    echo '<button class="my-1 bg-success p-3 text-center fw-bold text-white" >Still Uploading...</button>';
} else {
    foreach ($PublicVideoData as $data) {
        echo '<button class="my-1 bg-success p-3 text-center fw-bold text-white" id="loadVideoData" onclick="openVideoLink(this);" data-videoLink="../admin/' . $data['videoLink'] . '">' . $data['videoName'] . '</button>';
    }
}
?>