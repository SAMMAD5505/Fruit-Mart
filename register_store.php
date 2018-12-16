<?php 



$errors = array();


 if(isset($_POST['register_user']))
{
  $db = mysqli_connect('localhost', 'root', '', 'database');
  
 $checkname= mysqli_query($db,"SELECT r_email FROM retailer_store WHERE r_email='storename'");
 if(mysqli_num_rows($checkname)!= 0)
        {
        array_push($errors, "store already exists ");
        }
  
 $email = mysqli_real_escape_string($db, $_POST['storename']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
   $location = mysqli_real_escape_string($db, $_POST['location']);
  
   $result = mysqli_query($db,"SELECT r_email FROM retailer_database WHERE r_email='$email'");
    if(mysqli_num_rows($result)!= 0)
{
    $query = "INSERT INTO retailer_store(r_email,r_description,r_location) VALUES('$email','$description','$location')";
    mysqli_query($db, $query);
   header('location: index.php');
}
else
{
  array_push($errors, "you must enter your registered mail id");
}
}





?>
<!DOCTYPE html>
<html>
<head>
  <title>Register Store</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register Store</h2>
  </div>
	 
  <form method="post" action="register_store.php">
  <?php include('errors.php'); ?>
     <div class="input-group">
  		<label>StoreName</label>
  		<input type="text" name="storename" placeholder="example@gmail.com" >
  	</div>
  	<div class="input-group">
  		<label>Description</label>
  		<input type="text" name="description" >
  	</div>
  	<div class="input-group">
  		<label>location</label>
  		<input type="text" name="location">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="register_user">register</button>
  	</div>
  	
  </form>
</body>
</html>