<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'heapshop');

// variable declaration
$username = $email = $password_1 = $password_2 = $user_image = "";
$username_error = $email_error = $password_1_error = $password_2_error = $user_image_error = "";
$username_err = $password_err = $user_err = "";


// REGISTER FUNCTION

// call the register() function if register button is clicked
if (isset($_POST['register'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $username, $email, $user_image, $username_error, $email_error, $password_1_error, $password_2_error, $user_image_error;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);
	$user_image  =  $_FILES['user_image']['name'];
	$temp_name1 =  $_FILES['user_image']['tmp_name'];

	// form validation: ensure that the form is correctly filled
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

    // Validate password
    if(empty(trim($password_1))){
        $password_1_error = "Please enter a password.";
    } elseif(strlen(trim($password_1)) < 6){
        $password_1_error = "Password must have atleast 6 characters.";
    } 

    // Validate confirm password
    if(empty(trim($password_2))){
        $password_2_error = "Please confirm password.";
    } else{
        if(empty($password_1_error) && ($password_1 != $password_2)){
            $password_2_error = "Password did not match.";
        }
    }

    //validate userimage
    if(empty(trim($user_image))){
    	$user_image_error = "User Image is must needed";
    }

	// register user if there are no errors in the form
	if (empty($username_error) && empty($email_error) && empty($password_1_error) && empty($password_2_error) && empty($user_image_error)) {
		$password = md5($password_1);//encrypt the password before saving in the database

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


// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

// LOGIN FUNCTION

// call the login() function if register_btn is clicked
if (isset($_POST['login'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $username_err, $password_err, $user_err;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
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
		
	// attempt login if no errors on form
	if (empty($username_err) && empty($password_err) && empty($user_err)) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			
		// check if user is admin or user
		$logged_in_user = mysqli_fetch_assoc($results);

			if ($logged_in_user['role'] == 'admin' && $logged_in_user['status'] == 1) {
				
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['login_message']  = "Logged in Successfully";
				header('location: index.php');		  
			}else if ($logged_in_user['role'] == 'vendor' && $logged_in_user['status'] == 1) {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['login_message']  = "Logged in Successfully";
				header('location: index.php');		  
			}
			else if ($logged_in_user['role'] == 'customer' && $logged_in_user['status'] == 1) {
				
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['login_message']  = "Logged in Successfully";
				header('location: index.php');
			}else{
				$user_err = "Your Account is Inactive";				
			}
			
		}else{
			$password_err = "Incorrect Password";
		}

	}

}

// ...
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

// ...
function isVendor()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'vendor' ) {
		return true;
	}else{
		return false;
	}
}

// ...
function isCustomer()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'customer' ) {
		return true;
	}else{
		return false;
	}
}

?>


