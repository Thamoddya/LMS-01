<?php
session_start();

if ($_SESSION['student'] == null) {
  header('Location: ../login.php');
} else {
  $student = $_SESSION['student'];
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
  include_once "./studentComponents/header.student.php";
  include_once "./studentComponents/responsive.student.php";
  ?>
</head>

<body class="">
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
                  <span>Name :-</span><a href="tel:071 523 8348"> <?php echo  $student['firstName'] . " " . $student['lastName']; ?></a>
                </li>
                <li>
                  <span>Batch :- </span><a href="mailto:n3neel@gmail.com"> <?php echo  $student['batchName']; ?></a>
                </li>
                <li>
                  <span>Year :- </span><a href="mailto:n3neel@gmail.com">
                    <?php
                    if ($student['grade'] == '12') {
                      echo "1<sup>st</sup>";
                    } else {
                      echo "2<sup>nd</sup>";
                    }
                    ?>
                  </a>
                </li>
              </ul>
            </div>
            <!-- Top Right -->
            <div class="top-right pull-right clearfix">
              <!-- Login Nav -->
              <ul class="login-nav">
                <li><a href="login.php">Logout</a></li>
                <li><a href="register.php">Profile</a></li>
                <li><a href="register.php">Youtube</a></li>
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
                <img src="./student.assets/images/programmer.png" alt="" />
              </div>
              <h4><?php echo  $student['firstName'] . " " . $student['lastName']; ?></h4>
              <div class="text"> <?php echo  $student['batchName']; ?></div>
              <div class="text">
                <?php
                if ($student['grade'] == '12') {
                  echo "1<sup>st</sup> Year";
                } else {
                  echo "2<sup>nd</sup> Year";
                }
                ?>
              </div>

              <ul class="student-editing">
                <li><a href="#">Edit Account</a></li>
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
                    <li data-tab="#prod-overview" class="tab-btn active-btn">Title</li>
                    <li data-tab="#prod-billing" class="tab-btn">Billing</li>
                    <li data-tab="#prod-setting" class="tab-btn">Account Settings</li>
                  </ul>

                  <!--Tabs Container-->
                  <div class="tabs-content">

                    <!--Tab / Active Tab-->
                    <div class="tab active-tab" id="prod-overview">
                      <div class="content">
                        <!-- Sec Title -->
                        <div class="sec-title">
                          <h2>Video Title</h2>
                        </div>
                        <div class="row clearfix">

                          <?php
                          include_once "./videoTitle.php";
                          ?>

                        </div>

                      </div>
                    </div>

                    <!-- Tab -->

                    <!-- Tab -->
                    <div class="tab" id="prod-billing">
                      <div class="content">

                        <div class="row clearfix">



                        </div>

                      </div>
                    </div>

                    <!-- Tab -->
                    <div class="tab" id="prod-setting">
                      <div class="content">

                        <div class="content">

                          <!-- Title Box -->
                          <div class="title-box">
                            <h5>Edit Account Details</h5>
                          </div>

                          <!-- Profile Form -->
                          <div class="profile-form">

                            <!-- Profile Form -->
                            <form method="post" action="blog.html">
                              <div class="row clearfix">

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                  <input type="text" placeholder="First Name" required="" value="<?php echo $student['firstName'] ?>">

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                  <input type="text" placeholder="Last Name" required="" value="<?php echo $student['lastName'] ?>">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                  <input type="email" placeholder="Email" required="" value="<?php echo $student['email'] ?>">

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                  <input type="text" disabled placeholder="Phone" required="" value="<?php echo $student['mobile'] ?>">

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                  <input type="text" n placeholder="Adress" required="" value="<?php echo $student['adress'] ?>">

                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group text-right">
                                  <button class="theme-btn btn-style-three" type="submit" name="submit-form"><span class="txt">Save Change <i class="fa fa-angle-right"></i></span></button>
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

  <!-- 
    <div class="container-fluid">
      <div class="row">
        <div class="col-6 mt-2">
          <video id="my-video1" class="video-js vjs-default-skin col-12" controls preload="auto" height="500" width="100%" poster="./videos/videoplayback.mp4" data-setup='{}'>
            <source src="./videos/videoplayback.mp4" type="video/mp4" />
          </video>
        </div>
        <div class="col-6 mt-2">
          <video id="my-video2" class="video-js vjs-default-skin col-12" controls preload="auto" height="500" width="100%" poster="./videos/videoplayback.mp4" data-setup='{}'>
            <source src="./videos/videoplayback.mp4" type="video/mp4" />
          </video>
        </div>
      </div>
    </div>
   -->

  <?php
  include_once "./studentComponents/body.student.php";
  ?>
</body>

</html>