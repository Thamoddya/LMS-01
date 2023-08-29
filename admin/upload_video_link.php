<?php
    include_once "../connection.php";
if (isset($_POST['videoUnit'], $_POST['videoType'], $_POST['VideoLink'], $_POST['VideoName'])) {

    $videoUnit = $_POST['videoUnit'];
    $videoName = $_POST['VideoName'];
    $videoType = $_POST['videoType'];
    $VideoLink = $_POST['VideoLink'];

    $videoPDFLink = 'null';
    $subjectTitleId = $videoUnit;

    $insertStatement = $pdo->prepare("INSERT INTO video(videoName, ytLink, videoPDFLink, private, subjectTitle_id) VALUES (?, ?, ?, ?, ?)");
    $insertResult = $insertStatement->execute([$videoName, $VideoLink, $videoPDFLink, $videoType, $subjectTitleId]);

    if ($insertResult) {
        echo 'successful.';
    } else {
        echo 'Error inserting data into the database.';
    }
} else {
    echo 'Incomplete Data.';
}
?>