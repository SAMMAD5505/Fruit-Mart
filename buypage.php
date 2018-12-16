<?php
include('server1.php');

$checkingtype="customer";
   if($_SESSION['usertype'] != $checkingtype )
   {
       header("location: index.php");

   }



 $db = mysqli_connect('localhost', 'root', '', 'database');



// buy code
if (isset($_POST['buy_confirm']))
{
   $name = mysqli_real_escape_string($db, $_POST['buy_products']);
   if (empty($name))
  { array_push($errors, "please enter retailer name"); 
  }
  $result=mysqli_query($db,"SELECT * FROM retailer_database where r_username='$name'");
  if(mysqli_num_rows($result)== 0)
 {
   
 array_push($errors, "please enter valid retailer name"); 
 
 }


    
      $banana = mysqli_real_escape_string($db, $_POST['banana']);
     $orange = mysqli_real_escape_string($db, $_POST['orange']);
     $apple = mysqli_real_escape_string($db, $_POST['apple']);
     $watermelon = mysqli_real_escape_string($db, $_POST['watermelon']);
     $papaya = mysqli_real_escape_string($db, $_POST['papaya']);
     $mango = mysqli_real_escape_string($db, $_POST['mango']);
     $pineapple = mysqli_real_escape_string($db, $_POST['pineapple']);
     $pomegranate = mysqli_real_escape_string($db, $_POST['pomegranate']);
     $guava = mysqli_real_escape_string($db, $_POST['guava']);
  


 $getname1 = mysqli_query($db,"SELECT r_email FROM retailer_database WHERE r_username='$name'");
$getname='';
$getname2='';
$getquantities=array("","","","","","","","","");
 if($getname1) 
 {
       while($row = $getname1->fetch_assoc())
            $getname=$row['r_email'];
 }
     $fruitsarray=array($banana,$orange,$apple,$watermelon,$papaya,$mango,$pineapple,$pomegranate,$guava);

     $arrlength=count($fruitsarray);
    $quantitynumber=0;
    for($i=0; $i<$arrlength; $i++)
    {   
      if(!empty($fruitsarray[$i]))
      {
        
              $quantitynumber=$quantitynumber+1;
      }

    }
    if($quantitynumber<3)
    {
      array_push($errors, "you need to buy minimum 3 products"); 
    }

if ($row = $getname1->fetch_assoc()) 
                    {
       
                      $getname2=$row['r_email'];
                     }


      $result=mysqli_query($db,"SELECT * FROM retailer_quantity WHERE r_email='$getname2'");
       
       if($result) 
       {    
             if($row = mysqli_fetch_array($result,MYSQLI_NUM))
             {  $k=0;
               while($k<10)
               {
                 $getquantities[$k]=$row[$k];
                 $k=$k+1;
               }
             }
        }
        $arrlength=count($getquantities);
        $t=0;
        for($x=1;$x<$arrlength;$x++)
         {
                  
                             $b=$x-1;

                          if($getquantities[$x]<$fruitsarray[$b])
                          {
                               $t=1;
                             
                               break;
                          }

                  
                 
   
    }
       if($t==1)
       {
           array_push($errors, "some products are not available ,please check later"); 
       }


} 






 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Buy</title>
  <link rel="stylesheet" type="text/css" href="style.css">
 
  <style>
    body{background:grey;
         margin:0;
     }
   </style>
</head>

<body>
  <div class="header">
  	<h2>Enter Required Quantities</h2>
  </div>
	 
  <form method="post" action="buypage.php">
  	
 <?php include('errors.php'); ?>
       <div class="input-group">
       Enter the Name of Retailer
      <input type="text " name="buy_products">
  	<div class="input-group">
  		<label>Number of Bananas</label>
  		<input type="number" name="banana" >
  	
  	
  		<label>Number of Oranges</label>
  		<input type="number" name="orange">
  		
  		<label>Number of Apples</label>
  		<input type="number" name="apple" >
  	
  	
  		<label>Number of watermelon</label>
  		<input type="number" name="watermelon">
  		
  		<label>Number of Papayas</label>
  		<input type="number" name="papaya" >
  	
  
  		<label>Number of Mangoes</label>
  		<input type="number" name="mango">
  
  		<label>Number of Pineapples</label>
  		<input type="number" name="pineapple" >
  
  	
  		<label>Number of Pomegranates</label>
  		<input type="number" name="pomegranate">
  		
  		<label>Number of guavas</label>
  		<input type="number" name="guava" >

  
  	 <button type="submit" class="btn" name="buy_confirm" >confirm</button>
  <button  class="btn" name="cancel_buy" >cancel</button>

    </div>
  </form>
    
</body>
</html>