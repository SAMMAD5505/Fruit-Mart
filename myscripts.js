function retailer()
{window.open(retailer.php)
	
}
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
     for (var i = 0; i < fruits.length; i+1) 
     { for (var j = i + 1 ; j < fruits.length; j+1)
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