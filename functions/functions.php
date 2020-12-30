<?php 

session_start();

$db = mysqli_connect('localhost', 'root', '', 'heapshop');


// ********** REGISTER USER ********** //

// Register User

$username = $email = $password_1 = $password_2 = $user_image = "";
$username_error = $email_error = $password_1_error = $password_2_error = $user_image_error = "";

if (isset($_POST['register'])) {
	register();
}

function register(){

	global $db, $username, $email, $user_image, $username_error, $email_error, $password_1_error, $password_2_error, 
		   $user_image_error;

	$username    =  $_POST['username'];
	$email       =  $_POST['email'];
	$password_1  =  $_POST['password_1'];
	$password_2  =  $_POST['password_2'];
	$user_image  =  $_FILES['user_image']['name'];
	$temp_name1 =  $_FILES['user_image']['tmp_name'];

	if (empty($username)) { 
		$username_error = "Username is required"; 
	}else{
		$query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) { 
			$username_error = "Username is already taken";
		}
	}

	if (empty($email)) { 
		$email_error = "Email is required"; 
	}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Invalid email format";
    }else{
		$query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) { 
			$email_error = "Email is already taken";
		}
	}

    if(empty(trim($password_1))){
        $password_1_error = "Please enter a password.";
    } elseif(strlen(trim($password_1)) < 6){
        $password_1_error = "Password must have atleast 6 characters.";
    } 

    if(empty(trim($password_2))){
        $password_2_error = "Please confirm password.";
    } else{
        if(empty($password_1_error) && ($password_1 != $password_2)){
            $password_2_error = "Password did not match.";
        }
    }

    if(empty(trim($user_image))){
    	$user_image_error = "User Image is must needed";
    }

	if (empty($username_error) && empty($email_error) && empty($password_1_error) && empty($password_2_error) && empty($user_image_error)) {
		
		$password = md5($password_1);

		$query = "INSERT INTO users (username, email, role, password, user_image, status, joined_at) 
				  VALUES('$username', '$email', 'customer', '$password', '$user_image', 1, NOW())";

		move_uploaded_file($temp_name1, "customer/assets/images/customer/$user_image");  
		mysqli_query($db, $query);
		$_SESSION['message']  = "Registered Successfully!";
		header('location: index.php');

	}

}


// ********** LOGIN USER ********** //

// Login User

$username_err = $password_err = $user_err = "";

if (isset($_POST['login'])) {
	login();
}

function login(){
	global $db, $username, $username_err, $password_err, $user_err;

	$username = $_POST['username'];
	$password = $_POST['password'];

	if (empty($username)) {
		$username_err = "Username is required";
	}else{
		$query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 0) { 
			$username_err = "Invalid Username";
		}
	}
	
	if (empty($password)) {
		$password_err = "Password is required";
	}
		
	if (empty($username_err) && empty($password_err) && empty($user_err)) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { 
			
		$logged_in_user = mysqli_fetch_assoc($results);

			if ($logged_in_user['role'] == 'admin' && $logged_in_user['status'] == 1) {
				
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['message']  = "Logged in Successfully";
				header('location: index.php');		  
			}else if ($logged_in_user['role'] == 'vendor' && $logged_in_user['status'] == 1) {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['message']  = "Logged in Successfully";
				header('location: index.php');		  
			}
			else if ($logged_in_user['role'] == 'customer' && $logged_in_user['status'] == 1) {
				
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['message']  = "Logged in Successfully";
				header('location: index.php');
			}else{
				$user_err = "Your Account is Inactive";				
			}
			
		}else{
			$password_err = "Incorrect Password";
		}

	}

}

function isAdmin(){

	if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

function isVendor(){
	
	if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'vendor' ) {
		return true;
	}else{
		return false;
	}
}

function isCustomer(){

	if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'customer' ) {
		return true;
	}else{
		return false;
	}
}


// ********** LOGGED-IN USER DETAILS ********** //

// Logged-In User Details 

$log_userid = $log_username = $log_useremail = $log_userrole = $log_userimage = "";

if(isset($_SESSION['user'])){ 
	loggedin_user();
} 

function loggedin_user(){

	global $log_userid, $log_username, $log_useremail, $log_userrole, $log_userimage;

	$log_userid    = $_SESSION['user']['id'];
	$log_username  = $_SESSION['user']['username'];
	$log_useremail = $_SESSION['user']['email'];
	$log_userrole  = $_SESSION['user']['role'];
	$log_userimage = $_SESSION['user']['user_image'];

}
    
