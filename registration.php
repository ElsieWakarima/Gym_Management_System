
<?php
error_reporting(0);
require_once('include/config.php');

if(isset($_POST['submit']))
{ 
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$state=$_POST['state'];
$city=$_POST['city'];
$Password=$_POST['password'];
$pass=md5($Password);
$RepeatPassword = $_POST['RepeatPassword'];

// Email id Already Exit

$usermatch=$dbh->prepare("SELECT mobile,email FROM tbluser WHERE (email=:usreml || mobile=:mblenmbr)");
$usermatch->execute(array(':usreml'=>$email,':mblenmbr'=>$mobile)); 
while($row=$usermatch->fetch(PDO::FETCH_ASSOC))
{
$usrdbeml= $row['email'];
$usrdbmble=$row['mobile'];
}


if(empty($fname))
{
  $nameerror="Please Enter First Name";
}

 else if(empty($mobile))
 {
 $mobileerror="Please Enter Mobile No";
 }

 else if(empty($email))
 {
 $emailerror="Please Enter Email";
 }

else if($email==$usrdbeml || $mobile==$usrdbmble)
 {
  $error="Email Id or Mobile Number Already Exists!";
 }
  else if($Password=="" || $RepeatPassword=="")
 {
    
   $error="Password And Confirm Password Not Empty!";
 
 }
 else if($_POST['password'] != $_POST['RepeatPassword'])
 {
  
   $error="Password And Confirm Password Not Matched";
 }

 
else{
$sql="INSERT INTO tbluser (fname,lname,email,mobile,state,city,password) Values(:fname,:lname,:email,:mobile,:state,:city,:Password)";

$query = $dbh -> prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':state',$state,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':Password',$pass,PDO::PARAM_STR);

$query -> execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId>0)
{
echo "<script>alert('Registration successfull. Please login');</script>";
echo "<script> window.location.href='login.php';</script>";
}
else 
{
$error ="Registration Not successfully";
 }
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
						<h2></h2>
					</div>
				</div>
			</div>
		</section>



		<!-- Pricing Section -->
		<section class="pricing-section spad h-screen">
			<h1>Be a member</h1>
			<div class="container">
			<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($succmsg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($succmsg); ?> </div><?php }?><br><br>
			<form class="singup-form contact-form" method="post">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <input type="text" name="fname" id="fname" placeholder="First Name" autocomplete="off" value="<?php echo $fname; ?>" required class="border border-gray-300 rounded-md px-4 py-2">
        <input type="text" name="lname" id="lname" placeholder="Last Name" autocomplete="off" value="<?php echo $lname; ?>" required class="border border-gray-300 rounded-md px-4 py-2">
        <input type="text" name="email" id="email" placeholder="Your Email" autocomplete="off" value="<?php echo $email; ?>" required class="border border-gray-300 rounded-md px-4 py-2">
        <input type="text" name="mobile" id="mobile" maxlength="10" placeholder="Mobile Number" autocomplete="off" value="<?php echo $mobile; ?>" required class="border border-gray-300 rounded-md px-4 py-2">
        <input type="text" name="state" id="state" placeholder="Your State" autocomplete="off" value="<?php echo $state; ?>" required class="border border-gray-300 rounded-md px-4 py-2">
        <input type="text" name="city" id="city" placeholder="Your City" autocomplete="off" value="<?php echo $city; ?>" required class="border border-gray-300 rounded-md px-4 py-2">
        <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" class="border border-gray-300 rounded-md px-4 py-2">
        <input type="password" name="RepeatPassword" id="RepeatPassword" placeholder="Confirm Password" autocomplete="off" required class="border border-gray-300 rounded-md px-4 py-2">
    </div>
    <div class="mt-4">
        <input type="submit" id="submit" name="submit" value="Register Now" class="site-btn sb-gradient px-6 py-2 rounded-md text-white">
    </div>
</form>

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
