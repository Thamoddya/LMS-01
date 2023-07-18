<?php
session_start();

if ($_SESSION['admin'] == null) {
  header('Location: ../adminLogin.php');
} else {
  $admin = $_SESSION['admin'];
}
include_once "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NEEL ICT | ADMIN</title>

  <?php
  include_once "./adminComponents/header.admin.php";
  include_once "./adminComponents/responsive.admin.php";
  ?>
</head>

<body class="">

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
                  <span>Name :-</span><a href="#">
                    <?php echo  $admin['adminName'] ?>
                  </a>
                </li>
                <li>
                  <span>Email :- </span><a href="#">
                    <?php echo  $admin['adminEmail']; ?>
                  </a>
                </li>
                <li>
                  <span>Mobile :- </span><a href="#">
                    <?php echo  $admin['adminMobile']; ?>
                  </a>
                </li>
              </ul>
            </div>
            <!-- Top Right -->
            <div class="top-right pull-right clearfix">
              <!-- Login Nav -->
              <ul class="login-nav">
                <li><a href="#">Logout</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Youtube</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section class="student-profile-section">

      <div class="circle-one"></div>
      <div class="circle-two"></div>
      <div class="auto-container">
        <div class="row clearfix">
          <!-- Image Section -->
          <div class="image-column col-lg-3 col-md-12 col-sm-12">
            <div class="inner-column">
              <div class="image">
                <img src="../assets/images/resource/image-1.jpg" alt="" />
              </div>
              <h4>
                Neel Prasanna
              </h4>
              <div class="text">
                neel@gmail.com
              </div>
              <div class="text">
                0658463442
              </div>

              <ul class="student-editing">
                <li data-tab="#prod-setting" class="tab-btn"><a>Edit Account</a></li>
              </ul>
            </div>
          </div>

          <div class="content-column col-lg-9 col-md-12 col-sm-12">
            <div class="inner-column">

              <!-- Profile Info Tabs-->
              <div class="profile-info-tabs">
                <!-- Profile Tabs-->
                <div class="profile-tabs tabs-box">

                  <!--Tab Btns-->
                  <ul class="tab-btns tab-buttons clearfix">
                    <li data-tab="#prod-overview" class="tab-btn active-btn">Main</li>
                    <li data-tab="#prod-billing" class="tab-btn">Billing</li>
                    <li data-tab="#prod-student" class="tab-btn">Student </li>
                    <li data-tab="#prod-batch" class="tab-btn">Batch</li>
                    <li data-tab="#prod-subjectmanage" class="tab-btn">Subject</li>
                    <li data-tab="#prod-video" class="tab-btn">Video</li>
                  </ul>

                  <!--Tabs Container-->
                  <div class="tabs-content">

                    <!--Tab / Active Tab-->
                    <div class="tab active-tab" id="prod-overview">
                      <div class="content">

                        <?php
                        include_once "./overview.admin.php";
                        ?>


                      </div>
                    </div>

                    <!-- Tab -->
                    <div class="tab" id="prod-billing">
                      <div class="content">

                        <div class="row clearfix">


                        </div>

                      </div>
                    </div>
                    <div class="tab" id="prod-batch">
                      <div class="content">

                        <div class="row clearfix">
                          <div class="col-12 mt-1">
                            <h4>Registed Batch</h4>
                          </div>
                          <div class="col-12">
                            <div class="row">

                              <select class="form-select" aria-label="Default select example">
                                <option selected>Select Batch</option>
                                <?php
                                $getBatchData = $pdo->prepare('SELECT * FROM batch');
                                $getBatchData->execute();
                                while ($rowOfBatchData = $getBatchData->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                  <option value="<?php echo $rowOfBatchData['batchId']; ?>"><?php echo $rowOfBatchData['batchName']; ?></option>
                                <?php
                                }
                                ?>
                              </select>

                            </div>
                          </div>
                        </div>

                      </div>
                    </div>


                    <div class="tab" id="prod-video">
                      <div class="content">

                        <div class="row clearfix">
                          <?php
                          include_once "./video.admin.php";
                          ?>

                        </div>
                      </div>
                    </div>

                    <!-- Tab -->
                    <div class="tab" id="prod-student">
                      <div class="content">
                        <div class="content">
                          <div class="container-fluid">
                            <?php
                            include_once "./student.admin.php";
                            ?>
                          </div>
                          <!-- Title Box -->

                          <!-- Profile Form -->
                          <div class="profile-form">

                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="tab" id="prod-student">
                      <div class="content">

                        <div class="content">

                          <!-- Title Box -->
                          <div class="title-box">
                            <h5>Edit Account Details</h5>
                          </div>
                          <!-- Profile Form -->
                          <div class="profile-form">

                            <!-- Profile Form -->

                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab" id="prod-subjectmanage">
                      <div class="content">

                        <div class="content">
                          <?php
                          include_once "./subjectmanage.admin.php";
                          ?>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>

  <?php
  include_once "./adminComponents/body.admin.php";
  ?>

  <script>
    let subjectID;

    const loadVideosToBatch = () => {
      let batchID = $("#getPrivatevideoData").val();

      let formData = new FormData();
      formData.append('batchID', batchID);

      $.ajax({
        url: './loadPrivateVideHasBatch.admin.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          $('#loadBatchhasVideoData').html(response);
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    };

    const UnassignBatchToVideo = () => {
      Swal.fire({
        title: 'Comfirm  To Unassign Video?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Save',
        denyButtonText: `Cancel Unassign`,
      }).then((result) => {
        if (result.isConfirmed) {
          confirmUnassignVideo();
        } else if (result.isDenied) {
          Swal.fire('Changes are not saved', '', 'info')
        }
      })
    };
    const confirmUnassignVideo = () => {

      let batchID = $('#getPrivatevideoData').val();
      let videoID = $("#loadBatchhasVideoData").val();

      let formData = new FormData();
      formData.append('batchID', batchID);
      formData.append('videoID', videoID);

      $.ajax({
        url: './unassignVideoFrombatch.admin.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          Swal.fire(response);
          loadVideosToBatch();
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    }

    const addPrivateVideoToBatch = () => {
      let provateVideoId = $('#loadPrivateVideoData').val();
      let batchId = $('#loadPrivateVideoDataVithVideo').val();

      let formData = new FormData();
      formData.append('privateVideoId', provateVideoId);
      formData.append('batchId', batchId);

      $.ajax({
        url: './addVideoTobatch.admin.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          swal.fire(response);
          loadVideosToBatch();
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    }

    const selectedUnit = () => {
      let selectedSubjectId = $('#gotSelectedSubject').val();
      $.ajax({
        url: './getVideoData.admin.php',
        type: 'POST',
        data: {
          subjectId: selectedSubjectId
        },
        success: function(response) {
          // Populate the second select tab with the fetched units
          $('#loadVideoData').html(response);
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    };
    const selectPrivateVideo = () => {
      $.ajax({
        url: './getPrivateVideoData.admin.php',
        type: 'POST',
        success: function(response) {
          // Populate the second select tab with the fetched units
          $('#loadPrivateVideoData').html(response);
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    };
    const setnotSetVideoData = () => {
      $.ajax({
        url: './getPrivateVideoDataPrivate.admin.php',
        type: 'POST',
        success: function(response) {
          // Populate the second select tab with the fetched units
          $('#loadPrivateVideoDataVithVideo').html(response);
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    };
    selectPrivateVideo();
    setnotSetVideoData();

    function openVideoLink() {
      let selectedOption = $('#loadVideoData option:selected');
      let videoLink = selectedOption.attr('data-videoLink');

      $('#videoSource').attr('src', videoLink);
      videojs('UnitVideoLink').src(videoLink);
      videojs('UnitVideoLink').load();
      videojs('UnitVideoLink').play();
    }

    const UploadVideo = () => {
      let videoType = $('#videoType').val();
      let videoUnit = $('#videoUnit').val();
      let VideoName = $('#uploadVideoName').val();
      let video = $('#video')[0].files[0];

      if (!videoUnit || !videoType || !video) {
        swal.fire("Please select video unit, video privacy, and choose a video file.");
        return;
      }

      let formData = new FormData();
      formData.append('videoUnit', videoUnit);
      formData.append('videoType', videoType);
      formData.append('video', video);
      formData.append('VideoName', VideoName);

      $.ajax({
        url: 'upload_video.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        xhr: function() {
          let xhr = new XMLHttpRequest();
          xhr.upload.addEventListener('progress', function(event) {
            if (event.lengthComputable) {
              let progress = Math.round((event.loaded / event.total) * 100);
              $('.progress-bar').width(progress + '%').text(progress + '%');
            }
          });
          return xhr;
        },
        success: function(response) {
          swal.fire(response);

        },
        error: function(xhr, status, error) {
          swal.fire(xhr.responseText);
        }
      });
    };

    const addNewUnit = () => {

      let unitName = $("#AddunitName").val();
      let unitGrade = $("#AddunitGrade").val();
      let unitText = $("#AddunitText").val();

      if (unitName == "" || unitGrade == "" || unitText == "") {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Please fill all the fields',
        })
      } else {
        let formdata = new FormData();
        formdata.append("subjectID", subjectID);
        formdata.append("unitName", unitName);
        formdata.append("unitGrade", unitGrade);
        formdata.append("unitText", unitText);

        $.ajax({
          type: "POST",
          url: "./addUnit.admin.php",
          data: formdata,
          contentType: false,
          processData: false,
          success: function(data) {

            if (data == 'success') {
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Subject Updated Successfully',
              })
              location.reload();
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong',
              })
            }
          }
        });
      }
    }

    const updateSubjectData = () => {
      let unitName = $("#unitName").val();
      let unitGrade = $("#unitGrade").val();
      let unitText = $("#unitText").val();

      if (unitName == "" || unitGrade == "" || unitText == "") {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Please fill all the fields',
        })
      } else {

        let formdata = new FormData();
        formdata.append("subjectID", subjectID);
        formdata.append("unitName", unitName);
        formdata.append("unitGrade", unitGrade);
        formdata.append("unitText", unitText);

        $.ajax({
          type: "POST",
          url: "updateSubjectData.php",
          data: formdata,
          contentType: false,
          processData: false,
          success: function(data) {

            if (data == 'success') {
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Subject Updated Successfully',
              })
              location.reload();
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong',
              })
            }
          }
        });
      }
    };

    const loadSubjectData = (paramSubjectID) => {
      $.ajax({
        type: "POST",
        url: "loadSubjects.php",
        data: {
          subjectID: paramSubjectID
        },
        success: function(data) {
          let subjectData = JSON.parse(data);
          subjectID = subjectData[0].id;

          if (subjectData.hasOwnProperty('error')) {
            console.error(subjectData.error);
          } else {
            $("#unitName").val(subjectData[0].titleName);
            $("#unitGrade").val(subjectData[0].grade);
            $("#unitText").val(subjectData[0].subjectText);
          }
        }
      });
    }

    const getMobileSuggestions = () => {
      var studentMobile = document.getElementById("studentMobile").value;

      $.ajax({
        type: "POST",
        url: "./admin.process/numberSuggesion.php",
        data: {
          studentMobile: studentMobile
        },
        success: function(response) {

          var suggestions = JSON.parse(response);
          var suggestionsElement = document.getElementById("mobileSuggestions");

          suggestionsElement.innerHTML = "";

          suggestions.forEach(function(suggestion) {
            var option = document.createElement("option");
            option.value = suggestion;
            suggestionsElement.appendChild(option);
          });
        }
      });
    }

    const gotoStudentProfile = (mobile) => {
      window.location.href = `./studentProfile.php?Studentmobile=${mobile}`;
    }
  </script>
</body>

</html>