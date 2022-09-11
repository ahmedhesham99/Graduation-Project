<?php 
 include('server.php'); 

$id= $_GET['id'];

$query = "DELETE  FROM cartd WHERE id ='$id'";

$del = mysqli_query($db,$query);

if($del)

{

       mysqli_close($db);
       header("location:cartd.php");}

else {

   echo  mysqli_error();
}




        
        
    


?>