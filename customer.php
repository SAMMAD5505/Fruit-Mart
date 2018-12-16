


<?php 
include('server1.php');
$checkingtype="customer";
   if($_SESSION['usertype'] != $checkingtype )
   {
       header("location: index.php");

   }

?>
<!DOCTYPE html>
<html>
<head>
       <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   <title>Customer Home</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->

    <style>
    * {
  box-sizing: border-box;
}

/* Create three columns of equal width */
.columns {
  float: left;
  width: 33.3%;
  padding: 8px;
}

/* Style the list */
.price {
  list-style-type: none;
  border: 1px solid #eee;
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}

/* Add shadows on hover */
.price:hover {
  box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

/* Pricing header */
.price .header {
  background-color: #111;
  color: white;
  font-size: 25px;
}

/* List items */
.price li {
  border-bottom: 1px solid #eee;
  padding: 20px;
  text-align: center;
}

/* Grey list item */
.price .grey {
  background-color: #eee;
  font-size: 20px;
}

/* The "Sign Up" button */
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
}

/* Change the width of the three columns to 100% 
(to stack horizontally on small screens) */
@media only screen and (max-width: 600px) {
  .columns {
    width: 100%;
  }
}

      .sidebarContent{
      

      margin-bottom:10px;
      min-height:40px;
      background-color:skyblue;
      
      font-size:medium;
      padding:40px;
    }

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
     <button>Search</button>
     </form>
     </nav>
      <?php  if (isset($_SESSION['username'])) : ?>
      <h2 align="center">Welcome <strong><?php echo $_SESSION['username']; ?>!</strong></h2>
     
    <?php endif ?>
              <div>
        
              <img src="images/banana.jpg" class="pull-left img-thumbnail"/>
                 
                  <div class="col-lg-12">
                   <h3>Bananas are a healthy source of fiber, potassium, vitamin B6, vitamin C, and various antioxidants and phytonutrients.</h3>
                  
     </div>
      </div>
     <div>
        
              <img src="images/orange.jpg" class="pull-left img-thumbnail"/>
                 
                  <div class="col-lg-12">
                 <h3>Oranges are a healthy source of fiber, vitamin C, thiamin, folate and antioxidants.</h3>
                  
     </div>
      </div>
        <div>
        
              <img src="images/apple.jpg" class="pull-left img-thumbnail"/>
                 
                  <div class="col-lg-12">
                 <h3>Apples are high in fiber, vitamin C and various antioxidants.</h3>
                  
     </div>
      </div>
        <div>
        
              <img src="images/watermelon.jpg" class="pull-left img-thumbnail"/>
                 
                  <div class="col-lg-12">
               <h3>Watermelon is packed with water and nutrients, contains very few calories and is exceptionally refreshing and juicy.</h3>
                  
     </div>
      </div>
        <div>
        
              <img src="images/papaya.jpg" class="pull-left img-thumbnail"/>
                 
                  <div class="col-lg-12">
                 <h3>Papaya is an excellent source of vitamin A (in the form of carotenoids) and vitamin C. It is a very good source of folate.</h3>
                  
     </div>
      </div>
        <div>
        
              <img src="images/mango.jpg" class="pull-left img-thumbnail"/>
                 
                  <div class="col-lg-12">
                  <h3>Mangos are high in vitamins, potassium, and folate and also add fiber to your diet.</h3>
                  
     </div>
      </div>
        <div>
        
              <img src="images/pineapple.jpg" class="pull-left img-thumbnail"/>
                 
                  <div class="col-lg-12">
                <h3>Pineapple is an excellent source of vitamin C and manganese. It is also a very good source of copper and a good source of vitamin B1, vitamin B6, dietary fiber, folate and pantothenic acid.</h3>
                  
     </div>
      </div>
        <div>
        
              <img src="images/pomegranate.jpg" class="pull-left img-thumbnail"/>
                 
                  <div class="col-lg-12">
              <h3>Pomegranates are rich in fiber, vitamins, minerals and bioactive plant compounds, but they also contain some sugar.</h3>
                  
     </div>
      </div>
        <div>
        
              <img src="images/guava.jpg" class="pull-left img-thumbnail"/>
                 
                  <div class="col-lg-12">
                <h3>This humble fruit is extraordinarily rich in vitamin C, lycopene and antioxidants that are beneficial for skin. Guavas are also rich in manganese which helps the body to absorb other key nutrients from the food that we eat. </h3>
                  
     </div>
      </div>
          
     
    

     

     </body>
     </html>