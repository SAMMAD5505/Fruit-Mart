<?php
include('server1.php');





$checkingtype="retailer";
   if($_SESSION['usertype'] != $checkingtype )
   {
       header("location: index.php");

   }



$errors = array();
if (isset($_POST['confirm_update'])) 
{   
     $db = mysqli_connect('localhost', 'root', '', 'database');
     $banana = mysqli_real_escape_string($db, $_POST['banana']);
     $orange = mysqli_real_escape_string($db, $_POST['orange']);
     $apple = mysqli_real_escape_string($db, $_POST['apple']);
     $watermelon = mysqli_real_escape_string($db, $_POST['watermelon']);
     $papaya = mysqli_real_escape_string($db, $_POST['papaya']);
     $mango = mysqli_real_escape_string($db, $_POST['mango']);
     $pineapple = mysqli_real_escape_string($db, $_POST['pineapple']);
     $pomegranate = mysqli_real_escape_string($db, $_POST['pomegranate']);
     $guava = mysqli_real_escape_string($db, $_POST['guava']);
    
     if (empty($banana)) 
  { array_push($errors, "bananaquantity is required"); 
  } if (empty($orange)) 
  { array_push($errors, " orange quantity is required"); 
  }
   if (empty($apple)) 
  { array_push($errors, " apple quantity is required"); 
  }
   if (empty($watermelon)) 
  { array_push($errors, "watermelon quantity is required"); 
  }
   if (empty($papaya)) 
  { array_push($errors, "quantity is required"); 
  }
   if (empty($mango)) 
  { array_push($errors, "mango quantity is required"); 
  }
   if (empty($pineapple)) 
  { array_push($errors, "pineappale quantity is required"); 
  }
   if (empty($pomegranate)) 
  { array_push($errors, "pomegranate quantity is required"); 
  }
   if (empty($guava)) 
  { array_push($errors, "guava quantity is required"); 
  }

$storeid=$_SESSION['username'];

 $getname1 = mysqli_query($db,"SELECT r_email FROM retailer_database WHERE r_username='$storeid'");
$getname='';
$getname2='';

 if ($row = $getname1->fetch_assoc()) 
 {
      
$getname=$row['r_email'];
 }


$result=mysqli_query($db,"SELECT r_email FROM retailer_quantity WHERE r_email='$getname'");
if ($row = $result->fetch_assoc()) 
 {
      
$getname2=$row['r_email'];
 }
        if(mysqli_num_rows($result)!=0)
        {

           $query = "UPDATE retailer_quantity SET q_banana='$banana' ,q_orange='$orange',q_apple='$apple',q_watermelon='$watermelon',q_papaya='$papaya',q_mango='$mango',q_pineapple='$pineapple',q_pomegranate='$pomegranate',q_guava='$guava' WHERE r_email='$getname2'";
           mysqli_query($db, $query);
          $_SESSION['updated']="Successfully Updated!";
         //   header('location: setquantity.php');
        }

       elseif (count($errors) == 0)
     {
        

        $query = "INSERT INTO retailer_quantity(r_email,q_banana,q_orange,q_apple,q_watermelon,q_papaya,q_mango,q_pineapple,q_pomegranate,q_guava) 
          VALUES('$getname','$banana' ,'$orange','$apple','$watermelon', '$papaya','$mango','$pineapple','$pomegranate','$guava')";
         mysqli_query($db, $query);
   
     $_SESSION['updated']="Successfully Updated!";
     // header('location: setquantity.php');
    }











}





?>



<!DOCTYPE html>
<html>
<head>
	<title>QuantityEdit</title>

<link rel="stylesheet" type="text/css" href="style.css">


<script src="myscripts.js"></script>




	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <style>
     body{background:grey;
         margin:0;
     }
    
     .menu{
     	width:100%;
     	background:#142b27;
     	overflow:auto;
     }
     .menu ul{
     	margin:0;
     	padding:0;
     	list-style:n;
     	line-height:60px;


     }
     .menu li{
     	float:left;


     }
     .menu ul li a{
     	background:#142b27;
     	text-decoration:n;
     	width:130px;
     	display:block;
     	text-align:centre;
     	color:#f2f2f2;
     	font-size:18px;
     	font-family:sans-serif;
     	letter-spacing:0.5px;
     	



     }
     .menu li a:hover{
     	color:#fff;
     	opacity:0.5;
     	font-size:19px;

     }
     .search-form{
     	margin-top:15px;
     	float:right;
     	margin-right:100px;


     }
     input[type=text]{
     	padding:7px;
     	border:n;
     	font-size:16px;
     	font-family:sans-serif;


     }
     button{
     	float:right;
     	background:orange;
     	color:white;
     	border-radius:0 5px 5px 0;
     	cursor:pointer;
     	position:relative;
     	padding:7px;
     	font-family:sans-serif;
     	border:n;
     	font-size:16px;


     }
   
    




     
     </style>

</head>
<body>
<div>
<nav class="menu">
   <ul>
                <li><a href ="retailer.php"> Home </a></li>
                <li><a href ="retailerwallet.php" >  My wallet</a> </li>
                <li><a href ="updateprices.php">  update prices</a> </li>
                <li><a href ="setquantity.php" > set quantity</a> </li>
                <li><a href ="customers.php" > customers</a> </li>
               <li> <a href="index.php?logout='1'" style="color: red;">logout</a></li>


   </ul>
   
   <form class="search-form">
     <input type="text" placeholder="search">
     <button>Search</button>
     </form>
     </nav>

    
</div>

<div >



</div>

<div >



</div>


  <div class="header">
     <h2>Enter new quantity of All</h2>
  </div>
      
  <form method="post" action="setquantity.php">
     
 <?php include('errors.php'); ?>
  <?php  if (isset($_SESSION['updated'])) : ?>
     <p> <strong><?php echo $_SESSION['updated']; ?></strong></p>
       Enter Again to Update Quantity
    <?php endif ?>
    <?php  if (isset($_SESSION['updated'])) : ?>
     <?php unset($_SESSION['updated']);?>
<?php endif ?>
  

     <div class="input-group">
          <label>New quantity of  Bananas</label>
          <input type="number" name="banana" >
     </div>
     <div class="input-group">
          <label>New quantity of  Orange</label>
          <input type="number" name="orange">
          <div class="input-group">
          <label>New quantity of  Apples</label>
          <input type="number" name="apple" >
     </div>
     <div class="input-group">
          <label>New quantity of  watermelons</label>
          <input type="number" name="watermelon">
          <div class="input-group">
          <label>New quantity of  Papayas</label>
          <input type="number" name="papaya" >
     </div>
     <div class="input-group">
          <label>New quantity of  Mangoes</label>
          <input type="number" name="mango">
          <div class="input-group">
          <label>New quantity of  Pineapples</label>
          <input type="number" name="pineapple" >
     </div>
     <div class="input-group">
          <label>New quantity of  Pomegranates</label>
          <input type="number" name="pomegranate">
          <div class="input-group">
          <label>New quantity of  guavas</label>
          <input type="number" name="guava" >
     </div>
  
      <button type="submit" class="btn" name="confirm_update">confirm</button>
       <button type="submit" class="btn" name="login_user" onclick="retailer()">cancel</button>

</form>






     </body>
     </html>