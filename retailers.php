<?php

include('server1.php');
$checkingtype="customer";
   if($_SESSION['usertype'] != $checkingtype )
   {
       header("location: index.php");

   }



 $db = mysqli_connect('localhost', 'root', '', 'database');





 





























 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Customer page</title>
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
    




     
     </style>

</head>
<body>
<nav class="menu">
   <ul>
                <li><a href="customer.php"> Home</a> </li>
                <li><a href="customerwallet.php"> My wallet</a> </li>
                <li><a href="retailers.php">Retailers</a> </li>
                <li><a href="buypage.php"> Buy</a> </li>
                <li> <a href="index.php?logout='1'" style="color: red;">logout</a></li>
                


   </ul>
   
   <form class="search-form">
     <input type="text" placeholder="search">
     <button float:right;
        background:orange;
        color:white; 
        border-radius:0 5px 5px 0;
        cursor:pointer;
        position:relative;
        padding:7px;
        font-family:sans-serif;
        border:none;
        font-size:16px; >Search</button>
     </form>
     </nav>
     <div align="center">
     <h2 align="center"> Available retailers in this System</h2>
        <h2>
     
<?php
 




$query="SELECT r_username FROM retailer_database ORDER BY r_email";
$result1=mysqli_query($db,$query);



   $i=1;

    while($row = mysqli_fetch_assoc($result1))
    {
        $name = $row['r_username'];
       // $loc = $row['r_location'];

        echo $i.".    ". $name   ." <br></br>";
     $i=$i+1;
    }
mysqli_close($db);
?>


<form  method="post" action="storeview.php" >



Enter Retailer Name:<input type="text " name="view_store">
    
<button type="submit" name="viewstore" color="blue" >viewStore</button>

</form>

</h2>



</div>
     </body>
     </html>