// ********** REMOVE FOLDER ********* //

function Remove($dir) {
    $structure = glob(rtrim($dir, "/").'/*');
    if (is_array($structure)) {
        foreach($structure as $file) {
            if (is_dir($file)) Remove($file);
            elseif (is_file($file)) unlink($file);
        }
    }
    rmdir($dir);
}


// ********** USER DETAILS ********** //

// User Details 

function user_details(){

	global $db;
	
	$query = "SELECT * FROM users ORDER BY id DESc";
	
	$run_query = mysqli_query($db, $query);
	
	$userdetails = mysqli_fetch_all($run_query, MYSQLI_ASSOC);

	$getdetails = array();

	foreach ($userdetails as $userdetail) {

		array_push($getdetails, $userdetail);

	}

	return $getdetails;
}


// Add user

if (isset($_POST['add_user'])) {
	add_user();
}

function add_user(){

	global $db, $username, $email, $user_image, $username_error, $email_error, $password_1_error, $password_2_error, $user_image_error;

	$username    =  $_POST['username'];
	$email       =  $_POST['email'];
	$password_1  =  $_POST['password_1'];
	$password_2  =  $_POST['password_2'];
	$user_image  =  $_FILES['user_image']['name'];
	$temp_name1 =  $_FILES['user_image']['tmp_name'];

	if (empty($username)) { 
		$username_error = "Username is required"; 
	}else{
		$query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) { 
			$username_error = "Username is already taken";
		}
	}
	
	if (empty($email)) { 
		$email_error = "Email is required"; 
	}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Invalid email format";
    }else{
		$query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) { 
			$email_error = "Email is already taken";
		}
	}

    if(empty(trim($password_1))){
        $password_1_error = "Please enter a password.";
    } elseif(strlen(trim($password_1)) < 6){
        $password_1_error = "Password must have atleast 6 characters.";
    } 

    if(empty(trim($password_2))){
        $password_2_error = "Please confirm password.";
    } else{
        if(empty($password_1_error) && ($password_1 != $password_2)){
            $password_2_error = "Password did not match.";
        }
    }

    if(empty(trim($user_image))){
    	$user_image_error = "User Image is must needed";
    }

	if (empty($username_error) && empty($email_error) && empty($password_1_error) && empty($password_2_error) && empty($user_image_error)) {
		$password = md5($password_1);

		if ($_POST['role'] == 'admin') {
			$query = "INSERT INTO users (username, email, role, password, user_image, status, joined_at) 
					  VALUES('$username', '$email', 'admin', '$password', '$user_image', 1, NOW())";

			move_uploaded_file($temp_name1, "assets/images/admin/$user_image");  
			mysqli_query($db, $query);
			$_SESSION['success']  = "New Admin Successfully Created!";
			header('location: manage-users.php');
		}else if ($_POST['role'] == 'vendor') {
			$query = "INSERT INTO users (username, email, role, password, user_image, status, joined_at) 
					  VALUES('$username', '$email', 'vendor', '$password', '$user_image', 1, NOW())";
			
			move_uploaded_file($temp_name1, "../vendor/assets/images/vendor/$user_image");  
			mysqli_query($db, $query);
			$_SESSION['success']  = "New Vendor Successfully Created!";
			header('location: manage-users.php');
		}else{
			$query = "INSERT INTO users (username, email, role, password, user_image, status, joined_at) 
					  VALUES('$username', '$email', 'customer', '$password', '$user_image', 1, NOW())";

			move_uploaded_file($temp_name1, "../customer/assets/images/customer/$user_image");  
			mysqli_query($db, $query);
			$_SESSION['success']  = "New Customer Successfully Created!";
			header('location: manage-users.php');				
		}

	}

}


// View User

$view_userid = $view_username = $view_email = $view_role = $view_user_image = $up_image = $up_name = $up_price = $up_status =
$up_date = "";

