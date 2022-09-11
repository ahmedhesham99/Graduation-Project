<?php 
 include('server.php'); 

$id= $_GET['id'];

$query = "DELETE  FROM fertilizers WHERE id ='$id'";

$del = mysqli_query($db,$query);

if($del)

{

       mysqli_close($db);
       header("location:viewfert.php");}

else {

   echo  mysqli_error();
}




        
        
    


?>
