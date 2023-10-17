<?php
session_start();
error_reporting(0);
include 'include/config.php';
$uid = $_SESSION['uid'];

if (isset($_POST['submit'])) {
    $pid = $_POST['pid'];


    $sql = "INSERT INTO tblbooking (package_id,userid) Values(:pid,:uid)";

    $query = $dbh->prepare($sql);
    $query->bindParam(':pid', $pid, PDO::PARAM_STR);
    $query->bindParam(':uid', $uid, PDO::PARAM_STR);
    $query->execute();
    echo "<script>alert('Package has been booked.');</script>";
    echo "<script>window.location.href='booking-history.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Gymso Fitness HTML Template</title>

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
    <link rel="stylesheet" href="css/tooplate-gymso-style.css">
    <style>
    .class-info p {
        display: -webkit-box;
        -webkit-line-clamp: 2; /* Limit to 2 lines */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        max-height: 3.6em; /* Adjust the height based on line height */
    }

    .class-info p:hover {
        -webkit-line-clamp: initial; /* Display full text on hover */
        max-height: none;
    }
</style>
    <!--
Tooplate 2119 Gymso Fitness
https://www.tooplate.com/view/2119-gymso-fitness
-->
</head>

<body data-spy="scroll" data-target="#navbarNav" data-offset="50">

    <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <a class="navbar-brand" href="index.php">Gymso Fitness</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a href="#home" class="nav-link smoothScroll">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="#about" class="nav-link smoothScroll">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a href="#class" class="nav-link smoothScroll">Classes</a>
                    </li>

                    <li class="nav-item">
                        <a href="#schedule" class="nav-link smoothScroll">Schedules</a>
                    </li>

                    <li class="nav-item">
                        <a href="#contact" class="nav-link smoothScroll">Contact</a>
                    </li>
                    <?php if (strlen($_SESSION['uid']) == 0) : ?>

                        <li class="nav-item">
                            <a href="login.php" class="nav-link smoothScroll">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="admin/" class="nav-link smoothScroll">Admin</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a href="booking-history.php" class="nav-link smoothScroll">Booking History</a>

                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link smoothScroll">Logout</a>
                        </li>

                    <?php endif; ?>

                </ul>


            </div>

        </div>
    </nav>


    <!-- HERO -->
    <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

        <div class="bg-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-10 mx-auto col-12">
                    <div class="hero-text mt-5 text-center">

                        <h6 data-aos="fade-up" data-aos-delay="300">new way to build a healthy lifestyle!</h6>

                        <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">Upgrade your body at Gymso Fitness</h1>

                        <a href="#feature" class="btn custom-btn mt-3" data-aos="fade-up" data-aos-delay="600">Get started</a>

                        <a href="#about" class="btn custom-btn bordered mt-3" data-aos="fade-up" data-aos-delay="700">learn more</a>

                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="feature" id="feature">
        <div class="container">
            <div class="row">

                <div class="d-flex flex-column justify-content-center ml-lg-auto mr-lg-5 col-lg-5 col-md-6 col-12">
                    <h2 class="mb-3 text-white" data-aos="fade-up">New to the gymso?</h2>

                    <!-- <h6 class="mb-4 text-white" data-aos="fade-up">Your membership is up to 2 months FREE ($62.50 per month)</h6> -->

                    <!-- <p data-aos="fade-up" data-aos-delay="200">Gymso is free HTML template by <a rel="nofollow" href="https://www.tooplate.com" target="_parent">Tooplate</a> for your commercial website. Bootstrap v4.2.1 Layout. Feel free to use it.</p> -->

                    <a href="registration.php" class="btn custom-btn bg-color mt-3" data-aos="fade-up" data-aos-delay="300" data-target="#membershipForm">Become a member today</a>
                </div>

                <div class="mr-lg-auto mt-3 col-lg-4 col-md-6 col-12">
                    <div class="about-working-hours">
                        <div>

                            <h2 class="mb-4 text-white" data-aos="fade-up" data-aos-delay="500">Working hours</h2>

                            <strong class="d-block" data-aos="fade-up" data-aos-delay="600">Sunday : Closed</strong>

                            <strong class="mt-3 d-block" data-aos="fade-up" data-aos-delay="700">Monday - Friday</strong>

                            <p data-aos="fade-up" data-aos-delay="800">7:00 AM - 10:00 PM</p>

                            <strong class="mt-3 d-block" data-aos="fade-up" data-aos-delay="700">Saturday</strong>

                            <p data-aos="fade-up" data-aos-delay="800">6:00 AM - 4:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>


    <!-- ABOUT -->
    <section class="about section" id="about">
        <div class="container">
            <div class="row">

                <div class="mt-lg-5 mb-lg-0 mb-4 col-lg-5 col-md-10 mx-auto col-12">
                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">Hello, we are Gymso</h2>

                    <!-- <p data-aos="fade-up" data-aos-delay="400">You are NOT allowed to redistribute this HTML template downloadable ZIP file on any template collection site. You are allowed to use this template for your personal or business websites.</p> -->

                    <!-- <p data-aos="fade-up" data-aos-delay="500">If you have any question regarding <a rel="nofollow" href="https://www.tooplate.com/view/2119-gymso-fitness" target="_parent">Gymso Fitness HTML template</a>, you can <a rel="nofollow" href="https://www.tooplate.com/contact" target="_parent">contact Tooplate</a> immediately. Thank you.</p> -->

                </div>

                <div class="ml-lg-auto col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="700">
                    <div class="team-thumb">
                        <img src="images/team/team-image.jpg" class="img-fluid" alt="Trainer">

                        <div class="team-info d-flex flex-column">

                            <h3>Mary Yan</h3>
                            <span>Yoga Instructor</span>

                            <ul class="social-icon mt-3">
                                <li><a href="#" class="fa fa-twitter"></a></li>
                                <li><a href="#" class="fa fa-instagram"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mr-lg-auto mt-5 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="800">
                    <div class="team-thumb">
                        <img src="images/team/team-image01.jpg" class="img-fluid" alt="Trainer">

                        <div class="team-info d-flex flex-column">

                            <h3>Catherina</h3>
                            <span>Body trainer</span>

                            <ul class="social-icon mt-3">
                                <li><a href="#" class="fa fa-instagram"></a></li>
                                <li><a href="#" class="fa fa-facebook"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- CLASS -->
    <section class="class section" id="class">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center mb-5">
                    <h6 data-aos="fade-up">Get A Perfect Body</h6>

                    <h2 data-aos="fade-up" data-aos-delay="200">Our Training Classes</h2>
                </div>
                <div class="row">
                    <?php
                    $sql = "SELECT id, category, titlename, PackageType, PackageDuratiobn, Price, uploadphoto, Description, create_date from tbladdpackage";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;

                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) {
                    ?>
                            <div class="col-lg-4 col-md-6 col-12 " style="margin-top: 20px;" data-aos="fade-up" data-aos-delay="400">
                                <div class="class-thumb">
                                    <!-- <img src="<?php echo $result->uploadphoto; ?>" class="img-fluid" alt="Class"> -->
                                    <div class="class-info">
                                        <h3 class="mb-1"><?php echo $result->titlename; ?></h3>
                                        <span><strong><?php echo $result->PackageDuratiobn; ?></strong></span>
                                        <span class="">Kes <?php echo htmlentities($result->Price); ?></span>
                                        <p class="mt-3"><?php echo $result->Description; ?></p>
                                        <?php if (strlen($_SESSION['uid']) == 0) : ?>
                                            <a href="login.php" class="btn btn-primary">Booking Now</a>
                                        <?php else : ?>
                                            <form method='post'>
                                                <input type='hidden' name='pid' value='<?php echo htmlentities($result->id); ?>'>
                                                <input class='btn btn-primary' type='submit' name='submit' value='Booking Now' onclick="return confirm('Do you really want to book this package.');">
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                            if ($cnt % 3 == 0) {
                                // Close the row after every 3 cards
                                echo '</div><div class="row">';
                            }
                            $cnt++;
                        }
                    }
                    ?>
                </div>


            </div>
        </div>
    </section>


    <!-- SCHEDULE -->
    <section class="schedule section" id="schedule">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center">
                    <h6 data-aos="fade-up">our weekly GYM schedules</h6>

                    <h2 class="text-white" data-aos="fade-up" data-aos-delay="200">Workout Timetable</h2>
                </div>

                <div class="col-lg-12 py-5 col-md-12 col-12">
                    <table class="table table-bordered table-responsive schedule-table" data-aos="fade-up" data-aos-delay="300">

                        <thead class="thead-light">
                            <th><i class="fa fa-calendar"></i></th>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Fri</th>
                            <th>Sat</th>
                        </thead>

                        <tbody>
                            <tr>
                                <td><small>7:00 am</small></td>
                                <td>
                                    <strong>Cardio</strong>
                                    <span>7:00 am - 9:00 am</span>
                                </td>
                                <td>
                                    <strong>Power Fitness</strong>
                                    <span>7:00 am - 9:00 am</span>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <strong>Yoga Section</strong>
                                    <span>7:00 am - 9:00 am</span>
                                </td>
                            </tr>

                            <tr>
                                <td><small>9:00 am</small></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <strong>Boxing</strong>
                                    <span>8:00 am - 9:00 am</span>
                                </td>
                                <td>
                                    <strong>Areobic</strong>
                                    <span>8:00 am - 9:00 am</span>
                                </td>
                                <td></td>
                                <td>
                                    <strong>Cardio</strong>
                                    <span>8:00 am - 9:00 am</span>
                                </td>
                            </tr>

                            <tr>
                                <td><small>11:00 am</small></td>
                                <td></td>
                                <td>
                                    <strong>Boxing</strong>
                                    <span>11:00 am - 2:00 pm</span>
                                </td>
                                <td>
                                    <strong>Areobic</strong>
                                    <span>11:30 am - 3:30 pm</span>
                                </td>
                                <td></td>
                                <td>
                                    <strong>Body work</strong>
                                    <span>11:50 am - 5:20 pm</span>
                                </td>
                            </tr>

                            <tr>
                                <td><small>2:00 pm</small></td>
                                <td>
                                    <strong>Boxing</strong>
                                    <span>2:00 pm - 4:00 pm</span>
                                </td>
                                <td>
                                    <strong>Power lifting</strong>
                                    <span>3:00 pm - 6:00 pm</span>
                                </td>
                                <td></td>
                                <td>
                                    <strong>Cardio</strong>
                                    <span>6:00 pm - 9:00 pm</span>
                                </td>
                                <td></td>
                                <td>
                                    <strong>Crossfit</strong>
                                    <span>5:00 pm - 7:00 pm</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>





    <!-- FOOTER -->
    <?php include 'include/footer.php'; ?>


    <!-- Modal -->
    <div class="modal fade" id="membershipForm" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">

                    <h2 class="modal-title" id="membershipFormLabel">Membership Form</h2>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="membership-form webform" role="form">
                        <input type="text" class="form-control" name="cf-name" placeholder="John Doe">

                        <input type="email" class="form-control" name="cf-email" placeholder="Johndoe@gmail.com">

                        <input type="tel" class="form-control" name="cf-phone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>

                        <textarea class="form-control" rows="3" name="cf-message" placeholder="Additional Message"></textarea>

                        <button type="submit" class="form-control" id="submit-button" name="submit">Submit Button</button>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="signup-agree">
                            <label class="custom-control-label text-small text-muted" for="signup-agree">I agree to the <a href="#">Terms &amp;Conditions</a>
                            </label>
                        </div>
                    </form>
                </div>

                <div class="modal-footer"></div>

            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>