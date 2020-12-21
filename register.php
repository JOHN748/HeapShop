<!-- Login Functions -->
<?php include('functions/functions.php') ?>

<!-- HTML Start -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Section -->
<head>
    <!-- Website Title -->
    <title>Register</title>
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
                                    <h5 class="text-primary">Register Now</h5>
                                    <p>Create your new HeapShop account now.</p>
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
                                        <img src="assets/images/logo.svg" alt="" class="rounded-circle"
                                             height="34">
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal" method="post" action="register.php" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="useremail">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Enter Username" value="<?php echo $username; ?>">
                                    <span class="text-danger"><?php echo $username_error; ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="username">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $email; ?>">
                                    <span class="text-danger"><?php echo $email_error; ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <input type="password" class="form-control" name="password_1" placeholder="Enter password">
                                    <span class="text-danger"><?php echo $password_1_error; ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="userpassword">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_2" placeholder="Enter password">
                                    <span class="text-danger"><?php echo $password_2_error; ?></span>
                                </div>

                                <label>Upload Profile Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"  name="user_image" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <span class="text-danger"><?php echo $user_image_error; ?></span>
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit" name="register">
                                        Register
                                    </button>
                                </div>

                                <div class="mt-4 text-center">
                                    <p class="mb-0">By registering you agree to the Skote <a href="#" class="text-primary">Terms of Use</a></p>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center">

                    <div>
                        <p>Already have an account ? <a href="login.php" class="font-weight-medium text-primary">
                                Login</a></p>
                        <p>Join with us <i class="mdi mdi-heart text-danger"></i> And Become a HeapShop Member</p>
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

<!-- bs custom file input plugin -->
<script src="assets/libs/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="assets/js/form-element.init.js"></script>

</body>
</html>
