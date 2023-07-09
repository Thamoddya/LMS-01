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
  <title>NEEL ICT | STUDENT</title>

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
                        <!-- Sec Title -->
                        <div class="sec-title">
                          <h4>Student Home</h4>
                        </div>
                        <div class="container-fluid">
                          <div class="row">

                            <div
                              class="mt-1 mt-md-0 col-md-4 h-25 offset-md-1 d-flex justify-content-center align-items-center bg-secondary rounded-2 p-4 mb-3 mr-3">
                              <h5 class="text-white">Total Students : 500</h5>
                            </div>
                            <div
                              class="mt-1 mt-md-0 col-md-4 h-25 offset-md-2 d-flex justify-content-center align-items-center bg-secondary rounded-2 p-4 mb-3 mr-3">
                              <h5 class="text-white">Total Videos : 500</h5>
                            </div>
                            <div class="col-12 mt-1">
                              <h4>Latest Registed Students</h4>
                            </div>

                            <div class="col-12 mt-1 overflow-auto">
                              <?php
                              include_once "./admin.layouts/main.table1.php";
                              ?>
                            </div>

                          </div>
                        </div>

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

                        </div>

                      </div>
                    </div>


                    <div class="tab" id="prod-video">
                      <div class="content">

                        <div class="row clearfix">

                          <div class="col-12">
                            <h5>UPLOAD VIDEO</h5>
                          </div>

                          <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <select class="form-select border-primary" aria-label="Default select example"
                              id="videoType">
                              <option value="0" selected>Public Video</option>
                              <option value="1">Private Video</option>
                            </select>
                          </div>

                          <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <select class="form-select border-primary" aria-label="Default select example"
                              id="videoUnit">
                              <?php
                              $getUnitData = $pdo->prepare("SELECT * FROM subjecttitle");
                              $getUnitData->execute();
                              $unitDataRows = $getUnitData->fetchAll(PDO::FETCH_ASSOC);

                              foreach ($unitDataRows as $unitData) {
                              ?>
                              <option value="<?php echo $unitData['id'] ?>">
                                <?php echo $unitData['titleName'] ?>
                              </option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>

                          <div class="input-group mb-3 mt-1">
                            <label class="input-group-text" for="inputGroupFile01">Video Name</label>
                            <input type="text" class="form-control" id="uploadVideoName">
                          </div>

                          <div class="input-group mb-3 mt-1">
                            <label class="input-group-text" for="inputGroupFile01">Upload</label>
                            <input type="file" class="form-control" id="video" accept=".mp4">
                          </div>
                          <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 0%">0%</div>
                          </div>

                        </div>
                        <button class="theme-btn mt-2 btn-style-three" onclick="UploadVideo();">Upload Video<i
                            class="fa fa-angle-right"></i></button>

                        <div class="row mt-3">

                          <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <select class="form-select border-primary" aria-label="Default select example"
                              id="gotSelectedSubject" onchange="selectedUnit();">
                              <option value="0">Select unit</option>
                              <?php
                              $getUnitData = $pdo->prepare("SELECT * FROM subjecttitle");
                              $getUnitData->execute();
                              $unitDataRows = $getUnitData->fetchAll(PDO::FETCH_ASSOC);
                          
                              foreach ($unitDataRows as $unitData) {
                                ?>
                              <option value="<?php echo $unitData['id'] ?>">
                                <?php echo $unitData['titleName'] ?>
                              </option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>

                          <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <select class="form-select border-primary" aria-label="Default select example"
                              id="loadVideoData" onchange="openVideoLink()">

                            </select>
                          </div>


                          <div class="col-12 mt-1">
                            <div class="col-12 mt-1">
                              <video id="UnitVideoLink" class="video-js vjs-default-skin col-12" controls preload="auto"
                                height="500" width="100%" poster="" data-setup='{
                              }'>
                                <source id="videoSource" src="videos/NEELICT TV advertisements.mp4" type="video/mp4" />
                              </video>

                            </div>
                          </div>

                        </div>

                      </div>
                    </div>

                    <!-- Tab -->
                    <div class="tab" id="prod-student">
                      <div class="content">

                        <div class="content">
                          <div class="container-fluid">

                            <div class="row">
                              <div class="col-12 mt-2">

                                <div class="row g-3 align-items-center">
                                  <div class="col-auto">
                                    <label for="inputPassword6" class="col-form-label">Student Mobile</label>
                                  </div>
                                  <div class="col-auto">
                                    <input type="number" class="form-control" id="studentMobile"
                                      aria-labelledby="passwordHelpInline" oninput="getMobileSuggestions()"
                                      list="mobileSuggestions">
                                    <datalist id="mobileSuggestions"></datalist> <!-- Add this datalist element -->
                                  </div>
                                  <div class="col-auto">
                                    <button type="button" class="btn btn-primary"
                                      onclick="gotoStudentProfile($('#studentMobile').val());">Profile</button>
                                  </div>
                                </div>

                              </div>
                              <div class="title-box mt-4">
                                <h5>Unverified Students</h5>
                              </div>
                              <div class="col-12 mt-3 overflow-auto ">
                                <?php
                                include_once "./admin.layouts/main.studentTable1.php";
                                ?>
                              </div>
                              <div class="title-box mt-4">
                                <h5>Verified Students</h5>
                              </div>
                              <div class="col-12 mt-3 overflow-auto">
                                <?php
                                include_once "./admin.layouts/main.studentTable2.php";
                                ?>
                              </div>

                            </div>
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

                          <div class="title-box">
                            <h5>Ongoing Units</h5>
                          </div>

                          <div class="container-fluid">
                            <div class="row">
                              <div class="col-12 mt-2">
                                <?php
                                include_once "./admin.layouts/ongoingSubjects.table1.php";
                                ?>
                              </div>
                              <div class="col-12">
                                <div class="profile-form">

                                  <!-- Profile Form -->
                                  <div>
                                    <div class="row clearfix">

                                      <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" class="border-primary" placeholder="Unit Name" required=""
                                          id="unitName">
                                      </div>
                                      <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <select class="form-select border-primary" aria-label="Default select example"
                                          id="unitGrade">
                                          <option value="12" selected>Grade :- 12</option>
                                          <option value="13">Grade :- 13</option>
                                        </select>
                                      </div>
                                      <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="text" class="border-primary" placeholder="Unit Text" required=""
                                          id="unitText">
                                        <button class="theme-btn btn-style-three" onclick="updateSubjectData();">Update
                                          Unit<i class="fa fa-angle-right"></i></button>
                                      </div>
                                      <div class="col-12 mt-3">
                                        <div class="row">
                                          <div class="col-12">
                                            <h5>Add Unit</h5>
                                          </div>
                                          <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="text" class="border-primary" placeholder="Unit Name"
                                              required="" id="AddunitName">
                                          </div>
                                          <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <select class="form-select border-primary"
                                              aria-label="Default select example" id="AddunitGrade">
                                              <option value="12" selected>Grade :- 12</option>
                                              <option value="13">Grade :- 13</option>
                                            </select>
                                          </div>
                                          <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <input type="text" class="border-primary" placeholder="Unit Text"
                                              required="" id="AddunitText">
                                            <button class="theme-btn btn-style-three" onclick="addNewUnit();">Add Unit<i
                                                class="fa fa-angle-right"></i></button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                  </div>

                                </div>

                              </div>
                            </div>
                          </div>
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

    const selectedUnit = () => {
      let selectedSubjectId = $('#gotSelectedSubject').val();
      $.ajax({
        url: './getVideoData.admin.php',
        type: 'POST',
        data: { subjectId: selectedSubjectId },
        success: function (response) {
          // Populate the second select tab with the fetched units
          $('#loadVideoData').html(response);
        },
        error: function (xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    };

    function openVideoLink() {
      let selectedOption = $('#loadVideoData option:selected');
      let videoLink = selectedOption.attr('data-videoLink');

      // Set the video source and load the video player
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
        xhr: function () {
          let xhr = new XMLHttpRequest();
          xhr.upload.addEventListener('progress', function (event) {
            if (event.lengthComputable) {
              let progress = Math.round((event.loaded / event.total) * 100);
              $('.progress-bar').width(progress + '%').text(progress + '%');
            }
          });
          return xhr;
        },
        success: function (response) {
          swal.fire(response);
          window.location.reload();
        },
        error: function (xhr, status, error) {
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
          success: function (data) {

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
          success: function (data) {

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
        success: function (data) {
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
        success: function (response) {

          var suggestions = JSON.parse(response);
          var suggestionsElement = document.getElementById("mobileSuggestions");

          suggestionsElement.innerHTML = "";

          suggestions.forEach(function (suggestion) {
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