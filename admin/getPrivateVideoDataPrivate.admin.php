<?php
include_once "../connection.php";


// Query the database to fetch the videos for the selected subject
$getVideoData = $pdo->prepare("SELECT * FROM batch");
$getVideoData->execute();
$videoDataRows = $getVideoData->fetchAll(PDO::FETCH_ASSOC);

// Generate HTML options for the second select tab
$options = '';
$options .= '<option>Select Batch </option>';
foreach ($videoDataRows as $videoData) {

        $options .= '<option  value="' . $videoData['batchId'] . '" >' . $videoData['batchName'] . '</option>';
   
}
echo $options;
?>