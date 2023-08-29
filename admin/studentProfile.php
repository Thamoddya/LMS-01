<?php
session_start();

if ($_SESSION['admin'] == null) {
    header('Location: ../adminLogin.php');
} else {
    $admin = $_SESSION['admin'];
}
include_once "../connection.php";
if ($_GET['Studentmobile'] == null) {
    header('Location: ./admin.php');
}

$StudentMobile = $_GET['Studentmobile'];

if (strlen($StudentMobile) == 10) {
} else {
    header('Location: ./admin.php');
}

$stmt = $pdo->prepare("SELECT * FROM student INNER JOIN batch ON  student.batch_batchId = batch.batchId WHERE mobile = ? ");
$stmt->execute([$StudentMobile]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);
if($student==null){
    header('Location: ./admin.php');
}

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
                                <?php
                                if ($student['batchName'] == null) {
                                    echo "Batch Name:- null";
                                } else {
                                    echo "Batch Name:- " . $student['batchName'];
                                }
                                ?>
                            </div>
                            <div class="text text-primary">
                                <?php
                                if ($student['verifyed'] == '0') {
                                    echo "Student Not Approved";
                                } else {
                                    echo "Student Approved";
                                }
                                ?>
                            </div>
                            <div class="text text-primary">
                                <button class="btn btn-danger" onclick="deleteStudentAccount();">Delete Student Account</button>
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
                                                                    <input type="text" placeholder="Old Password" required="" id="Oldpassword" value="<?php echo $student['password'] ?>">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                                    <input type="text" placeholder="New Password" required="" id="newPassword">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                                    <input type="text" placeholder="Comfirm Password" required="" id="confirmPassword">
                                                                </div>


                                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                                    <select class="form-select" aria-label="Default select example" id="newBatch">
                                                                        <option selected>Select New Batch</option>

                                                                        <?php

                                                                        $batchNamesForSelectGet = $pdo->prepare("SELECT * FROM batch INNER JOIN city ON city.cityId = batch.city_cityId  WHERE batchId<>'".$student['batch_batchId']."' AND batchStatus= '1'");
                                                                        $batchNamesForSelectGet->execute();

                                                                        while ($batchNamesForSelectGetRow = $batchNamesForSelectGet->fetch(PDO::FETCH_ASSOC)) {
                                                                        ?>
                                                                            <option value="<?php echo $batchNamesForSelectGetRow['batchId'] ?>">
                                                                                <?php echo $batchNamesForSelectGetRow['batchName'] . " | " . $batchNamesForSelectGetRow['cityName'] . " | " . $batchNamesForSelectGetRow['grade'] ?>
                                                                            </option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <button onclick="batchAssign();" class="btn btn-primary mt-1">Assign batch To
                                                                        Student</button>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group text-right">
                                                                    <?php
                                                                    if ($student['verifyed'] == '0') {

                                                                    ?>
                                                                        <button class="theme-btn btn-style-three" onclick="approveStudent();"><span class="txt">Approve Student<i class="fa fa-angle-right"></i></span></button>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <button onclick="disapproveStudent();" class="theme-btn btn-style-three"><span class="txt">Disapprove Student<i class="fa fa-cross-icon"></span></button>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    <button class="theme-btn btn-style-three" id="updateButton" onclick="updateMObile();"><span class="txt">Update Mobile<i class="fa fa-angle-right"></i></span></button>
                                                                    <button class="theme-btn btn-style-three" onclick="passwordUpdate();">Update Password<i class="fa fa-angle-right"></i></span></button>
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
        const deleteStudentAccount = () => {
            Swal.fire({
                title: 'Comfirm  To Delete Student Account?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Save',
                denyButtonText: `Cancel Delete`,
            }).then((result) => {
                if (result.isConfirmed) {

                    let studentMobile = "<?php echo  $StudentMobile ?>";

                    var formData = new FormData();
                    formData.append('mobile', studentMobile);

                    $.ajax({
                        url: './deleteStudent.admin.php',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            console.log(response);
                            if (response == 'success') {
                                swal.fire(
                                    'Success',
                                    'Student Deleted successfully',
                                    'success'
                                );
                                window.location.href='./admin.php';
                            } else {
                                swal.fire(
                                    'Error',
                                    'Something went wrong',
                                    'error'
                                );
                            }
                        }
                    });

                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        }

        const approveStudent = () => {
            let Mobile = "<?php echo $student['mobile'] ?>";

            var formData = new FormData();
            formData.append('mobile', Mobile);
            $.ajax({
                url: './approveStudent.admin.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response == 'success') {
                        swal.fire(
                            'Success',
                            'Student Approved',
                            'success'
                        );
                        window.location.reload();
                    } else {
                        swal.fire(
                            'Error',
                            'Something went wrong',
                            'error'
                        );
                    }
                }
            });
        };
        const disapproveStudent = () => {
            let Mobile = "<?php echo $student['mobile'] ?>";

            var formData = new FormData();
            formData.append('mobile', Mobile);
            $.ajax({
                url: './disapproveSTudent.admin.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response == 'success') {
                        swal.fire(
                            'Success',
                            'Student Disapproved',
                            'success'
                        );
                        window.location.reload();
                    } else {
                        swal.fire(
                            'Error',
                            'Something went wrong',
                            'error'
                        );
                    }
                }
            });
        };
        const batchAssign = () => {
            const batchId = document.getElementById('newBatch').value;
            let Mobile = "<?php echo $student['mobile'] ?>";
            let nowBatchID = "<?php echo $student['batch_batchId'] ?>";

            if (nowBatchID == batchId) {
                swal.fire("You are already assigned to this batch");

            } else {

                if (batchId == 'Select New Batch') {
                    swal.fire(
                        'Error',
                        'Please Select New Batch',
                        'error'
                    );
                } else {
                    var formData = new FormData();
                    formData.append('batchId', batchId);
                    formData.append('mobile', Mobile);

                    $.ajax({
                        url: './addBatch.student.php',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response == 'success') {
                                swal.fire(
                                    'Success',
                                    'Batch Assigned',
                                    'success'
                                );
                                window.location.reload();
                            } else {
                                swal.fire(
                                    'Error',
                                    'Something went wrong',
                                    'error'
                                );
                            }
                        }
                    });
                }
            }
        }
        const updateMObile = () => {
            let studentNo = "<?php echo $student['id'] ?>";
            let oldMobile = "<?php echo $student['mobile'] ?>";
            let newMobile = $("#mobile").val();

            var formData = new FormData();
            formData.append("mobile", newMobile);
            formData.append("studentNo", studentNo);

            if (oldMobile == newMobile) {
                swal.fire(
                    'Student Account',
                    'mobiles are same',
                    'question'
                );
            } else {
                $.ajax({
                    type: 'POST',
                    url: './studentUpdate.mobile.php',
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
                            window.location.href = './admin.php';
                        } else {
                            Swal.fire(
                                'Account Details',
                                'Please try Changing your data or Try again',
                                'question'
                            );
                        }
                    }
                });
            }

        };


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
                let Mobile = "<?php echo $student['mobile'] ?>";
                const passwordData = new FormData();
                passwordData.append("newPassword", newPassword);
                passwordData.append("mobile", Mobile);

                $.ajax({
                    type: 'POST',
                    url: './updatepassword.student.php',
                    data: passwordData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        if (response === 'success') {
                            swal.fire(
                                'Student Password',
                                'Student Password has been updated successfully',
                                'succeess'
                            );
                            window.location.reload();
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