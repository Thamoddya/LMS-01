<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>NEEL ICT | Register</title>
  <?php
  include_once "./components/responsive.component.php";
  include_once "./components/head.component.php";
  ?>
</head>

<body style="overflow-x: hidden;">
  <?php
  include_once "./components/preloader.component.php";
  ?>
  <div class="page-wrapper">

    <!-- Main Header-->
    <header class="main-header header-style-one">
      <!-- Header Top -->
      <?php
      include_once "./layout/headerTop.layout.php";
      ?>
      <!-- Header Upper -->
      <?php
      include_once "./layout/header-upper.layout.php";
      ?>
      <!-- End Header Upper -->
      <!-- Mobile Menu  -->
      <?php
      include_once "./layout/mobile-menu.layout.php";
      ?>
      <!-- End Mobile Menu -->
    </header>
    <!-- End Main Header -->

    <!-- Page Title -->
    <section class="page-title">
      <div class="shooting_star"></div>
      <div class="shooting_star"></div>
      <div class="shooting_star"></div>
      <div class="shooting_star"></div>
      <div class="shooting_star"></div>
      <div class="shooting_star"></div>
      <div class="shooting_star"></div>
      <div class="shooting_star"></div>
      <div class="shooting_star"></div>
      <div class="shooting_star"></div>
      <div class="shooting_star"></div>
      <div class="shooting_star"></div>
      <div class="shooting_star"></div>
      <div class="shooting_star"></div>
      <div class="shooting_star"></div>
      <div class="shooting_star"></div>
      <div class="shooting_star"></div>
      <div class="shooting_star"></div>
      <div class="shooting_star"></div>
      <div class="shooting_star"></div>

      <div id='title'>
        <span>
          Student Register
        </span>
        <br>

      </div>
      <div class="auto-container">
        <h1></h1>

        <!-- Search Boxed -->
        <?php
        include_once "./layout/index/search-box.layout.php";
        ?>

      </div>
    </section>
    <!--End Page Title-->

    <!-- Register Section -->
    <section class="register-section">
      <div class="auto-container">
        <div class="register-box">

          <!-- Title Box -->
          <div class="title-box">
            <h2>Register</h2>
            <div class="text"><span class="theme_color">Welcome!</span> Please confirm that you are visiting</div>
          </div>

          <!-- Login Form -->
          <div class="styled-form">
            <div>
              <div class="row clearfix">
                <!-- Form Group -->
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                  <label>First Name</label>
                  <input type="text" name="username" value="" placeholder="First Name" required>
                </div>

                <!-- Form Group -->
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                  <label>Last Name</label>
                  <input type="text" name="username" value="" placeholder="Last Name" required>
                </div>

                <!-- Form Group -->
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                  <label>Email Address</label>
                  <input type="email" name="email" value="" placeholder="example@gmail.com" required>
                </div>

                <!-- Form Group -->
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                  <label>Phone Number</label>
                  <input type="text" name="phone" value="" placeholder="000 000 0000" required>
                </div>

                <!-- Form Group -->
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                  <label>Password</label>
                  <span class="eye-icon flaticon-eye"></span>
                  <input type="password" name="password" value="" placeholder="Password" required>
                </div>

                <!-- Form Group -->
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                  <label>Confirm Password</label>
                  <span class="eye-icon flaticon-eye"></span>
                  <input type="password" name="password" value="" placeholder="Password" required>
                </div>

                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                  <div class="row clearfix">
                    <!-- Column -->
                    <div class="column col-lg-3 col-md-4 col-sm-12">
                      <div class="radio-box">
                        <input type="radio" name="remember-password" id="type-1">
                        <label for="type-1">Male</label>
                      </div>
                    </div>
                    <!-- Column -->
                    <div class="column col-lg-3 col-md-4 col-sm-12">
                      <div class="radio-box">
                        <input type="radio" name="remember-password" id="type-2">
                        <label for="type-2">Female</label>
                      </div>
                    </div>
                    <!-- Column -->

                    <!-- Column -->
                    <div class="column col-lg-12 col-md-12 col-sm-12">
                      <div class="check-box">
                        <input type="checkbox" name="remember-password" id="type-4">
                        <label for="type-4">I agree the user agreement and <a href="#">Terms &
                            Conditions</a></label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                  <button type="button" class="theme-btn btn-style-three"><span class="txt">Sign Up <i
                        class="fa fa-angle-right"></i></span></button>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                  <div class="users">Already have an account? <a href="login.php">Sign In</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Login Section -->

    <?php
    include_once "./layout/getting-started.layout.php";
    ?>
    <!-- End Call To Action Section Two -->

    <!--Main Footer-->
    <?php
    include_once "./layout/footer-layout.php";
    ?>

    <?php
    include_once "./components/body.component.php";
    ?>

</body>

</html>