if (isset($_GET['user'])) {

	$user = $_GET['user'];

	global $db, $view_userid, $view_username, $view_email, $view_role, $view_user_image, $up_image, $up_name, $up_status, 
		   $up_date;

	$query = "SELECT * FROM users WHERE username = '$user' ";
	
	$result = mysqli_query($db, $query);

		$view_userdetail = mysqli_fetch_array($result);

		$view_userid  	 = $view_userdetail['id'];
	 	$view_username 	 = $view_userdetail['username'];
	 	$view_email    	 = $view_userdetail['email'];
	 	$view_role       = $view_userdetail['role'];
	 	$view_user_image = $view_userdetail['user_image'];

	$query1 	 = "SELECT COUNT('added_by') FROM products WHERE added_by = '$user'";
	$get_tpcount = mysqli_query($db, $query1);
    $count_tp 	 = mysqli_fetch_array($get_tpcount);

    $total_product_count = $count_tp[0];

    $query2 	 = "SELECT COUNT('added_by') FROM products WHERE (added_by = '$user' AND status = 1)";
	$get_apcount = mysqli_query($db, $query2);
    $count_ap 	 = mysqli_fetch_array($get_apcount);

    $active_product_count = $count_ap[0];

    $query3 	 = "SELECT COUNT('added_by') FROM products WHERE (added_by = '$user' AND status = 0)";
	$get_ipcount = mysqli_query($db, $query3);
    $count_ip 	 = mysqli_fetch_array($get_ipcount);

    $inactive_product_count = $count_ip[0];

}

function user_pdetails(){

	isset($_GET['user']);

	$added_by = $_GET['user'];

	global $db;
	
	$query = "SELECT * FROM products WHERE added_by = '$added_by' ORDER BY id DESC LIMIT 10";
	
	$get_updetails = mysqli_query($db, $query);
	
	$user_pdetails = mysqli_fetch_all($get_updetails, MYSQLI_ASSOC);

	$getdetails = array();

	foreach ($user_pdetails as $user_pdetail) {

		array_push($getdetails, $user_pdetail);

	}

	return $getdetails;
}


// Edit User

$set_userid = $set_username = $set_email = $set_role = $set_user_image = "";

if (isset($_GET['edit-id'])) {

	$edit_id = $_GET['edit-id'];

	global $db, $set_userid, $set_username, $set_email, $set_role, $set_user_image;

	$query = "SELECT * FROM users WHERE id = $edit_id";
	
	$results = mysqli_query($db, $query);

		$set_userdetail = mysqli_fetch_array($results);

		$set_userid  	= $set_userdetail['id'];
	 	$set_username 	= $set_userdetail['username'];
	 	$set_email    	= $set_userdetail['email'];
	 	$set_role       = $set_userdetail['role'];
	 	$set_user_image = $set_userdetail['user_image'];

}

// Update User

if (isset($_POST['update_user'])) {

	$update_userid 		= $_POST['update_id'];
	$update_user_image  = $_POST['user_image'];
	$current_role		= $_POST['user_role'];
	$admin_path 		= "assets/images/admin/$update_user_image";
	$vendor_path 		= "../vendor/assets/images/vendor/$update_user_image";	
	$customer_path		= "../customer/assets/images/customer/$update_user_image";

	global $db, $admin_path, $vendor_path, $customer_path;	

		if ($_POST['role'] == 'admin') {
			$query = "UPDATE users SET role='admin' WHERE id = $update_userid ";

			mysqli_query($db, $query);

			if ($current_role == 'vendor'){
				rename($vendor_path, $admin_path);
			}
			if($current_role == 'customer'){
				rename($customer_path, $admin_path);
			}

			$_SESSION['success']  = "User Successfully Updated to Admin!";
			header('location: manage-users.php');
		}else if ($_POST['role'] == 'vendor') {
			$query = "UPDATE users SET role='vendor' WHERE id = $update_userid";
			
			mysqli_query($db, $query);

			if ($current_role == 'admin'){
				rename($admin_path, $vendor_path);
			}
			if($current_role == 'customer'){
				rename($customer_path, $vendor_path);
			}

			$_SESSION['success']  = "User Successfully Updated to Vendor!";
			header('location: manage-users.php');
		}else if ($_POST['role'] == 'customer') {
			$query = "UPDATE users SET role='customer' WHERE id = $update_userid";

			mysqli_query($db, $query);
			
			if ($current_role == 'admin'){
				rename($admin_path, $customer_path);
			}
			if($current_role == 'vendor'){
				rename($vendor_path, $customer_path);
			}

			$_SESSION['success']  = "User Successfully Updated to Customer!";
			header('location: manage-users.php');				
		} else{
			header('location: manage-users.php');
			$_SESSION['success']  = "Soemthing Wrong!";
		}

	}


