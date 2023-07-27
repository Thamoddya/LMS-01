<?php
include_once "../connection.php";

$subjectId = $_POST['subjectId'];

// Query the database to fetch the videos for the selected subject
$getVideoData = $pdo->prepare("SELECT * FROM video WHERE subjectTitle_id = ?");
$getVideoData->execute([$subjectId]);
$videoDataRows = $getVideoData->fetchAll(PDO::FETCH_ASSOC);

// Generate HTML options for the second select tab
$options = '';
$options .= '<option>Select Video </option>';
foreach ($videoDataRows as $videoData) {

    if($videoData['private'] =='1'){
        $options .= '<option class="bg-info" value="' . $videoData['publicVideoId'] . '" data-videoLink="' . $videoData['videoLink'] . '" data-videoYtLink = "'.$videoData['ytLink'].'">' . $videoData['videoName'] . '</option>';
    }else{
        $options .= '<option  value="' . $videoData['publicVideoId'] . '" data-videoLink="' . $videoData['videoLink'] . '" data-videoYtLink = "'.$videoData['ytLink'].'">' . $videoData['videoName'] . '</option>';
    }
}
echo $options;
?>