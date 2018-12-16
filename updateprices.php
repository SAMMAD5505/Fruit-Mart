<?php 
include('server1.php') ;
$checkingtype="retailer";
   if($_SESSION['usertype'] != $checkingtype )
   {
       header("location: index.php");

   }
$errors = array();
if (isset($_POST['update_price'])) 
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
  { array_push($errors, "banana priceis required"); 
  } if (empty($orange)) 
  { array_push($errors, " orange price is required"); 
  }
   if (empty($apple)) 
  { array_push($errors, " apple price is required"); 
  }
   if (empty($watermelon)) 
  { array_push($errors, "watermelon price is required"); 
  }
   if (empty($papaya)) 
  { array_push($errors, "papaya price is required"); 
  }
   if (empty($mango)) 
  { array_push($errors, "mango price is required"); 
  }
   if (empty($pineapple)) 
  { array_push($errors, "pineappale price is required"); 
  }
   if (empty($pomegranate)) 
  { array_push($errors, "pomegranate price is required"); 
  }
   if (empty($guava)) 
  { array_push($errors, "guava price is required"); 
  }

$fruits=array($banana, $orange, $apple,$watermelon,$papaya,$mango,$pineapple,$pomegranate,$guava);
$arrlength=count($fruits);
$count=0;
for($x=0;$x<$arrlength;$x++)
  {
  for ($j=$x+1;$j<$arrlength;$j++)
     {  


       if($fruits[$x]==$fruits[$j])
       {
         $count=1;
             array_push($errors, "unique price value is required"); 
             break;
       }

      }
       if($count==1)
            {  
             break;
            }
   
    }


 if($count==0)

{
  $storeidname=$_SESSION['username'];

 $getname1 = mysqli_query($db,"SELECT r_email FROM retailer_database WHERE r_username='$storeidname'");
$getname='';
$getname2='';

 if ($row = $getname1->fetch_assoc()) 
 {
      
$getname=$row['r_email'];
 }


$result=mysqli_query($db,"SELECT r_email FROM retailer_price WHERE r_email='$getname'");

        if(mysqli_num_rows($result)!=0)
        {    

                     if ($row = $result->fetch_assoc()) 
                    {
       
                      $getname2=$row['r_email'];
                     }
           
           $query = "UPDATE retailer_price SET p_banana='$banana' ,p_orange='$orange',p_apple='$apple',p_watermelon='$watermelon',p_papaya='$papaya',p_mango='$mango',p_pineapple='$pineapple',p_pomegranate='$pomegranate',p_guava='$guava', updated_time=DATE(NOW()) WHERE r_email='$getname2' AND updated_time<DATE(NOW())";

           mysqli_query($db, $query);
              
           if(mysqli_affected_rows($db)!=0 )
           {  
          $_SESSION['pupdated']="Successfully Updated!";
          //  header('location: updateprices.php');
          }
          else
          {
           $_SESSION['pupdated']="Already Updated Today";
           // header('location: updateprices.php');
          }  
       }
       else
     {
        

        $query = "INSERT INTO retailer_price(r_email,p_banana,p_orange,p_apple,p_watermelon,p_papaya,p_mango,p_pineapple,p_pomegranate,p_guava,updated_time) 
          VALUES('$getname','$banana' ,'$orange','$apple','$watermelon', '$papaya','$mango','$pineapple','$pomegranate','$guava', DATE(NOW()))";
         mysqli_query($db, $query);
       
   
   
     $_SESSION['pupdated']="Successfully Updated!";
     // header('location: updateprices.php');
    
    }











}

}



?>
<!DOCTYPE html>
<html>
<head>
     <title>Update Prices</title>


<link rel="stylesheet" type="text/css" href="style.css">
<script>





 function updatedbq()

{        var fruits=[];
         fruits.length=9;
     fruits[0]= document.forms["myform"]["banana"].value;
      fruits[1]=  document.forms["myform"]["orange"].value;
      fruits[2]=  document.forms["myform"]["apple"].value;
      fruits[3]=  document.forms["myform"]["watermelon"].value;
      fruits[4]=  document.forms["myform"]["papaya"].value;
      fruits[5]=  document.forms["myform"]["mango"].value;
      fruits[6]=  document.forms["myform"]["pineapple"].value;
      fruits[7]=  document.forms["myform"]["pomegranate"].value;
      fruits[8]=  document.forms["myform"]["guava"].value;

     var count=0;
     var i=0;
     var j=0;
     for ( i = 0; i < fruits.length; i+1) 
     { for (j = i + 1 ; j < fruits.length; j+1)
      { if (fruits[i]==fruits[j])
       {  
          count=1;
      }
    }
   }
   if(count==1)
   {     alert(enter unique values);
       return false;

   }
   else
   {
        
        return true;
   }
}


</script>




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
     <h2>Enter new prices of All</h2>
  </div>
      
  <form method="post" action="updateprices.php">
         
 <?php include('errors.php'); ?>
  <?php  if (isset($_SESSION['pupdated'])) : ?>
     <p> <strong><?php echo $_SESSION['pupdated']; ?></strong></p>
       Enter Again next day to Update price 
    <?php endif ?>
     <?php  if (isset($_SESSION['pupdated'])) : ?>
     <?php unset($_SESSION['pupdated']);?>
<?php endif ?>
     <div class="input-group">
          <label>New price of one Banana</label>
          <input type="number"  step="any"name="banana">
     
     
          <label>New price of one Orange</label>
          <input type="number"  step="any"name="orange">
         
          <label>New price of one Apple</label>
          <input type="number"  step="any"name="apple" >
     
          <label>New price of one watermelon</label>
          <input type="number"  step="any"name="watermelon">
          
          <label>New price of one Papaya</label>
          <input type="number"  step="any"name="papaya">
    
          <label>New price of one Mango</label>
          <input type="number"  step="any"name="mango">
         
          <label>New price of one Pineapple</label>
          <input type="number"  step="any"name="pineapple">
    
          <label>New price of one Pomegranate</label>
          <input type="number"  step="any"name="pomegranate">
         
          <label>New price of one guava</label>
          <input type="number"  step="any"name="guava" >
     
  
      <button type="submit" class="btn" name="update_price" >confirm</button>
       
</div>
     </form>






     </body>
     </html>