// Multi Delete User

error_reporting(0);

if (isset($_POST["multi-delete"])) {
    if (count($_POST["ids"]) > 0 ) {

        $all = implode(",", $_POST["ids"]);
        $sql =mysqli_query($db,"DELETE FROM users WHERE id in ($all)");
        if ($sql) {
            $_SESSION['success'] ="Data has been deleted successfully";
        } else {
            $_SESSION['success'] ="Error while deleting. Please Try again."; 
        }

    } else {
        $_SESSION['success'] = "You need to select atleast one checkbox to delete!";
    }  
}


// Single Delete User

if(isset($_POST['single-delete'])){
    $delete_id = $_POST['delete-id'];
    user_delete($delete_id);
}

function user_delete($delete_id){
    
    global $db;

    if(mysqli_query($db, "DELETE FROM users WHERE id =$delete_id")){
        $_SESSION['success'] = "Data deleted successfully";
    }else{
        $_SESSION['success'] ="Something went wrong, Try again";
    }
}


// Activate & Inactivate User

	if (isset($_POST['active'])) {
		
		$status_id = $_POST['status-id'];
		toggleUserActive($status_id);
	
	}else if (isset($_POST['inactive'])) {
		
		$status_id = $_POST['status-id'];
		toggleUserInactive($status_id);
	
	}


// Activate User

function toggleUserInactive($status_id)
{
	global $db;
	$sql = "UPDATE users SET status= 1 WHERE id=$status_id";
	
	if (mysqli_query($db, $sql)) {
		$_SESSION['success'] = 'User Successfully Activated';
		header("location: manage-users.php");
		exit(0);
	}
}


// Inactivate User

function toggleUserActive($status_id)
{
	global $db;
	$sql = "UPDATE users SET status= 0 WHERE id=$status_id";
	
	if (mysqli_query($db, $sql)) {
		$_SESSION['success'] = 'User Successfully Inactivated';
		header("location: manage-users.php");
		exit(0);
	}
}


// ********** CATEGORIES ********** //

// Categories 

function category_details(){

	global $db;
	
	$query = "SELECT * FROM categories ORDER BY id DESC";
	
	$run_query = mysqli_query($db, $query);
	
	$category_details = mysqli_fetch_all($run_query, MYSQLI_ASSOC);

	$getdetails = array();

	foreach ($category_details as $category_detail) {

		array_push($getdetails, $category_detail);

	}

	return $getdetails;
}


// Add Category

$categories = $cat_desc = $category_image = "";
$categories_err = "";


if (isset($_POST['add_category'])) {
	add_category();
}

function add_category(){
	
	global $db, $categories, $cat_desc, $category_image, $categories_err;

	$categories 	= $_POST['categories'];
	$cat_desc 		= $_POST['category_description'];
	$category_image  =  $_FILES['category_image']['name'];
	$temp_name =  $_FILES['category_image']['tmp_name'];

	if (!empty($categories)) {
		$query = "SELECT * FROM categories WHERE categories='$categories' LIMIT 1";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) { 
			$categories_err = "Category is already exists";
		}
	}

	if (empty($categories_err)) {
		
		$query = "INSERT INTO categories (categories, category_description, category_image) 
					  VALUES('$categories', '$cat_desc', '$category_image')";
		move_uploaded_file($temp_name, "../assets/images/categories/$category_image");  

		mysqli_query($db, $query);
        $_SESSION['success'] ="Category has been successfully Added!."; 
		header('location: manage-categories.php');
	}

}


// Edit Category

$set_catid = $set_categories = $set_cat_desc = $set_cat_image = "";

if (isset($_GET['cat-edit-id'])) {

	$cat_edit_id = $_GET['cat-edit-id'];

	global $db, $set_catid, $set_categories, $set_cat_desc, $set_cat_image;

	$query = "SELECT * FROM categories WHERE id = $cat_edit_id";
	
	$results = mysqli_query($db, $query);

		$set_catdetail = mysqli_fetch_array($results);

		$set_cat_id  	 = $set_catdetail['id'];
	 	$set_categories  = $set_catdetail['categories'];
	 	$set_cat_desc    = $set_catdetail['category_description'];
	 	$set_cat_image   = $set_catdetail['category_image'];

}


