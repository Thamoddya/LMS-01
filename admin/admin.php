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
                <li><a href="#">Support Request</a></li>
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
                    <li data-tab="#prod-student" class="tab-btn">Student Manage</li>
                    <li data-tab="#prod-studentApprove" class="tab-btn">Student Approve</li>
                    <li data-tab="#prod-batch" class="tab-btn">batch Manage</li>
                    <li data-tab="#prod-manage" class="tab-btn">Subject manage</li>
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

                            <div class="mt-1 mt-md-0 col-md-4 h-25 offset-md-1 d-flex justify-content-center align-items-center bg-secondary rounded-2 p-4 mb-3 mr-3">
                              <h5 class="text-white">Total Students : 500</h5>
                            </div>
                            <div class="mt-1 mt-md-0 col-md-4 h-25 offset-md-2 d-flex justify-content-center align-items-center bg-secondary rounded-2 p-4 mb-3 mr-3">
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
                                    <input type="number" class="form-control" id="studentMobile" aria-labelledby="passwordHelpInline" oninput="getMobileSuggestions()" list="mobileSuggestions">
                                    <datalist id="mobileSuggestions"></datalist> <!-- Add this datalist element -->
                                  </div>
                                  <div class="col-auto">
                                    <button type="button" class="btn btn-primary" onclick="gotoStudentProfile($('#studentMobile').val());">Profile</button>
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
                            </div>
                          </div>

                          <!-- Title Box -->

                          <!-- Profile Form -->
                          <div class="profile-form">

                            <!-- Profile Form -->

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
    function getMobileSuggestions() {
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
      window.location.href=`./studentProfile.php?Studentmobile=${mobile}`;
    }
  </script>
</body>

</html>