<?php
session_start();

if ($_SESSION['admin'] == null) {
    header('Location: ../adminLogin.php');
} else {
    $admin = $_SESSION['admin'];
}
include_once "../connection.php";
$StudentMobile = $_GET['Studentmobile'];

$stmt = $pdo->prepare("SELECT * FROM student INNER JOIN batch ON  student.batch_batchId = batch.batchId WHERE mobile = ? ");
$stmt->execute([$StudentMobile]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

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
                                <img src="../student/student.assets/images/programmer.png" alt="" />
                            </div>
                            <h4>
                                <?php echo $student['firstName'] . " " . $student['lastName'] ?>
                            </h4>
                            <div class="text">
                                <?php echo "Student No - " . $student['id'] ?>
                            </div>
                            <div class="text">
                                <?php echo "Batch Name:- " . $student['batchName'] ?>
                            </div>
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
                                    </ul>

                                    <!--Tabs Container-->
                                    <div class="tabs-content">

                                        <!--Tab / Active Tab-->
                                        <div class="tab active-tab" id="prod-overview">
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
                                                                    <input type="text" placeholder="Phone" required="" id="mobile" value="<?php echo $student['mobile'] ?>">
                                                                </div>

                                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                                    <input type="text" placeholder="Address" required="" id="address" value="<?php echo $student['adress'] ?>" oninput="changeBorderColor(this)">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                                    <input type="text" placeholder="Address" required="" value="<?php echo $student['password'] ?>" oninput="changeBorderColor(this)">
                                                                </div>

                                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group text-right">
                                                                    <?php
                                                                    if ($student['verifyed'] == '0') {

                                                                    ?>
                                                                        <button class="theme-btn btn-style-three"><span class="txt">Approve Student<i class="fa fa-angle-right"></i></span></button>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <button disabled class="theme-btn btn-style-three"><span class="txt">Student Approved</span></button>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    <button class="theme-btn btn-style-three" id="updateButton"><span class="txt">Update Mobile<i class="fa fa-angle-right"></i></span></button>
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
                <input type="password" class="form-control" id="Oldpassword" value="<?php $student['password'] ?>">
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


    <?php
    include_once "./adminComponents/body.admin.php";
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
                let studentNo = "<?php echo $student['id'] ?>";
                var formData = new FormData();
                formData.append("mobile", $("#mobile").val());
                formData.append("studentNo", studentNo);

                $.ajax({
                    type: 'POST',
                    url: '',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        if (response == 'success') {
                            swal.fire(
                                'Student Account',
                                'Student Mobile has been updated successfully',
                                'succeess'
                            );
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
            } else if (newPassword == "" || confirmPassword == "") {
                swal.fire(
                    'Password',
                    'Fill the all feilds',
                    'question'
                );
            } else {
                const passwordData = new FormData();
                passwordData.append("newPassword", newPassword);

                $.ajax({
                    type: 'POST',
                    url: '../student/updatePassword.student.php',
                    data: passwordData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response === 'success') {
                            swal.fire(
                                'Student Password',
                                'Student Password has been updated successfully',
                                'succeess'
                            );
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