// Update Categories

if (isset($_POST['update_category'])) {

	global $db;

	$update_cat_id   = $_POST['update_cat_id'];

	$update_categories = $_POST['categories'];
	$update_cat_desc   = $_POST['category_description'];
	$update_cat_image  =  $_FILES['category_image']['name'];
	$temp_name =  $_FILES['category_image']['tmp_name'];

	$oldimg = $_POST['old_catimg'];
	$oldimg_path ="../assets/images/categories/$oldimg";

	if(empty($update_cat_image)){
		$query = "UPDATE categories SET categories='$update_categories', category_description='$update_cat_desc' WHERE id = $update_cat_id";		

		mysqli_query($db, $query);
		$_SESSION['success']  = "Category Successfully Updated!";
		header('location: manage-categories.php');
	}else{
		$query = "UPDATE categories SET categories='$update_categories', category_description='$update_cat_desc', category_image='$update_cat_image' WHERE id = $update_cat_id";
		
		unlink($oldimg_path);
		move_uploaded_file($temp_name, "../assets/images/categories/$update_cat_image");  
		mysqli_query($db, $query);
		$_SESSION['success']  = "Category Successfully Updated!";
		header('location: manage-categories.php');
	}
}


// Multi Delete Categories

error_reporting(0);

if (isset($_POST["multi-cdelete"])) {
    if (count($_POST["ids"]) > 0 ) {

        $imgs = $_POST["imgs"];
        $all  = implode(",", $_POST["ids"]);
		
        if(mysqli_query($db,"DELETE FROM categories WHERE id in ($all)")){
            foreach ($imgs as $img) {
				unlink('../assets/images/categories/'.$img);
	        }
            $_SESSION['success'] ="Category has been deleted successfully";
        } else {
            $_SESSION['success'] ="Error while deleting. Please Try again."; 
        }

    } else {
        $_SESSION['success'] = "You need to select atleast one checkbox to delete!";
    }  
}


// Single Delete Category

if(isset($_POST['single-cdelete'])){
    $delete_id 	  = $_POST['delete-id'];
    $delete_image = $_POST['delete-image'];
    category_delete($delete_id, $delete_image);
}

function category_delete($delete_id, $delete_image){
    
    global $db;

    if(mysqli_query($db, "DELETE FROM categories WHERE id =$delete_id")){
    	unlink('../assets/images/categories/'.$delete_image);
        $_SESSION['success'] = "Category has been deleted successfully";
    }else{
        $_SESSION['success'] ="Something went wrong, Try again";
    }
}


// Sub-Categories 

function sub_category_details(){

	global $db;
	
	$query = "SELECT * FROM sub_categories ORDER BY id DESC";
	
	$run_query = mysqli_query($db, $query);
	
	$sub_category_details = mysqli_fetch_all($run_query, MYSQLI_ASSOC);

	$getdetails = array();

	foreach ($sub_category_details as $sub_category_detail) {

		array_push($getdetails, $sub_category_detail);

	}

	return $getdetails;
}


// Add Sub-Categories

$sub_cat_id = $sub_category = $sub_cat_image = $sub_cat_err= "";

if (isset($_POST['add_sub_category'])) {
	$cat_id = $_POST['categories_id'];
	add_sub_category($cat_id);
}

function add_sub_category($cat_id){
	
	global $db, $sub_cat_id, $sub_category, $sub_cat_image, $sub_cat_err;

	$sub_cat_id     = $_POST['id'];
	$sub_category 	= $_POST['sub_category'];
	$sub_cat_image  = $_FILES['sub_category_image']['name'];
	$temp_name      =  $_FILES['sub_category_image']['tmp_name'];

	if(!empty($sub_category)){
		$query = "SELECT * FROM sub_categories WHERE sub_categories='$sub_category' LIMIT 1";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) { 
			$sub_cat_err = "Sub-Category is already exists";
		}
	}

	if (empty($sub_cat_err)){
		
		$query = "INSERT INTO sub_categories(categories_id, sub_categories, sub_category_image) 
					  VALUES('$cat_id', '$sub_category', '$sub_cat_image')";
		move_uploaded_file($temp_name, "../assets/images/sub-categories/$sub_cat_image");  

		mysqli_query($db, $query);
        $_SESSION['success'] ="Sub-Category has been successfully Added!"; 
		header('location: manage-sub-categories.php');
	}

}


