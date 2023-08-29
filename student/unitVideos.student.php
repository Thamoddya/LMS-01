<?php
session_start();

if ($_SESSION['student'] == null) {
    header('Location: ../login.php');
} else {
    $student = $_SESSION['student'];
}
include_once "../connection.php";

$titleID = $_GET['titleID'];

if ($_GET['titleID'] == null) {
    header("Location: ./index.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIDEO -

    </title>
    <link href="https://vjs.zencdn.net/8.3.0/video-js.css" rel="stylesheet" />
    <?php
    include_once "./studentComponents/header.student.php";
    include_once "./studentComponents/responsive.student.php";
    ?>

    <style>
    #dropArea {
        width: 100%;
        margin-top: 20px;
        height: 200px;
        border: 2px dashed #ccc;
        text-align: center;
        padding: 20px;
        cursor: pointer;
    }
    </style>
</head>

<body>

    <?php
include_once "../components/preloader.component.php";
?>

    <div class="page-wrapper">
        <header class="main-header">
            <div class="header-top">
                <div class="auto-container">
                    <div class="clearfix">
                        <!-- Top Left -->
                        <div class="top-left pull-left clearfix">
                            <!-- Info List -->
                            <ul class="info-list">
                                <li>
                                    <span>Name :-</span><a href="tel:071 523 8348">

                                    </a>
                                </li>
                                <li>
                                    <span>Unit Name :- </span>


                                </li>
                                <li>
                                    <span>Grade :- </span>

                                </li>
                            </ul>
                        </div>
                        <!-- Top Right -->
                        <div class="top-right pull-right clearfix">
                            <!-- Login Nav -->
                            <ul class="login-nav">
                                <li><a href="#"></a></li>
                                <li><a href="./index.php">HOME</a></li>
                                <li><a href="#"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div class="container-fluid">
        <div class="row ">

            <div class="col-12 col-md-4 mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="row" id="publicVideo">
                            <?php
                        $getVideoDataQyery = "SELECT * FROM video INNER JOIN subjecttitle ON subjecttitle.id = video.subjectTitle_id WHERE private = '0' AND subjectTitle_id = ?";
                        $getPublicVideoData = $pdo->prepare($getVideoDataQyery);
                        $getPublicVideoData->execute([$titleID]);

                        $PublicVideoData = $getPublicVideoData->fetchAll(PDO::FETCH_ASSOC);

                        if (count($PublicVideoData) == 0) {
                            echo '<button class="my-1 bg-success p-3 text-center fw-bold text-white" >Still Uploading...</button>';
                        } else {
                            foreach ($PublicVideoData as $data) {
                                if($data['videoLink']==null){
                                    echo '<button class="my-1 bg-primary p-3 text-center fw-bold text-white" id="loadVideoData" onclick="openVideoLink(this);" data-videoLink="" data-videoYtLink = "'.$data['ytLink'].'">' . $data['videoName'] . '</button>';
                                }
                                else {
                                    echo '<button class="my-1 bg-primary p-3 text-center fw-bold text-white" id="loadVideoData" onclick="openVideoLink(this);" data-videoYtLink ="" data-videoLink="../admin/' . $data['videoLink'] . '">' . $data['videoName'] . '</button>';
                                }
                            }
                        }
                        ?>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <?php

                        $batchID = $student['batch_batchId'];

                        $getPrivateVideoData = "SELECT * FROM video INNER JOIN batch_has_video ON batch_has_video.video_publicVideoId = video.publicVideoId WHERE batch_has_video.batch_batchId = ? AND subjectTitle_id = ? AND video.private='1'  ";
                        $getPrivateVideoData = $pdo->prepare($getPrivateVideoData);
                        $getPrivateVideoData->execute([$batchID, $titleID]);

                        $privateVideoData = $getPrivateVideoData->fetchAll(PDO::FETCH_ASSOC);

                        if (count($privateVideoData) == 0) {
                            echo '<button class="my-1 bg-primary p-3 text-center fw-bold text-white" >Still Uploading...</button>';
                        } else {
                            foreach ($privateVideoData as $data) {
                                if($data['videoLink']==null){
                                    echo '<button class="my-1 bg-primary p-3 text-center fw-bold text-white" id="loadVideoData" onclick="openVideoLink(this);" data-videoLink="' . $data['ytLink'] . '">' . $data['videoName'] . '</button>';
                                }
                                else {
                                    echo '<button class="my-1 bg-primary p-3 text-center fw-bold text-white" id="loadVideoData" onclick="openVideoLink(this);" data-videoLink="../admin/' . $data['videoLink'] . '">' . $data['videoName'] . '</button>';
                                }
                            }
                        }
                        ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-12 col-md-8">
                <video id="UnitVideoLink" class="video-js vjs-default-skin col-12" controls preload="auto" height="500"
                    width="100%" data-setup='{
                              }'>
                    <source id="videoSource" src="../admin/videos/NEELICT TV advertisements.mp4" type="video/mp4" />
                </video>
                <iframe class="d-none" id="ytVideoFrame" width="100%" height="500"
                    src="https://www.youtube.com/embed/erO877oRhJQ" frameborder="0" allowfullscreen></iframe>

                <div id="dropArea">
                    <p>Drag and drop a PDF file here.</p>
                </div>
            </div>

            <div class="col-12 col-md-4 ">

            </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.8.335/pdf.min.js"></script>
    <script src="https://vjs.zencdn.net/8.3.0/video.min.js"></script>
    <?php
