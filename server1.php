<?php
session_start();

// initializing variables
$username = "";
$email    = "";

$address = "";
$errors = array(); 
$check_user="customer";
$fname="";
$lname="";
$pan="";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'database');




// REGISTER USER


if (isset($_POST['reg_user'])) 
{

  // receive all input values from the form
  $type = mysqli_real_escape_string($db, $_POST['usertype']);
$fname = mysqli_real_escape_string($db, $_POST['fname']);
$lname = mysqli_real_escape_string($db, $_POST['lname']);
$pan = mysqli_real_escape_string($db, $_POST['pan']);

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

if($type == $check_user)
{
    // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username))
  { array_push($errors, "Username is required"); 
  }
  if (empty($email)) 
  { array_push($errors, "Email is required"); 
  }
  if (empty($password_1)) 
  { array_push($errors, "Password is required"); 
  }
  if (empty($address)) 
  { array_push($errors, "address is required"); 
  }
  if ($password_1 != $password_2) 
  {
	array_push($errors, "The two passwords do not match");
  }
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
 // $user_check_query = "SELECT c_email FROM customer_database WHERE c_email='$username'";
  $result = mysqli_query($db,"SELECT c_email,c_username FROM customer_database WHERE c_email='$email' OR c_username='$username");
 //$user = mysqli_fetch_assoc($result);
  
 // if ($user) 
 
   // if user exists
   //if ($user['username'] === $username) 
//   {
     //   array_push($errors, "Username already exists");
   //}
   // if ($user['email'] === $email) 
  //  {
        if(mysqli_num_rows($result)!= 0)
        {
        array_push($errors, "Email or Username already exists ");
        }
  //  }
   
 
  // Finally, register user if there are no errors in the form
     if (count($errors) == 0)
     {
      	//$password = md5($password_1);//encrypt the password before saving in the database

      	$query = "INSERT INTO customer_database(c_email,c_username,c_password,c_address,c_fname,c_lname,c_pan) 
  			  VALUES('$email','$username','$password_1','$address','$fname','$lname','$pan')";
      	 mysqli_query($db, $query);
  	   $_SESSION['username'] = $username;
     $_SESSION['usertype'] = $check_user;
    	$_SESSION['success'] = "You are now logged in";
     	header('location: index.php');
    }
 } 
  else
  {
     if (empty($username))
  { array_push($errors, "Username is required"); 
  }
  if (empty($email)) 
  { array_push($errors, "Email is required"); 
  }
   if (empty($pan)) 
  { array_push($errors, "pan number is required"); 
  }

  if (empty($password_1)) 
  { array_push($errors, "Password is required"); 
  }
  if (empty($address)) 
  { array_push($errors, "address is required"); 
  }
  if ($password_1 != $password_2) 
  {
  array_push($errors, "The two passwords do not match");
  }
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
 // $user_check_query = "SELECT c_email FROM customer_database WHERE c_email='$username'";
  $result = mysqli_query($db,"SELECT r_email,r_username FROM retailer_database WHERE r_email='$email' OR r_username='$username'");
 // $user = mysqli_fetch_assoc($result);
  
 // if ($user) 
 
   // if user exists
   //if ($user['username'] === $username) 
//   {
     //   array_push($errors, "Username already exists");
   //}
   // if ($user['email'] === $email) 
  //  {
        if(mysqli_num_rows($result)!=0)
        {
        array_push($errors, "Email or Username already exists");
        }
  //  }
   
 
  // Finally, register user if there are no errors in the form
     if (count($errors) == 0)
     {
        //$password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO retailer_database(r_email,r_username,r_password,r_address,r_fname,r_lname,r_pan) 
          VALUES('$email','$username','$password_1','$address','$fname','$lname','$pan')";
         mysqli_query($db, $query);
       $_SESSION['username'] = $username;
       $_SESSION['usertype']=$type;
      $_SESSION['success'] = "You are now logged in";
      header('location: register_store.php');
    }

 }


}






// ... 
// ... 

// LOGIN USER
if (isset($_POST['login_user'])) 
{
  $type=mysqli_real_escape_string($db, $_POST['usertype']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
  if($type == $check_user)
  {
  	$query = "SELECT * FROM customer_database WHERE c_username='$username' AND c_password='$password'";
  	$results = mysqli_query($db, $query);

  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
      $_SESSION['usertype'] = $check_user;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  } 
  else
  {
    $query = "SELECT * FROM retailer_database WHERE r_username='$username' AND r_password='$password'";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['usertype'] = $type;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");



  }
  }
}
}





?>