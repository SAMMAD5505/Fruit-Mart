<?php



include('updateprices.php');

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

$storeid=$_SESSION['username'];

 $getname1 = mysqli_query($db,"SELECT r_email FROM retailer_database WHERE r_username='$storeid'");
$getname='';
$getname2='';

 if ($row = $getname1->fetch_assoc()) 
 {
      
$getname=$row['r_email'];
 }


$result=mysqli_query($db,"SELECT r_email FROM retailer_price WHERE r_email='$getname'");
if ($row = $result->fetch_assoc()) 
 {
      
$getname2=$row['r_email'];
 }
        if(mysqli_num_rows($result)!=0)
        {    


           
           $query = "UPDATE retailer_price SET p_banana='$banana' ,p_orange='$orange',p_apple='$apple',p_watermelon='$watermelon',p_papaya='$papaya',p_mango='$mango',p_pineapple='$pineapple',p_pomegranate='$pomegranate',p_guava='$guava' updated_time=DATE(NOW()) WHERE r_email='$getname2' AND updated_time<DATE(NOW())";

           mysqli_query($db, $query);
              
           if(mysqli_affected_rows($db)!=0 )
           {  
          $_SESSION['pupdated']="Successfully Updated!";
            header('location: updateprices.php');
          }
          else
          {
           $_SESSION['pupdated']="Please update later";
            header('location: updateprices.php');
          }  
       }
       elseif (count($errors) == 0)
     {
        

        $query = "INSERT INTO retailer_price(r_email,p_banana,p_orange,p_apple,p_watermelon,p_papaya,p_mango,p_pineapple,p_pomegranate,p_guava,) 
          VALUES('$getname','$banana' ,'$orange','$apple','$watermelon', '$papaya','$mango','$pineapple','$pomegranate','$guava', DATE(NOW()))";
         mysqli_query($db, $query);
   
     $_SESSION['updated']="Successfully Updated!";
      header('location: updateprices.php');
    }











}





?>