<?php
session_start();
error_reporting(0);
require_once('include/config.php');
if (strlen($_SESSION["uid"]) == 0) {
	header('location:login.php');
} else {


	if (isset($_POST['submit'])) {
		$uid = $_SESSION['uid'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$address = $_POST['address'];
		$sql = "update tbluser set fname=:fname,lname=:lname,mobile=:mobile,city=:city,state=:state,address=:Address where id=:uid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':fname', $fname, PDO::PARAM_STR);
		$query->bindParam(':lname', $lname, PDO::PARAM_STR);
		$query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
		$query->bindParam(':city', $city, PDO::PARAM_STR);
		$query->bindParam(':state', $state, PDO::PARAM_STR);
		$query->bindParam(':Address', $address, PDO::PARAM_STR);
		$query->bindParam(':uid', $uid, PDO::PARAM_STR);
		$query->execute();
		//$msg="<script>toastr.success('Mobile info updated Successfully', {timeOut: 5000})</script>";
		echo "<script>alert('Profile has been updated.');</script>";
		echo "<script> window.location.href =profile.php;</script>";
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
		<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
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
						<form class="signup-form contact-form bg-white shadow-md rounded px-8 py-6 space-y-4" method="post">
							<div class="grid grid-cols-2 gap-4">
								<?php
								$uid = $_SESSION['uid'];
								$sql = "SELECT id, fname, lname, email, mobile, password, address, state, city, create_date from tbluser where id=:uid";
								$query = $dbh->prepare($sql);
								$query->bindParam(':uid', $uid, PDO::PARAM_STR);
								$query->execute();
								$results = $query->fetchAll(PDO::FETCH_OBJ);
								$cnt = 1;
								if ($query->rowCount() > 0) {
									foreach ($results as $result) {
								?>
										<div class="col-span-2">
											<input type="text" name="fname" id="fname" placeholder="First Name" autocomplete="off" value="<?php echo $result->fname; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
										</div>
										<div class="col-span-2">
											<input type="text" name="lname" id="lname" placeholder="Last Name" autocomplete="off" value="<?php echo $result->lname; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
										</div>
										<div class="col-span-2">
											<input type="text" name="email" id="email" placeholder="Your Email" autocomplete="off" value="<?php echo $result->email; ?>" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
										</div>
										<div class="col-span-2">
											<input type="text" name="mobile" id="mobile" placeholder="Mobile Number" autocomplete="off" value="<?php echo $result->mobile; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
										</div>
										<div class="col-span-2">
											<input type="text" name="state" id="state" placeholder="State" autocomplete="off" value="<?php echo $result->state; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
										</div>
										<div class="col-span-2">
											<input type="text" name="city" id="city" placeholder="City" autocomplete="off" value="<?php echo $result->city; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
										</div>
										<div class="col-span-2">
											<input type="text" name="address" id="address" placeholder="Address" autocomplete="off" value="<?php echo $result->address; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
										</div>
										<div class="col-span-2 flex justify-end">
											<input type="submit" id="submit" name="submit" value="Update" class="site-btn sb-gradient bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
										</div>
								<?php }
								} ?>
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