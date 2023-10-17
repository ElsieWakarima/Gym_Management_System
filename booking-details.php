<?php session_start();
error_reporting(0);
require_once('include/config.php');
if (strlen($_SESSION["uid"]) == 0) {
  header('location:login.php');
} else {
  $uid = $_SESSION['uid'];
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


    <section class="page-top-section set-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 m-auto text-white">
            <h2>Booking History</h2>

          </div>
        </div>
      </div>
    </section>
    <!-- Page top Section end -->

    <!-- Contact Section -->
    <section class="mt-20 contact-page-section spad overflow-hidden">
      <div class="container">

        <div class="row">

          <div class="col-lg-12">
            <table class="table table-hover table-bordered">
              <thead>
                <?php $bookindid = $_GET['bookingid'];
                $sql = "SELECT t1.id as bookingid,t3.fname as Name, t3.email as email,t1.booking_date as bookingdate,t2.titlename as title,t2.PackageDuratiobn as PackageDuratiobn,
t2.Price as Price,t2.Description as Description,t4.category_name as category_name,t5.PackageName as PackageName,payment,paymentType FROM tblbooking as t1
 join tbladdpackage as t2
on t1.package_id =t2.id
join tbluser as t3
on t1.userid=t3.id
join tblcategory as t4
on t2.category=t4.id
join tblpackage as t5
on t2.PackageType=t5.id
 where t1.id=:bookindid";
                $query = $dbh->prepare($sql);
                $query->bindParam(':bookindid', $bookindid, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                  foreach ($results as $result) {
                ?>
                    <tr>
                      <th>Booking Date</th>
                      <td><?php echo $result->bookingdate; ?></td>
                      <th>Name</th>
                      <td><?php echo $result->Name; ?></td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td><?php echo $result->email; ?></td>
                      <th>Category</th>
                      <td><?php echo $result->category_name; ?></td>
                    </tr>
                    <tr>
                      <th>Package Name:</th>
                      <td><?php echo $result->PackageName; ?></td>
                      <th>Title</th>
                      <td><?php echo $result->title; ?></td>
                    </tr>
                    <tr>
                      <th>Package Duratiobn</th>
                      <td><?php echo $result->PackageDuratiobn; ?></td>
                      <th>Price</th>
                      <td><?php echo $result->Price; ?></td>
                      <?php $pricess = $result->Price; ?>
                    </tr>
                    <tr>
                      <th>Description</th>
                      <td colspan="3"><?php echo $result->Description; ?></td>

                    </tr>

                    <tr>
                      <th>PaymentType</th>
                      <td colspan="3"><?php $ptype = $result->paymentType;

                                      if ($ptype == '') :
                                        echo "Payment not made yet";
                                      else :
                                        echo $ptype;
                                      endif;
                                      ?></td>

                    </tr>
                <?php $cnt = $cnt + 1;
                  }
                } ?>
              </thead>
            </table>

            <?php $sql = "SELECT * from tblpayment
 where bookingID=:bookindid";
            $query = $dbh->prepare($sql);
            $query->bindParam(':bookindid', $bookindid, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) { ?>
              <table class="table table-hover table-bordered">
                <tr>
                  <th colspan="3" style="text-align:center;font-size:20px;">Payment History</th>
                </tr>
                <tr>
                  <th>Payment Type</th>
                  <th>Amount Paid</th>
                  <th>Payment Date</th>
                </tr>
                <?php foreach ($results as $result) { ?>
                  <tr>
                    <td><?php echo $result->paymentType; ?></td>
                    <td><?php echo $tpayment = $result->payment; ?></td>
                    <td><?php echo $result->payment_date; ?></td>
                  </tr>
                <?php
                  $gpayment += $tpayment;
                }  ?>
                <tr>
                  <th>Total</th>
                  <th><?php echo $gpayment; ?></th>
                </tr>


              </table>
            <?php } ?>
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