include_once "./studentComponents/body.student.php";
?>
    <script>
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.8.335/pdf.worker.min.js';

    // Function to handle dropped files
    function handleFileDrop(event) {
        event.preventDefault();
        var files = event.dataTransfer.files;
        if (files.length > 0) {
            var file = files[0];
            if (file.type === 'application/pdf') {
                var reader = new FileReader();
                reader.onload = function(event) {
                    var pdfData = new Uint8Array(event.target.result);
                    renderPdfInNewTab(pdfData);
                };
                reader.readAsArrayBuffer(file);
            } else {
                alert('Please drop a valid PDF file.');
            }
        }
    }

    // Function to render PDF in new window or tab
    function renderPdfInNewTab(pdfData) {
        var blob = new Blob([pdfData], {
            type: 'application/pdf'
        });
        var url = URL.createObjectURL(blob);
        window.open(url, '_blank');
    }

    // Event listener for drag over
    document.addEventListener('dragover', function(event) {
        event.preventDefault();
    });

    // Event listener for drop
    document.addEventListener('drop', handleFileDrop);

    // Event listener for click (fallback for older browsers)
    document.getElementById('dropArea').addEventListener('click', function() {
        var fileInput = document.createElement('input');
        fileInput.type = 'file';
        fileInput.accept = 'application/pdf';
        fileInput.onchange = function(event) {
            var file = event.target.files[0];
            if (file.type === 'application/pdf') {
                var reader = new FileReader();
                reader.onload = function(event) {
                    var pdfData = new Uint8Array(event.target.result);
                    renderPdfInNewTab(pdfData);
                };
                reader.readAsArrayBuffer(file);
            } else {
                alert('Please choose a valid PDF file.');
            }
        };
        fileInput.click();
    });


    function handleVisibilityChange() {
        if (document.hidden && !videoPlayer.paused()) {

            window.location.reload();
        }
    }

    var videoPlayer = videojs('UnitVideoLink');


    videoPlayer.on('play', function() {

        document.addEventListener('visibilitychange', handleVisibilityChange);
    });


    window.addEventListener('focus', function() {

        document.removeEventListener('visibilitychange', handleVisibilityChange);
    });


    function openVideoLink(button) {
        let videoLink = button.getAttribute('data-videoLink');
        let videoTYLink = button.getAttribute('data-videoYtLink');

        if (!videoLink) {
            // Hide local video player
            $('#UnitVideoLink').addClass('d-none');
            $('#ytVideoFrame').removeClass("d-none");

            $('#ytVideoFrame').attr('src', `https://www.youtube.com/embed/${videoTYLink}`);
            $('#ytVideoFrame').show();
        } else {
            // Hide YouTube iframe
            $('#ytVideoFrame').hide();

            $('#UnitVideoLink').removeClass('d-none');
            $('#ytVideoFrame').addClass("d-none");

            // Update Video.js player source and play the video
            videojs('UnitVideoLink').src({
                type: 'video/mp4',
                src: videoLink
            });
            videojs('UnitVideoLink').load();
            videojs('UnitVideoLink').play();
        }

        $('#videoSource').attr('src', videoLink);
        videojs('UnitVideoLink').src(videoLink);
        videojs('UnitVideoLink').load();
        videojs('UnitVideoLink').play();
    }



    const loadPrivateVideo = () => {
        let formdata = new FormData();
        formdata.append('titleID', '<?php echo $titleID; ?>');
        formdata.append('batchID', '<?php echo $student['batch_batchId']; ?>');

        $.ajax({
            type: 'POST',
            url: 'getPrivatevideoData.student.php',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response === 'error') {
                    console.log('Error occurred');
                } else {
                    $('#privateVideo').html(response);
                }
            },
        });
    };
    loadPrivateVideo();
    loadPublicVideo();
    </script>
</body>

</html>