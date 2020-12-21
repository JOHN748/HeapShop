<!-- Functions -->
<?php include ('../functions/functions.php'); ?>
<!-- Admin Session -->
<?php include ('includes/session.php'); ?>

<?php $category_details = category_details(); ?>

<!-- HTML Start -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Section -->
<head>

    <!-- Website Title -->
    <title>Manage Categories</title>
    <!-- Meta Tags -->
    <?php include 'includes/header/meta-tags.php'; ?>
    <!-- Default CSS -->
    <?php include 'includes/header/header-styles.php'; ?>
    <!-- Datatable CSS -->
    <?php include 'includes/header/datatable-styles.php'; ?>

</head>

<!-- Body Section -->
<?php include 'includes/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <!-- MenuBar -->
    <?php include 'includes/menu/menu.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Container -->
            <div class="container-fluid">

                <!-- Content Title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Manage Categories</h4>
                            <!-- Breadcrumb -->
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Manage Categories</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End content Title -->

                <!-- Content Start -->

                <!-- Notification Message -->
                <?php if (isset($_SESSION['success'])) : ?>
                    <script>
                        const Toast = Swal.mixin({
                          toast: true,
                          position: 'top',
                          showConfirmButton: false,
                          timer: 3500,
                          timerProgressBar: true,
                          didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                        })
                         
                        Toast.fire({
                          icon: 'success',
                          title: '<?php echo $_SESSION['success']; ?>'
                        })
                    </script>
                    <?php unset($_SESSION['success']); ?>
                <?php endif ?>
                
                <!-- Main Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Table Tools -->
                                <div class="table-tools float-left">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">

                                            <div class="btn-group mr-2">
                                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-paper-plane"></i>&nbsp Export 
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    <a class="dropdown-item btn-copy">
                                                        <i class="fas fa-copy"></i>&nbsp Copy
                                                    </a>
                                                    <a class="dropdown-item btn-excel">
                                                        <i class="fas fa-file-excel"></i>&nbsp Excel
                                                    </a>
                                                    <a class="dropdown-item btn-pdf">
                                                        <i class="fas fa-file-pdf"></i>&nbsp PDF
                                                    </a>
                                                    <a class="dropdown-item btn-csv">
                                                        <i class="fas fa-file-csv"></i>&nbsp CSV
                                                    </a>
                                                    <a class="dropdown-item btn-print">
                                                        <i class="fas fa-print"></i>&nbsp Print
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <form name="multipledeletion" method="post">

                                <div class="table-tools float-right">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">

                                            <input type="text" id="searchbox" class="form-control float-right ml-3" placeholder="Search Users.." style="width: auto;">

                                            <button type="submit" name="multi-cdelete" class="btn btn-danger btn-md float-right ml-3" onClick="return confirm('Are you sure you want to delete?');" >Delete</button>
                                            
                                            <a href="add-category.php" class="btn btn-danger btn-create-users float-right">
                                                <i class="fas fa-plus"></i>&nbsp Add Category
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <!-- User Table -->
                                <table id="datatable" class="table table-striped table-hover table-bordered dt-responsive nowrap"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center"><input type="checkbox" class="" id="select_all"/></th>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Category Image</th>
                                            <th class="text-center">Categories</th>
                                            <th class="text-center">Category Description</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($category_details as $key => $category_detail): ?>
                                        <tr>
                                            <td class="text-center">
                                                <input type="checkbox" class="checkbox" name="ids[]" id="select_img" value="<?php echo $category_detail['id'];?>"/>
                                                <input type="checkbox" class="checkbox imgbox" name="imgs[]" value="<?php echo $category_detail['category_image'];?>"/>
                                            </td>
                                            <td class="text-center"><?php echo $key + 1; ?></td>
                                            <td class="text-center">
                                                <img src="<?php echo 'assets/images/categories/'.$category_detail['category_image'];?>" style="width: 50px; height: 50px;">
                                            </td>
                                            <td><?php echo $category_detail['categories']; ?></td>
                                            <td><?php echo $category_detail['category_description']; ?></td>
                                            
                                    </form>

                                        <form method="post">

                                            <td class="text-center">
                                                <button class="btn btn-eye mr-2">
                                                    <i class="fas fa-eye"></i>
                                                </button>

                                                <a href="edit-category.php?cat-edit-id=<?php echo $category_detail['id']; ?>" 
                                                class="btn btn-pencil-alt mr-2">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <input type="hidden" name="delete-id" value="<?php echo $category_detail['id']; ?>">
                                                <input type="hidden" name="delete-image" value="<?php echo $category_detail['category_image']; ?>">

                                                <button type="submit" name="single-cdelete" class="btn btn-trash-alt">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
 
                                            </td>

                                        </form>

                                        </tr>

                                        <?php endforeach ?>
                                    
                                    </tbody>
                                </table>

                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                </div> <!-- end row -->

                <!-- Content End -->
                
            </div> <!-- End Page Container -->

        </div> <!-- End Page Content -->

        <!-- Footer -->
        <?php include 'includes/footer/footer.php'; ?>
        
    </div>
    <!-- End Main Content -->

</div>
<!-- End layout Wrapper -->

<!-- Right Sidebar -->
<?php include 'includes/menu/right-sidebar.php'; ?>

<!-- Default JS -->
<?php include 'includes/footer/footer-scripts.php'; ?>

<!-- Datatable JS -->
<?php include 'includes/footer/datatables-scripts.php'; ?>
<script src="assets/libs/datatables/js/datatable.js"></script>

</body>
</html>