// Edit Sub-Categories

$set_scatid = $set_scatidd = $set_scat = $set_scat_image = "";

if (isset($_GET['scat-edit-id'])) {

	$scat_edit_id = $_GET['scat-edit-id'];

	global $db, $set_scatid, $set_scatidd, $set_scat, $set_scat_image;

	$query = "SELECT * FROM sub_categories WHERE id = $scat_edit_id";
	
	$results = mysqli_query($db, $query);

		$set_scatdetail = mysqli_fetch_array($results);

		$set_scatid  	  = $set_scatdetail['id'];
		$set_scatidd      = $set_scatdetail['categories_id'];
	 	$set_scategories  = $set_scatdetail['sub_categories'];
	 	$set_scat_image   = $set_scatdetail['sub_category_image'];

}


// Update Sub-Categories

if (isset($_POST['update_sub_category'])) {

	global $db;

	$update_scat_id   = $_POST['update_scat_id'];

	$update_scategories = $_POST['categories_id'];
	$update_sub_category = $_POST['sub-category'];
	$update_scat_image  =  $_FILES['sub_category_image']['name'];
	$temp_name =  $_FILES['sub_category_image']['tmp_name'];

	$oldimg = $_POST['old_subcatimg'];
	$oldimg_path = "../assets/images/sub-categories/$oldimg";

	if(empty($update_scat_image)){
		$query = "UPDATE sub_categories SET categories_id='$update_scategories', sub_categories ='$update_sub_category' WHERE id = $update_scat_id";		

		mysqli_query($db, $query);
		$_SESSION['success']  = "Sub-Category Successfully Updated!";
		header('location: manage-sub-categories.php');
	}else{
		$query = "UPDATE sub_categories SET categories_id='$update_scategories', sub_categories ='$update_sub_category',  sub_category_image='$update_scat_image' WHERE id = $update_scat_id";
		
		unlink($oldimg_path);
		move_uploaded_file($temp_name, "../assets/images/sub-categories/$update_scat_image");  
		mysqli_query($db, $query);
		$_SESSION['success']  = "Sub-Category Successfully Updated!";
		header('location: manage-sub-categories.php');
	}
}


// Multi Delete Sub-Categories

error_reporting(0);

if (isset($_POST["multi-sdelete"])) {
    if (count($_POST["ids"]) > 0 ) {

        $imgs = $_POST["imgs"];
        $all = implode(",", $_POST["ids"]);

        if(mysqli_query($db,"DELETE FROM sub_categories WHERE id in ($all)")){;
        	foreach ($imgs as $img) {
        		unlink("../assets/images/sub-categories/".$img);
        	}
        	$_SESSION['success'] ="Sub-Category has been deleted successfully";
        }else {
            $_SESSION['success'] ="Error while deleting. Please Try again."; 
        }

    } else {
        $_SESSION['success'] = "You need to select atleast one checkbox to delete!";
    }  
}


// Single Delete Sub-Category

if(isset($_POST['single-sdelete'])){
    $delete_id = $_POST['delete-id'];
    $delete_image = $_POST['delete-image'];
    sub_category_delete($delete_id, $delete_image);
}

function sub_category_delete($delete_id, $delete_image){
    
    global $db;

    if(mysqli_query($db, "DELETE FROM sub_categories WHERE id =$delete_id")){
    	unlink("../assets/images/sub-categories/".$delete_image);
        $_SESSION['success'] = "Sub-Category has been deleted successfully";
    }else{
        $_SESSION['success'] ="Something went wrong, Try again";
    }
}


// ********** PRODUCTS ********** //

// Product Details 

function product_details(){

	global $db;
	
	$query = "SELECT * FROM products ORDER BY id DESC";
	
	$run_query = mysqli_query($db, $query);
	
	$product_details = mysqli_fetch_all($run_query, MYSQLI_ASSOC);

	$getdetails = array();

	foreach ($product_details as $product_detail) {

		array_push($getdetails, $product_detail);

	}

	return $getdetails;
}


// Make Slug

function makeSlug(String $string){
	$string = strtolower($string);
	$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	return $slug;
}


// Add Product

