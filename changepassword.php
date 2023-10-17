<?php
session_start();
error_reporting(0);
require_once('include/config.php');
if (strlen($_SESSION["uid"]) == 0) {
	header('location:login.php');
} else {
	// Code for change password	
	if (isset($_POST['submit'])) {
		$password = md5($_POST['password']);
		$newpassword = md5($_POST['newpassword']);
		$email = $_SESSION['email'];
		$sql = "SELECT password FROM tbluser WHERE email=:email and password=:password";
		$query = $dbh->prepare($sql);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':password', $password, PDO::PARAM_STR);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_OBJ);
		if ($query->rowCount() > 0) {
			$con = "update tbluser set password=:newpassword where email=:email";
			$chngpwd1 = $dbh->prepare($con);
			$chngpwd1->bindParam(':email', $email, PDO::PARAM_STR);
			$chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
			$chngpwd1->execute();
			$msg = "Your Password succesfully changed";
		} else {
			$error = "Your current password is not valid.";
		}
	}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>

		<title>User | Booking History</title>

		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/aos.css">

		<!-- MAIN CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css">

		<link rel="stylesheet" href="css/tooplate-gymso-style.css">
		<!--
Tooplate 2119 Gymso Fitness
https://www.tooplate.com/view/2119-gymso-fitness
-->
	</head>

	<body data-spy="scroll" data-target="#navbarNav" data-offset="50">

		<!-- MENU BAR -->
		<?php include 'include/header.php'; ?>


		<!-- Page top Section -->
		<section class="page-top-section set-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 m-auto text-white">
						<h2>changepassword</h2>
					</div>
				</div>
			</div>
		</section>



		<!-- Pricing Section -->
		<section class="pricing-section spad h-screen">
			<div class="container">

				<div class="row">
			
					<div class="flex justify-center w-full mt-10">
					
							<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

							<!-- <form class="singup-form contact-form" method="post" onSubmit="return valid();">
								<div class="row">
									<div class="col-md-12">
										<input type="password" name="password" id="password" placeholder="Old Password" autocomplete="off">
									</div>
									<div class="col-md-12">
										<input type="password" name="newpassword" id="newpassword" placeholder="New Password" autocomplete="off">
									</div>

									<div class="col-md-12">
										<input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" autocomplete="off">
									</div>

								</div>

								<input type="submit" id="submit" name="submit" value="Submit" class="site-btn sb-gradient">
							</form> -->
							<form class="bg-white shadow-md rounded px-8 py-6 space-y-4 w-1/3" action="#" method="POST">
								<h2 class="text-2xl font-bold mb-4">Change Password</h2>
								<div>
									<label class="block text-gray-700 text-sm font-bold mb-2" for="password">Current Password</label>
									<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" placeholder="Enter current password" required>
								</div>
								<div>
									<label class="block text-gray-700 text-sm font-bold mb-2" for="newpassword">New Password</label>
									<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="newpassword" type="password" name="newpassword" placeholder="Enter new password" required>
								</div>
								<div>
									<label class="block text-gray-700 text-sm font-bold mb-2" for="confirmpassword">Confirm Password</label>
									<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="confirmpassword" type="password" name="confirmpassword" placeholder="Confirm new password" required>
								</div>
								<div class="flex justify-end">
								<input type="submit" id="submit" name="submit" value="Submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">

								</div>

							</form>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6">

					</div>

				</div>
			</div>
		</section>
		<!-- Trainers Section end -->

		<!-- FOOTER -->
		<?php include 'include/footer.php'; ?>



		<!-- SCRIPTS -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/aos.js"></script>
		<script src="js/smoothscroll.js"></script>
		<script src="js/custom.js"></script>

		<!--====== Javascripts & Jquery ======-->
		<script src="js/vendor/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.slicknav.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.nice-select.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/main.js"></script>

	</body>

	</html>
	<style>
		.errorWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #dd3d36;
			color: #fff;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}

		.succWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #5cb85c;
			color: #fff;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}
	</style>
<?php } ?>