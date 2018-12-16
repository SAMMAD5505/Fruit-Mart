


<?php 
include('server1.php');
$checkingtype="retailer";
   if($_SESSION['usertype'] != $checkingtype )
   {
       header("location: index.php");

   }




$storeid=$_SESSION['username'];

 $getname1 = mysqli_query($db,"SELECT r_email FROM retailer_database WHERE r_username='$storeid'");
$getname='';
$getname2='';
$dollars=0;

 if ($row = $getname1->fetch_assoc()) 
 {
      
$getname=$row['r_email'];
 }


$result=mysqli_query($db,"SELECT r_email FROM retailer_wallet WHERE r_email='$getname'");
if ($row = $result->fetch_assoc()) 
 {
      
$getname2=$row['r_email'];
 }











?>

<!DOCTYPE html>
<html>
<head>
	<title>Retailer wallet</title>

  <link rel="stylesheet" type="text/css" href="style.css">







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
     	list-style:none;
     	line-height:60px;


     }
     .menu li{
     	float:left;


     }
     .menu ul li a{
     	background:#142b27;
     	text-decoration:none;
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
     	border:none;
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
     	border:none;
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

<div class="header">

     <h2>Your Wallet</h2>
     

</div>
<h2 align="center">
<?php 
$dolls='';
 if(mysqli_num_rows($result)!=0)
        {

           $query = "SELECT r_money from retailer_wallet where r_email='$getname2'";
           $dolls=mysqli_query($db, $query);
            if ($row = $dolls->fetch_assoc()) 
            {
             
                 $dollars=$row['r_money'];
            }
             echo "money in your wallet is ".$dollars ."$";
        }
        else
        {
              $query = "INSERT INTO  retailer_wallet(r_email,r_money) VALUES ('$getname','0')";
               echo "money in your wallet is ".$dollars."$";
                



        }





?>

</h2>



     </body>
     </html>