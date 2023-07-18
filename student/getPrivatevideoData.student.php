   <?php
    session_start();
    include_once "../connection.php";
    $student = $_SESSION['student'];
    $titleID = $_POST['titleID'];
    $batchID = $_POST['batchID'];

    $getVideoDataQyery = "SELECT * FROM video INNER JOIN batch_has_video ON batch_has_video.video_publicVideoId = video.publicVideoId WHERE batch_has_video.batch_batchId = ? AND subjectTitle_id = ? AND video.private='1'  ";
    $getPublicVideoData = $pdo->prepare($getVideoDataQyery);
    $getPublicVideoData->execute([$batchID, $titleID]);

    $PublicVideoData = $getPublicVideoData->fetchAll(PDO::FETCH_ASSOC);

    if (count($PublicVideoData) == 0) {
        echo '<button class="my-1 bg-primary p-3 text-center fw-bold text-white" >Still Uploading...</button>';
    } else {
        foreach ($PublicVideoData as $data) {
            echo '<button class="my-1 bg-primary p-3 text-center fw-bold text-white" id="loadVideoData" onclick="openVideoLink(this);" data-videoLink="../admin/' . $data['videoLink'] . '">' . $data['videoName'] . '</button>';
        }
    }
    ?>