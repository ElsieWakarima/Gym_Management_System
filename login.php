<?php
session_start();
error_reporting(0);
require_once('include/config.php');
$msg = "";
if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = md5(($_POST['password']));
    if ($email != "" && $password != "") {
        try {
            $query = "select id, fname, lname, email, mobile, password, address, create_date from tbluser where email=:email and password=:password";
            $stmt = $dbh->prepare($query);
            $stmt->bindParam('email', $email, PDO::PARAM_STR);
            $stmt->bindValue('password', $password, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
            $row   = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($count == 1 && !empty($row)) {
                $_SESSION['uid']   = $row['id'];
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $row['fname'];
                header("location: index.php");
            } else {
                $msg = "Invalid username and password!";
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    } else {
        $msg = "Both fields are required!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css">


    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/tooplate-gymso-style.css">
    <title>Login</title>
</head>

<body>
    <div id="main-wrapper" class="container justify-center mt-10">
        <div class="row margin-top-10 justify-content-center">
            <div class="col-xl-10">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="p-5">

                                    <div class="mb-5">
                                        <h3 class="h4 font-weight-bold text-theme">Login</h3>
                                    </div>

                                    <h6 class="h5 mb-0">Welcome back!</h6>
                                    <p class="text-muted mt-2 mb-5">Enter your email address and password to access gymnasto.</p>

                                    <form class="" method="post">
                                    <?php if ($error) { ?><div class="errorWrap" style="color:red;"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" style="color:red;"><strong>Error</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                        </div>
                                        <input type="submit" class="btn btn-theme bg-blue-300 px-5 hover:bg-blue-700 hover:text-white" name="submit" value="Login"/>
                                        <a href="#l" class="forgot-link float-right text-primary">Forgot password?</a>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-6 d-none d-lg-inline-block">
                                <div class="account-block rounded-right">
                                    <div class="overlay rounded-right"></div>
                                    <div class="account-testimonial">
                                        <h4 class="text-white mb-4">This beautiful theme yours!</h4>
                                        <p class="lead text-white">"Best investment i made for a long time. Can only recommend it for other users."</p>
                                        <p>-User</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->

                <p class="text-muted text-center mt-3 mb-0">Don't have an account? <a href="register.html" class="text-primary ml-1">register</a></p>

                <!-- end row -->

            </div>
            <!-- end col -->
        </div>
        <!-- Row -->
    </div>
</body>

</html>