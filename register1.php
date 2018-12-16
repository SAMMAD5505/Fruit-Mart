<?php include('server1.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register1.php">
  	<?php include('errors.php'); ?>
     <div class="input-group">
      <label>Type of user</label>
      <select name="usertype">
  
  <option value="customer">Customer</option>
  <option value="retailer">Retailer</option>

    </select>

     
    </div>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Name to be visible in store">
  	</div>
      <div class="input-group">
      <label>Firstname</label>
      <input type="text" name="fname" value="<?php echo $fname; ?>">
    </div>
      <div class="input-group">
      <label>Lastname</label>
      <input type="text" name="lname" value="<?php echo $lname; ?>">
    </div>

  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
    <div class="input-group">
      <label>PAN number</label>
      <input type="text" name="pan" value="<?php echo $pan; ?>" Placeholder="Must for retailers">
    </div>
  		<div class="input-group">
  	  <label>Address</label>
  	  <input type="text" name="address" value="<?php echo $address; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login1.php">Sign in</a>
  	</p>
  </form>
</body>
</html> z