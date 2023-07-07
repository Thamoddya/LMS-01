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
                    <?php echo  $student['firstName'] . " " . $student['lastName']; ?>
                  </a>
                </li>
                <li>
                  <span>Batch :- </span><a href="mailto:n3neel@gmail.com">
                    <?php echo  $student['batchName']; ?>
                  </a>
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
                <img src="./student.assets/images/programmer.png" alt="" />
              </div>
              <h4>
                <?php echo  $student['firstName'] . " " . $student['lastName']; ?>
              </h4>
              <div class="text">
                <?php echo  $student['batchName']; ?>
              </div>
              <div class="text">
                <?php
                if ($student['grade'] == '12') {
                  echo "1<sup>st</sup> Year";
                } else {
                  echo "2<sup>nd</sup> Year";
                }
                ?>
              </div>
              <div class="text">
                <?php
                echo "Grade:- " . $student['grade'];
                ?>
              </div>
              <div class="text">
                <?php
                echo $student['mobile'];
                ?>
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
                            <div>
                              <div class="row clearfix">

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                  <input type="text" placeholder="First Name" required="" id="firstName" value="<?php echo $student['firstName'] ?>" oninput="changeBorderColor(this)">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                  <input type="text" placeholder="Last Name" required="" id="lastName" value="<?php echo $student['lastName'] ?>" oninput="changeBorderColor(this)">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                  <input type="email" placeholder="Email" required="" id="email" value="<?php echo $student['email'] ?>" oninput="changeBorderColor(this)">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                  <input type="text" disabled placeholder="Phone" required="" id="mobile" value="<?php echo $student['mobile'] ?>">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                  <input type="text" placeholder="Address" required="" id="address" value="<?php echo $student['adress'] ?>" oninput="changeBorderColor(this)">
                                </div>

                                <!-- <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                  <input type="password" placeholder="Old Password" id="Oldpassword" required="" value="" oninput="changeBorderColor(this)">
                                  <button type="button" id="showPasswordBtn">Show Password</button>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                  <input type="password" placeholder="New Password" id="newpassword" required="" value="" oninput="changeBorderColor(this)">
                                  <button type="button" id="showPasswordBtn">Show Password</button>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                  <input type="password" placeholder="Confirm New Password" id="comfirmnewpassword" required="" value="" oninput="changeBorderColor(this)">
                                  <button type="button" id="showPasswordBtn">Show Password</button>
                                </div> -->

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group text-right">
                                  <button class="theme-btn btn-style-three" id="updateButton"><span class="txt">Update
                                      Details<i class="fa fa-angle-right"></i></span></button>
                                  <button class="theme-btn btn-style-six" class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"><span class="txt">Update Password<i class="fa fa-angle-right"></i></span></button>
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

  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Update Password</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Old Password</label>
        <input type="password" class="form-control" id="Oldpassword">
        <button type="button" class="showPasswordBtn" data-target="#Oldpassword">Show Password</button>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">New Password</label>
        <input type="password" class="form-control" id="newPassword">
        <button type="button" class="showPasswordBtn" data-target="#newPassword">Show Password</button>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirmPassword">
        <button type="button" class="showPasswordBtn" data-target="#confirmPassword">Show Password</button>
      </div>

      <button class="theme-btn btn-style-three" onclick="passwordUpdate();"><span class="txt">Update Password<i class="fa fa-angle-right"></i></span></button>
    </div>
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
  <script>
    $(document).ready(function() {
      $(".showPasswordBtn").click(function() {
        var target = $(this).data("target");
        var passwordInput = $(target);
        var passwordFieldType = passwordInput.attr("type");

        // Toggle the password field visibility
        if (passwordFieldType === "password") {
          passwordInput.attr("type", "text");
          $(this).text("Hide Password");
        } else {
          passwordInput.attr("type", "password");
          $(this).text("Show Password");
        }
      });

      $("#updateButton").click(function() {
        var formData = new FormData();
        formData.append("firstName", $("#firstName").val());
        formData.append("lastName", $("#lastName").val());
        formData.append("email", $("#email").val());
        formData.append("address", $("#address").val());

        $.ajax({
          type: 'POST',
          url: './updateAccount.student.php',
          data: formData,
          contentType: false,
          processData: false,
          success: function(response) {
            if (response == 'success') {
              window.location.href = './logout.student.php';
            } else {
              Swal.fire(
                'Account Details',
                'Please try Changing your data or Try again',
                'question'
              );
            }
          }
        });
      });
    });

    const passwordUpdate = () => {
      let Oldpassword = "<?php echo $student['password'] ?>";
      let typeOldpassword = $("#Oldpassword").val();
      let newPassword = $("#newPassword").val();
      let confirmPassword = $("#confirmPassword").val();

      if (Oldpassword !== typeOldpassword) {
        swal.fire(
          'Password',
          'You entered the incorrect old password',
          'question'
        );
      } else if (newPassword !== confirmPassword) {
        swal.fire(
          'Password',
          'Your new passwords do not match',
          'question'
        );
      }else if (newPassword == "" || confirmPassword == "") {
        swal.fire(
          'Password',
          'Fill the all feilds',
          'question'
        );
      }else {
        const passwordData = new FormData();
        passwordData.append("newPassword", newPassword);

        $.ajax({
          type: 'POST',
          url: 'updatePassword.student.php',
          data: passwordData,
          contentType: false,
          processData: false,
          success: function(response) {
            if (response === 'success') {
              window.location.href = './logout.student.php';
            } else {
              Swal.fire(
                'Account Details',
                'Password Changing Error , Please try again Later',
                'question'
              );
            }
          }
        });
      }
    };
  </script>
</body>

</html>