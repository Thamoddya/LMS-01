<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>NEEL ICT | Profile</title>
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
					NEEL ICT | PROFILE
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

		<!-- Profile Section -->
		<section class="profile-section">
			<div class="patern-layer-one paroller" data-paroller-factor="0.40" data-paroller-factor-lg="0.20" data-paroller-type="foreground" data-paroller-direction="vertical" style="background-image: url(images/icons/icon-1.png)"></div>
			<div class="patern-layer-two paroller" data-paroller-factor="0.40" data-paroller-factor-lg="-0.20" data-paroller-type="foreground" data-paroller-direction="vertical" style="background-image: url(images/icons/icon-2.png)"></div>
			<div class="circle-one"></div>
			<div class="circle-two"></div>
			<div class="auto-container">

				<div class="row clearfix">

					<!-- Content Section -->
					<div class="content-column col-lg-7 col-md-12 col-sm-12">
						<div class="inner-column">
							<h2>Neel Prasanna</h2>
							<h4>Advanced Level ICT Lecturer</h4>
							<!-- Student List -->
							<ul class="student-list">
								<li>5000+ Total Students</li>
							</ul>
							<h5>About Me</h5>
							<p>Great teachers do it all. Across all ages, languages, ethnicities, and subjects,teachers are some of the most widely skilled people around in order to be successful. A day in the life of a teacher can vary greatly depending on the subject and grade level in which they teach. A teacher is a person who helps others to acquire knowledge, competences or values. Informally the role of teacher may be taken on by anyone.</p>
							<p>I'm an engineering graduate at Software Engineering of Chamber of Chartered Java Professionals Int USA. I am enthusiastic to learn new technologies.I have experiences in both web and mobile applications.I am a quick problem solver also currently working as a Software Engineer at Java Institute .</p>
						</div>
					</div>

					<!-- Image Section -->
					<div class="image-column col-lg-5 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="image">
								<img src="./assets/images/resource/image-1.jpg" alt="" />
							</div>
							<h3>Neel Prasanna</h3>
							<div class="text">Advanced Level ICT Lecturer <br> & Software Engineer </div>
							<div class="social-box">
								<a href="#" class="fa fa-facebook-square"></a>
								<a href="#" class="fa fa-twitter-square"></a>
								<a href="#" class="fa fa-linkedin-square"></a>
								<a href="#" class="fa fa-github"></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Browse Course Section -->
		</section>
		<!-- End Profile Section -->

		<?php
		include_once "./layout/getting-started.layout.php";
		?>
		<!-- End Call To Action Section Two -->
		<!--Main Footer-->
		<?php
		include_once "./layout/footer-layout.php";
		?>
		<!-- End Call To Action Section Two -->

		<!--Main Footer-->
		
	</div>
	<!--End pagewrapper-->
	<?php
	include_once "./components/body.component.php";
	?>

</body>

</html>