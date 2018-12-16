
<?php 
include('server1.php');
$checkingtype="customer";
   if($_SESSION['usertype'] != $checkingtype )
   {
       header("location: index.php");

   }
$db = mysqli_connect('localhost', 'root', '', 'database');

if (isset($_POST['viewstore']))
{
	 $name = mysqli_real_escape_string($db, $_POST['view_store']);
   if (empty($name))
  {  echo " <h2>please enter a valid retailer name</h2>";
  }
 $getname2="";

$result=mysqli_query($db,"SELECT r_email FROM retailer_database WHERE r_username='$name'");
 


$fq='';
 if(mysqli_num_rows($result)>0)
        {
        	 if ($row = $result->fetch_assoc()) 
                    {
       
                      $getname2=$row['r_email'];
                     }

           $query = "SELECT * FROM retailer_quantity WHERE r_email='$getname2'";
           $takerow=mysqli_query($db, $query);
             $fq=mysqli_fetch_row($takerow);

        }

else{
  
$fq=array(0,0,0,0,0,0,0,0,0,0);


}

$result=mysqli_query($db,"SELECT r_email FROM retailer_database WHERE r_username='$name'");


$fp='';
 if(mysqli_num_rows($result)>0)
        {
            if ($row = $result->fetch_assoc()) 
                    {
       
                      $getname2=$row['r_email'];
                     }
           $query = "SELECT * FROM retailer_price WHERE r_email='$getname2'";
           $takerow=mysqli_query($db, $query);
             $fp=mysqli_fetch_row($takerow);

        }

else{
  
$fp=array(0,0,0,0,0,0,0,0,0,0);


}

}


?>



<!DOCTYPE html>
<html>
<head>
  <title>Retailer Home</title>


  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
     






  <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <style>
        .sidebarContent{
      

      margin-bottom:10px;
      min-height:150px;
      background-color:skyblue;
      
      font-size:medium;
      padding:100px;
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
              <h1 align="center"><?php if(!empty($name)){echo $name." Store";} ?> </h1>
              <div>
        
              <img src="images/banana.jpg" class="pull-left img-thumbnail"/>
                 
                  <div class="col-lg-12">
               <h3> <?php  echo "Available Units of Bananas is ".$fq[1]."<br>"; echo "Price of One Banana is ".$fp[1]."<br>";   ?></h3>
                  
     </div>
      </div>
     <div>
        
              <img src="images/orange.jpg" class="pull-left img-thumbnail"/>
                 
                  <div class="col-lg-12">
                   <h3> <?php  echo "Available Units of Oranges is ".$fq[2]."<br>"; echo "Price of One Orange is ".$fp[2]."<br>";   ?></h3>
                 
                  
     </div>
      </div>
        <div>
        
              <img src="images/apple.jpg" class="pull-left img-thumbnail"/>
                 
                  <div class="col-lg-12">
                   <h3> <?php  echo "Available Units of Apples is ".$fq[3]."<br>"; echo "Price of One Apple is ".$fp[3]."<br>";   ?></h3>
                
                  
     </div>
      </div>
        <div>
        
              <img src="images/watermelon.jpg" class="pull-left img-thumbnail"/>
                 
                  <div class="col-lg-12">
                   <h3> <?php  echo "Available Units of Watermelons is ".$fq[4]."<br>"; echo "Price of One Watermelon is ".$fp[4]."<br>";   ?></h3>
                 
                  
     </div>
      </div>
        <div>
        
              <img src="images/papaya.jpg" class="pull-left img-thumbnail"/>
                 
                  <div class="col-lg-12">
                   <h3> <?php  echo "Available Units of Papaya is ".$fq[5]."<br>"; echo "Price of One Papaya is ".$fp[5]."<br>";   ?></h3>
                
                  
     </div>
      </div>
        <div>
        
              <img src="images/mango.jpg" class="pull-left img-thumbnail"/>
                 
                  <div class="col-lg-12">
                   <h3> <?php  echo "Available Units of Mangoes is ".$fq[6]."<br>"; echo "Price of One Mango is ".$fp[6]."<br>";   ?></h3>
                
                  
     </div>
      </div>
        <div>
        
              <img src="images/pineapple.jpg" class="pull-left img-thumbnail"/>
                 
                  <div class="col-lg-12">
                   <h3> <?php  echo "Available Units of Pineapple is ".$fq[7]."<br>"; echo "Price of One Pineapple is ".$fp[7]."<br>";   ?></h3>
                 
                  
     </div>
      </div>
        <div>
        
              <img src="images/pomegranate.jpg" class="pull-left img-thumbnail"/>
                 
                  <div class="col-lg-12">
                   <h3> <?php  echo "Available Units of Pomegranates is ".$fq[8]."<br>"; echo "Price of One Pomegranate is ".$fp[8]."<br>";   ?></h3>
               
                  
     </div>
      </div>
        <div>
        
              <img src="images/guava.jpg" class="pull-left img-thumbnail"/>
                 
                  <div class="col-lg-12">
                   <h3> <?php  echo "Available Units of Guavas is ".$fq[9]."<br>"; echo "Price of One Guava is ".$fp[1]."<br>";   ?></h3>
                
                  
     </div>
      </div>
    









     </body>
     </html>