$product_name = $categories_id = $sub_categories_id = $mrp = $price = $quantity = $short_desc = $description = $product_slug =
$featured_image = $gallery_images = $status = $featured_product = $added_by = "";

$product_err = $fimg_err = $gimg_err = $slug_err = "";

if (isset($_POST['add_product'])) {
	add_product();
}

function add_product(){
	
	global $db, $product_name, $categories_id, $sub_categories_id, $mrp, $price, $quantity, $short_desc, $description,
	$product_slug, $featured_image, $gallery_images, $status, $featured_product,  $added_by, $product_err, $fimg_err, $gimg_err,
	$slug_err;

	$product_name 		= $_POST['product_name'];
	$categories_id  	= $_POST['category_id'];
	$sub_categories_id  = $_POST['sub_category_id'];
	$mrp 				= $_POST['mrp'];
	$price 				= $_POST['price'];
	$quantity 			= $_POST['quantity'];
	$short_desc 		= $_POST['short_desc'];
	$description 		= $_POST['description'];
	$product_slug 		= $_POST['product_slug'];
	$status 			= $_POST['check'];
	$added_by			= $_SESSION['user']['username'];
	$featured_product  = 0;
	
	$slug = makeSlug($product_slug);

	$featured_image  =  $_FILES['featured_image']['name'];
	$temp_name =  $_FILES['featured_image']['tmp_name'];

	$gallery_images = array_filter($_FILES['gallery_image']['name']); 
	$total_count = count($_FILES['gallery_image']['name']);

	if (!empty($product_name)) {
		$query = "SELECT * FROM products WHERE product_name='$product_name' LIMIT 1";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) { 
			$product_err = "Product is already exists";
		}
	}

	if (!empty($featured_image)) {
		$query = "SELECT * FROM products WHERE featured_image='$featured_image' LIMIT 1";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) { 
			$fimg_err = "Image is already exists";
		}
	}

	if (!empty($slug)) {
		$query = "SELECT * FROM products WHERE slug='$slug' LIMIT 1";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) { 
			$slug_err = "Product Slug is already exists";
		}
	}

	if (empty($product_err) && empty($fimg_err) && empty($slug_err)) {
		
		if(is_array($gallery_images)){ 

	    $gallery_image = implode(',',$gallery_images);       

		$query = "INSERT INTO products (product_name, categories_id, sub_categories_id, mrp, price, quantity, short_desc, 
		          description, slug, added_by, status, featured_image, gallery_images, added_on, featured_product) 
				  
				  VALUES('$product_name', $categories_id, $sub_categories_id, '$mrp', '$price', '$quantity', '$short_desc',
				  '$description', '$slug', '$added_by', '$status', '$featured_image', '$gallery_image', now(), 
				  $featured_product)";

		if(mysqli_query($db, $query)){
			
			if(!is_dir("../assets/images/products/$product_name/")) {
			    mkdir("../assets/images/products/$product_name/");
			}
			
			move_uploaded_file($temp_name, "../assets/images/products/$product_name/$featured_image");
			
			for( $i=0 ; $i < $total_count ; $i++ ) {

			   $tmpFilePath = $_FILES['gallery_image']['tmp_name'][$i];
			   if ($tmpFilePath != ""){
			      $newFilePath = "../assets/images/products/$product_name/" . $_FILES['gallery_image']['name'][$i];

			      move_uploaded_file($tmpFilePath, $newFilePath);
			   }
			}  
			
			$_SESSION['success'] ="Product has been successfully Added!.";	
			header('location: manage-products.php');

			}else{
				$_SESSION['error'] ="Error Occured in Product Upload!.";
				header('location: manage-products.php');
			}
		}
	}
}


// Edit Product

if (isset($_GET['edit-product'])) {

	$product_id = $_GET['edit-product'];

	global $db, $set_pid, $set_pname, $set_pprice, $set_pmrp, $set_pquantity, $set_pshort_desc, $set_pdesc, $set_pcat, $set_psubcat,
		   $set_pslug;

	$query = "SELECT * FROM products WHERE id = $product_id";
	
	$results = mysqli_query($db, $query);

	$set_pdetail = mysqli_fetch_array($results);

	$set_pid         = $set_pdetail['id'];
	$set_pname 		 = $set_pdetail['product_name'];
	$set_pmrp 		 = $set_pdetail['mrp'];
	$set_pprice 	 = $set_pdetail['price'];
	$set_pquantity	 = $set_pdetail['quantity'];
	$set_pshort_desc = $set_pdetail['short_desc'];
	$set_pdesc 		 = $set_pdetail['description'];
	$set_pfimage 	 = $set_pdetail['featured_image'];
	$set_pcat 	     = $set_pdetail['categories_id'];
	$set_psubcat     = $set_pdetail['sub_categories_id'];
	$set_pslug       = $set_pdetail['slug'];

}


