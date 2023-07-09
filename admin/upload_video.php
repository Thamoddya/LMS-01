<?php
if (isset($_POST['videoUnit'], $_POST['videoType'], $_FILES['video'],$_POST['VideoName'])) {
    $videoUnit = $_POST['videoUnit'];
    $videoType = $_POST['videoType'];
    $video = $_FILES['video'];

    $uploadDir = 'videos/';
    $unitName = $_POST['videoUnit']; 
    $fileName = $_POST['VideoName'];
    $fileTmp = $video['tmp_name'];

    if (move_uploaded_file($fileTmp, $uploadDir . $fileName.'.mp4')) {

        include_once "../connection.php";

        $videoName = $fileName;
        $videoLink = $uploadDir . $fileName.'.mp4';
        $videoPDFLink = 'null';
        $subjectTitleId = $videoUnit;

        $insertStatement = $pdo->prepare("INSERT INTO video(videoName, videoLink, videoPDFLink, private, subjectTitle_id) VALUES (?, ?, ?, ?, ?)");
        $insertResult = $insertStatement->execute([$videoName, $videoLink, $videoPDFLink, $videoType, $subjectTitleId]);

        if ($insertResult) {
            echo 'File uploaded and data inserted successfully.';
        } else {
            echo 'Error inserting data into the database.';
        }
    } else {
        echo 'Error uploading the file.';
    }
} else {
    echo 'Incomplete form data.';
};

?>