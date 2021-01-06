<!-- Login Functions -->
<?php include 'functions/functions.php' ?>

<!-- HTML Start -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Section -->
<head>
    <!-- Website Title -->
    <title>Login</title>
    <!-- Meta Tags -->
    <?php include 'includes/header/meta-tags.php'; ?>
    <!-- Default CSS -->
    <?php include 'includes/header/header-styles.php'; ?>
</head>

<!-- Body Section -->
<?php include 'includes/body.php'; ?>

<div class="home-btn d-none d-sm-block">
    <a href="index.php" class="text-dark"><i class="fas fa-home h2"></i></a>
</div>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p>Sign in to Heapshop.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <a href="index.php">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal" action="login.php" method="post">

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Enter username" value="<?php echo $username ?>">
                                    <span class="text-danger"><?php echo $username_err; ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                                    <span class="text-danger"><?php echo $password_err; ?></span>
                                </div>

                                <div class="mb-2 text-center">
                                    <span class="text-danger">
                                        <?php echo $user_err; ?>
                                    </span>
                                </div>
                                
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div> 

                                <div class="mt-3">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit" name="login">Log In
                                    </button>
                                </div>

                                <div class="mt-4 text-center">
                                    <a href="auth-recoverpw.php" class="text-muted"><i class="mdi mdi-lock mr-1"></i>
                                        Forgot your password?</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center">
                    <div>
                        <p>Don't have an account ? <a href="register.php" class="font-weight-medium text-primary">
                                Signup now </a></p>
                        <p>Join with us <i class="mdi mdi-heart text-danger"></i> And become a Heapshop Member</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<?php include 'includes/footer/footer-scripts.php'; ?>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>
</html>
