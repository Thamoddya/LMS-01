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
                          <div class="col-12">
                            <h6>Select Month</h6>
                            <select class="form-select" id="getbatchGrade">
                              <option selected value="12">January</option>
                              <option value="12">February</option>
                              <option value="12">March</option>
                            </select>
                            <div class="input-group mb-1 mt-2">
                              <span class="input-group-text" id="basic-addon1">Student Mobile</span>
                              <input type="text" class="form-control" placeholder="Student Mobile" aria-describedby="basic-addon1">
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                    <div class="tab" id="prod-batch">
                      <div class="content">

                        <div class="row clearfix">
                          <div class="col-12 mt-1">
                            <div class="row">
                              <div class="col-12 mt-1">
                                <h4>Register a Batch</h4>
                              </div>
                              <div class="col-12 mt-2">
                                <div class="input-group ">
                                  <span class="input-group-text" id="basic-addon1">Batch Name</span>
                                  <input type="text" id="getBatchName" class="form-control" placeholder="batch Name" aria-label="batch Name" aria-describedby="basic-addon1">
                                </div>
                              </div>
                              <div class="col-12 mt-2">
                                <select class="form-select" id="getbatchGrade">
                                  <option selected value="12">Greade 12</option>
                                  <option selected value="13">Greade 13</option>
                                </select>
                              </div>


                              <div class="col-12 mt-2">
                                <select class="form-select" id="getbatchCityId">
                                  <option selected value="null">Select City For Batch</option>
                                  <?php
                                  $getCityData = $pdo->prepare('SELECT * FROM city');
                                  $getCityData->execute();
                                  while ($CityData = $getCityData->fetch(PDO::FETCH_ASSOC)) {
                                  ?>
                                    <option value="<?php echo $CityData['cityId']; ?> ">
                                      <?php echo $CityData['cityName']; ?>
                                    </option>
                                  <?php
                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="col-12 mt-2">
                                <button class="btn btn-primary" onclick="addNewBatch();">ADD BATCH</button>
                              </div>


                            </div>
                          </div>

                          <div class="col-12 mt-1">
                            <h4>Registed Batch</h4>
                          </div>
                          <div class="col-12">
                            <div class="row">

                              <div class="col-12">
                                <select class="form-select" id="getLoadedBatch">
                                  <option selected>Select Batch</option>
                                  <?php
                                  $getBatchData = $pdo->prepare('SELECT * FROM batch where batchStatus = ? ');
                                  $getBatchData->execute(['1']);
                                  while ($rowOfBatchData = $getBatchData->fetch(PDO::FETCH_ASSOC)) {
                                  ?>
                                    <option value="<?php echo $rowOfBatchData['batchId']; ?>">
                                      <?php echo $rowOfBatchData['batchName']; ?>
                                    </option>
                                  <?php
                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="col-12 mt-2">
                                <button class="btn btn-primary" onclick="checkStudents();">Check Students</button>
                                <button class="btn btn-danger" onclick="turnOffbatch();">Turn Off</button>
                              </div>
                              <div class="col-12 mt-3">
                                <table class="table rounded rounded-3">

                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Mobile</th>
                                      <th scope="col">First Name</th>
                                      <th scope="col">Last Name</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Batch Name</th>
                                      <th scope="col">Visit</th>
                                    </tr>
                                  </thead>
                                  <tbody id="table-body" class="table-group-divider overflow-auto">

                                  </tbody>
                                </table>

                              </div>
                            </div>
                          </div>

                          <div class="col-12 mt-1">
                            <h4>Down Batch</h4>
                          </div>
                          <div class="col-12">
                            <div class="row">

                              <div class="col-12">
                                <select class="form-select" id="getOffBatch">
                                  <option selected>Select Batch</option>
                                  <?php
                                  $getBatchData = $pdo->prepare('SELECT * FROM batch where batchStatus = ? ');
                                  $getBatchData->execute(['0']);
                                  while ($rowOfBatchData = $getBatchData->fetch(PDO::FETCH_ASSOC)) {
                                  ?>
                                    <option value="<?php echo $rowOfBatchData['batchId']; ?>">
                                      <?php echo $rowOfBatchData['batchName']; ?>
                                    </option>
                                  <?php
                                  }
                                  ?>
                                </select>
                              </div>

                              <div class="col-12 mt-2">
                                <button class="btn btn-success" onclick="turnOnBatch();">Turn On</button>
                              </div>
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




    const checkStudents = () => {
      const batchID = $('#getLoadedBatch').val();


      $.ajax({
        url: './admin.layouts/checkStudents.table.php',
        type: 'POST',
        data: {
          batchID: batchID
        },
        success: function(response) {
          const students = JSON.parse(response);

          $('#table-body').empty();

          students.forEach((student, index) => {
            const row = `<tr>
                      <th scope="row">${index + 1}</th>
                      <td>${student.mobile}</td>
                      <td>${student.firstName}</td>
                      <td>${student.lastName}</td>
                      <td>${student.email}</td>
                      <td>${student.statusName}</td>
                      <td>${student.batchName}</td>
                      <td><button type="button" class="admin-button-1" onclick="gotoStudentProfile('${student.mobile}');">Go Profile</button></td>
                    </tr>`;
            $('#table-body').append(row);
          });
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    };
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success m-1',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    });


    const turnOnBatch = () => {
      let batchID = $('#getOffBatch').val();

      let formData = new FormData();
      formData.append('batchID', batchID);

      $.ajax({
        url: './turnOnBatch.admin.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          if (response == 'success') {
            swalWithBootstrapButtons.fire(
              'ON!',
              'The Batch has been Turned ON.',
              'success'
            )
            window.location.reload();
          };
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    };

    const turnOffbatch = () => {
      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "This will affect to Students in batch, They can't Log to Portal when batch Turn Off & can't assign students to that batch More...",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Turn Off!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {

          let batchID = $('#getLoadedBatch').val();

          let formData = new FormData();
          formData.append('batchID', batchID);

          $.ajax({
            url: './batchOFF.admin.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
              console.log(response);
              if (response == 'success') {
                swalWithBootstrapButtons.fire(
                  'OFF!',
                  'The Batch has been Turned Off.',
                  'success'
                )
                window.location.reload();
              };
            },
            error: function(xhr, status, error) {
              console.log(xhr.responseText);
            }
          });
        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'The batch is safe :)',
            'error'
          )
        }
      })
    };

    const addNewBatch = () => {
      let name = $('#getBatchName').val();
      let city = $('#getbatchCityId').val();
      let grade = $('#getbatchGrade').val();

      if (name == '' || city == null) {
        swal.fire('Please Complete all data');
      } else {

        let formData = new FormData();
        formData.append('name', name);
        formData.append('city', city);
        formData.append('grade', grade);

        Swal.fire({
          title: 'Comfirm To Add Batch?',
          showDenyButton: true,
          showCancelButton: false,
          confirmButtonText: 'Save',
          denyButtonText: `Cancel Process`,
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: './addNewBatch.admin.php',
              type: 'POST',
              data: formData,
              contentType: false,
              processData: false,
              success: function(response) {
                if (response == 'success') {
                  Swal.fire({
                    icon: 'success',
                    title: 'BATCH REGISTRATION',
                    text: 'Batch added successfully',
                  });
                } else {
                  console.log(response);
                }
              },
              error: function(xhr, status, error) {
                console.log(xhr.responseText);
              }
            });
          } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
          }
        })
      }
    }

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
          $('#loadPrivateVideoDataVithVideo').html(response);
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    };
    selectPrivateVideo();
    setnotSetVideoData();

    const openVideoLink = () => {
  let selectedOption = $('#loadVideoData option:selected');
  let videoLink = selectedOption.attr('data-videoLink');
  let videoTYLink = selectedOption.attr('data-videoYtLink');

  if (videoLink == "null") {
    // If videoLink is null, play the YouTube video using videoTYLink
    $('#videoSource').attr('src', ''); // Clear the videoSource
    videojs('UnitVideoLink').reset(); // Reset the videojs player

    // Set the src attribute of the iframe to the YouTube video link
    $('#ytVideoFrame').attr('src', `https://www.youtube.com/embed/${videoTYLink}`);
    $('#ytVideoFrame').show(); // Show the iframe if it was hidden before

  } else {
    $('#ytVideoFrame').hide(); // Hide the YouTube iframe
    $('#videoSource').attr('src', videoLink);
    videojs('UnitVideoLink').src(videoLink);
    videojs('UnitVideoLink').load();
    videojs('UnitVideoLink').play();
  }
}



    const uploadVdieoLink = () => {
      let videoType = $('#videoType').val();
      let videoUnit = $('#videoUnit').val();
      let VideoLink = $('#uploadVideoYtLink').val();

      if (!videoUnit || !videoType || !VideoLink) {
        swal.fire("Please select video unit, video privacy, and choose a video Link.");
        return;
      }

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
    };
  </script>

</body>

</html>