<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Neel ICT | Homepage</title>
    <!-- Stylesheets -->
    <?php
    include_once "./components/responsive.component.php";
    include_once "./components/head.component.php";
    ?>

</head>

<body>
    <?php
    include_once "./components/preloader.component.php";
    ?>
    <div class="page-wrapper">
        <!-- Preloader -->
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
        <!-- Banner Section -->
        <section class="banner-section">
            <div class="pattern-layer" style="background-image: url(./assets/images/background/1.png)"></div>
            <div class="auto-container">
                <!-- Content Boxed -->
                <?php
                include_once "./layout/index/content-boxed.layout.php";
                ?>
                <!-- Image Boxed -->
                <?php
                include_once "./layout/index/image-box.layout.php";
                ?>
                <!-- Search Boxed -->
                <?php
                include_once "./layout/index/search-box.layout.php";
                ?>
            </div>
        </section>
        <!-- End Banner Section -->
        <!-- Education Section -->
        <?php
        include_once "./layout/index/Education.layout.php";
        ?>
        <!-- End Education Section -->
        <!-- Courses Section -->
        <section class="courses-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <?php
                    include_once "./layout/index/course.layout.php";
                    ?>

                </div>
            </div>
        </section>
        <!-- End Courses Section -->

        <!-- Video Section -->
        <?php
        include_once "./layout/index/video-Section.layout.php";
        ?>
        <!-- End Video Section -->

        <!-- Achievement Section -->
        <section class="achievements-section">
            <div class="auto-container">
                <!-- Sec Title -->
                <!-- Fact Counter -->
                <?php
                include_once "./layout/index/fact-counter.layout.php";
                ?>

            </div>
        </section>
        <!-- End Achievement Section -->

        <!-- Fluid Section One -->
        <section class="fluid-section-one">
            <div class="patern-layer-one paroller" data-paroller-factor="0.60" data-paroller-factor-lg="0.20" data-paroller-type="foreground" data-paroller-direction="vertical" style="background-image: url(./assets/images/icons/icon-1.png)"></div>
            <div class="outer-container clearfix">

                <!-- Image Column -->
                <div class="image-column" style="background-image:url(./assets/images/resource/image-1.jpg)">
                    <figure class="image-box"><img src="./assets/images/resource/image-1.jpg" alt=""></figure>
                </div>

                <!-- Content Column -->
                <div class="content-column">
                    <div class="inner-column">

                        <div class="clearfix">
                            <div class="pull-left">
                                <h2> events</h2>
                            </div>
                        </div>

                        <!-- Blocks Outer -->
                        <?php
                        include_once "./layout/index/event-block.layout.php";
                        ?>
                    </div>
                </div>
            </div>

        </section>

        <!-- News Section -->
        <section class="news-section">
            <div class="auto-container">
                <div class="row clearfix">

                    <!-- Title Column -->
                    <?php
                    include_once "./layout/index/blog-post.layout.php";
                    ?>
                </div>
            </div>
        </section>
        <!-- End News Section -->

        <!-- Testimonial Section -->
        <section class="testimonial-section">
            <div class="auto-container">
                <!-- Sec Title -->
                <div class="sec-title centered">
                    <h2>Student Opinion</h2>
                </div>

                <!-- Student Box -->
                <?php
                include_once "./layout/index/student-box.layout.php";
                ?>
            </div>
        </section>
        <!-- End Testimonial Section -->
        
        <!-- Call To Action Section Two -->
        <?php
    include_once "./layout/getting-started.layout.php";
    ?>
        <!-- End Call To Action Section Two -->
    </div>
    <?php
    include_once "./layout/footer-layout.php";
    ?>

    <?php
    include_once "./components/body.component.php";
    ?>
    <script modeule src="./assets/js/slider.js">
    </script>
</body>

</html>