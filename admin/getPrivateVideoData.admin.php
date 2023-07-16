<?php
include_once "../connection.php";

// Query the database to fetch the videos for the selected subject
$getVideoData = $pdo->prepare("SELECT * FROM video WHERE private = '1'");
$getVideoData->execute();
$videoDataRows = $getVideoData->fetchAll(PDO::FETCH_ASSOC);

// Generate HTML options for the second select tab
$options = '';
$options .= '<option>Select Video </option>';
foreach ($videoDataRows as $videoData) {

    if($videoData['private'] =='1'){
        $options .= '<option class="bg-info" value="' . $videoData['publicVideoId'] . '" data-videoLink="' . $videoData['videoLink'] . '">' . $videoData['videoName'] . '</option>';
    }else{
        $options .= '<option  value="' . $videoData['publicVideoId'] . '" data-videoLink="' . $videoData['videoLink'] . '">' . $videoData['videoName'] . '</option>';
    }
}
echo $options;
?>