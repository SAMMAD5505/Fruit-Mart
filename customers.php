<!DOCTYPE html>
<html>
<head>
	<title>Customers</title>









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
                <li><a href ="retailer.php"> Home</a></li>
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

    
</div><h2 align="center"> Your Customers </h2>
<p align="center"> no customers yet</p>







     </body>
     </html>