// Publish & Unpublish Product

	if (isset($_POST['publish'])) {
		
		$status_id = $_POST['status-id'];
		togglePublish($status_id);
	
	}else if (isset($_POST['unpublish'])) {
		
		$status_id = $_POST['status-id'];
		toggleUnpublish($status_id);
	
	}


// Publish Product

function toggleUnpublish($status_id)
{
	global $db;
	$sql = "UPDATE products SET status= 1 WHERE id=$status_id";
	
	if (mysqli_query($db, $sql)) {
		$_SESSION['success'] = 'Product Successfully Published';
		header("location: manage-products.php");
		exit(0);
	}
}


// Unpublish Product

function togglePublish($status_id)
{
	global $db;
	$sql = "UPDATE products SET status= 0 WHERE id=$status_id";
	
	if (mysqli_query($db, $sql)) {
		$_SESSION['success'] = 'Product Successfully Unpublished';
		header("location: manage-products.php");
		exit(0);
	}
}


// Multi Delete Product

error_reporting(0);

if (isset($_POST["multi-pdelete"])) {
    if (count($_POST["ids"]) > 0 ) {

        $imgs = $_POST["imgs"];
        $all  = implode(",", $_POST["ids"]);

        if(mysqli_query($db,"DELETE FROM products WHERE id in ($all)")) {
        	foreach ($imgs as $img) {
        		Remove('../assets/images/products/'.$img.'/');
        	}
            $_SESSION['success'] ="Products has been deleted successfully";
        } else {
            $_SESSION['success'] ="Error while deleting. Please Try again."; 
        }

    } else {
        $_SESSION['success'] = "You need to select atleast one checkbox to delete!";
    }  
}


// Single Delete Product

if(isset($_POST['single-pdelete'])){
    $delete_id = $_POST['delete-id'];
    $delete_image = $_POST['delete-image'];
    product_delete($delete_id, $delete_image);
}

function product_delete($delete_id, $delete_image){
    
    global $db;

    if(mysqli_query($db, "DELETE FROM products WHERE id =$delete_id")){
    	Remove('../assets/images/products/'.$delete_image.'/');
        $_SESSION['success'] = "Product has been deleted successfully";
    }else{
        $_SESSION['success'] ="Something went wrong, Try again";
    }
}


// Featured Products 

function featured_products(){

	global $db;
	
	$query = "SELECT * FROM products WHERE featured_product = 1 ORDER BY id DESC";
	
	$run_query = mysqli_query($db, $query);
	
	$featured_products = mysqli_fetch_all($run_query, MYSQLI_ASSOC);

	$getdetails = array();

	foreach ($featured_products as $featured_product) {

		array_push($getdetails, $featured_product);

	}

	return $getdetails;
}


// Add & Remove from Featured Product

	if (isset($_POST['add_fp'])) {
		
		$status_id = $_POST['status-id'];
		toggleadd_fp($status_id);
	
	}else if (isset($_POST['remove_fp'])) {
		
		$status_id = $_POST['status-id'];
		toggleremove_fp($status_id);
	
	}


// Add to Featured Product

function toggleremove_fp($status_id)
{
	global $db;
	$sql = "UPDATE products SET featured_product= 1 WHERE id=$status_id";
	
	if (mysqli_query($db, $sql)) {
		$_SESSION['success'] = 'Successfully Added to Featured Product';
		header("location: manage-products.php");
		exit(0);
	}
}


// Remove From Featured Product

function toggleadd_fp($status_id)
{
	global $db;
	$sql = "UPDATE products SET featured_product= 0 WHERE id=$status_id";
	
	if (mysqli_query($db, $sql)) {
		$_SESSION['success'] = 'Successfully Removed from Featured Product';
		header("location: manage-products.php");
		exit(0);
	}
}



?>


