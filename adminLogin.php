<?php
session_start();
if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
    header('Location: ./admin/admin.php');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>NEEL ICT | Admin Login</title>
    <!-- Stylesheets -->
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
                    Admin Login
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

        <!-- Login Section -->
        <section class="login-section">
            <div class="auto-container">
                <div class="login-box">

                    <!-- Title Box -->
                    <div class="title-box">
                        <h2>Login</h2>
                        <div class="text"><span class="theme_color">Welcome!</span> Please confirm your Email and password</div>
                    </div>

                    <!-- Login Form -->
                    <div class="styled-form">
                        <div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="email" name="username" placeholder="User Name" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <span class="eye-icon flaticon-eye"></span>
                                <input type="password" id="password" name="password" value="" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <div class="check-box">
                                            <input type="checkbox" name="remember-password" id="type-1">
                                            <label for="type-1">Remember Login</label>
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="forgot">Forget Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button onclick="login();" type="button" class="theme-btn btn-style-three"><span class="txt">Login <i class="fa fa-angle-right"></i></span></button>
                            </div>
                            <div class="form-group">
                                <div class="users">New User? <a href="register.php">Sign Up</a></div>

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
        <?php
        include_once "./layout/footer-layout.php";
        ?>

        <?php
        include_once "./components/body.component.php";
        ?>

        <script>
            const login = () => {
                let adminEmail = $('#email').val();
                let adminPassword = $('#password').val();

                let adminData = new FormData();
                adminData.append('email', adminEmail);
                adminData.append('password', adminPassword);

                if (!adminEmail == "") {
                    if (!adminPassword !== "") {
                        $.ajax({
                            type: "POST",
                            url: "./validation/adminLogin.validate.php",
                            data: adminData,
                            processData: false,
                            contentType: false,
                            success: function(response) {

                                let responseData = JSON.parse(response);
                                if (responseData.status == 'success') {

                                    Swal.fire(
                                        'Admin Login',
                                        'You Logged In Successfully',
                                        'success', {
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            confirmButtonText: 'Go To Admin Portal',
                                        }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "./admin/admin.php";
                                        }
                                    })
                                } else {
                                    Swal.fire(
                                        'Admin Login',
                                        'You Entered credentials incorrect',
                                        'error'
                                    );
                                }
                            }
                        });
                    } else {
                        Swal.fire(
                            'The Password ?',
                            'Enter Your Password',
                            'question'
                        );
                    }
                } else {
                    Swal.fire(
                        'The Email',
                        'Enter Your Email',
                        'question'
                    );
                }
            };
        </script>

</body>

</html>