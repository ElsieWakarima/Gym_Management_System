<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/aos.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="../css/tooplate-gymso-style.css">
<!--
	<header class="header-section">
		<div class="header-top">
			<div class="row m-0">
				<div class="col-md-6 d-none d-md-block p-0">
					<!-- <div class="header-info">
						<i class="material-icons">map</i>
						<p>184 Main Collins Street</p>
					</div>
					<div class="header-info">
						<i class="material-icons">phone</i>
						<p>(965) 436 3274</p>
					</div> -->
</div>
<div class="col-md-6 text-left text-md-right p-0">
	<?php if (strlen($_SESSION['uid']) == 0) : ?>
		<div class="header-info d-none d-md-inline-flex">
			<i class="material-icons">account_circle</i>
			<a href="login.php">
				<p>Login</p>
			</a>
		</div>
	<?php else : ?>
		<div class="header-info d-none d-md-inline-flex">
			<i class="material-icons">account_circle</i>
			<a href="profile.php">
				<p>My Profile</p>
			</a>
		</div>
		<div class="header-info d-none d-md-inline-flex">
			<i class="material-icons">brightness_7</i>
			<a href="changepassword.php">
				<p>Change Password</p>
			</a>
		</div>
		<div class="header-info d-none d-md-inline-flex">
			<i class="material-icons">logout</i>
			<a href="logout.php">
				<p>Logout</p>
			</a>
		</div>

	<?php endif; ?>
</div>
</div>
</div>
<div class="header-bottom">





	<nav class="navbar navbar-expand-lg fixed-top">
		<div class="container">

			<a class="navbar-brand" href="index.php">Gymso Fitness</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-lg-auto">
					<li class="nav-item">
						<a href="index.php" class="nav-link smoothScroll">Home</a>
					</li>

					<li class="nav-item">
						<a href="index.php" class="nav-link smoothScroll">About Us</a>
					</li>

					<li class="nav-item">
						<a href="index.php" class="nav-link smoothScroll">Classes</a>
					</li>

					<li class="nav-item">
						<a href="index.php" class="nav-link smoothScroll">Schedules</a>
					</li>

					<li class="nav-item">
						<a href="index.php" class="nav-link smoothScroll">Contact</a>
					</li>
					<?php if (strlen($_SESSION['uid']) == 0) : ?>

						<li class="nav-item">
							<a href="admin/" class="nav-link smoothScroll">Admin</a>
						</li>
					<?php else : ?>
						<li class="nav-item">
							<!-- <a href="./logout.php" >Logout</a> -->
							<a href="booking-history.php" class="nav-link smoothScroll">Booking History</a>
						</li>

						<li class="dropdown"><a class="app-nav__item text-white" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">Profile <i class="fa fa-user fa-lg"></i></a>
							<ul class="dropdown-menu settings-menu dropdown-menu-right">
								<li><a class="dropdown-item" href="changepassword.php"><i class="fa fa-cog fa-lg"></i> Change Password</a></li>
								<li><a class="dropdown-item" href="profile.php"><i class="fa fa-user fa-lg"></i>My Profile</a></li>
								<li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
							</ul>
						</li>
					
					<?php endif; ?>

				</ul>

				<!-- <ul class="social-icon ml-lg-3">

							<li><a href="#" class="fa fa-twitter"></a></li>
							<li><a href="#" class="fa fa-instagram"></a></li>
						</ul> -->
			</div>

		</div>
	</nav>

</div>
</header>