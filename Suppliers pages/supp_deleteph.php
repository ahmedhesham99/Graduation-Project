
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Phone </title>
</head>
<body>
    

<div  style="color:red; text-align:center;">

<?php 
 include('server.php'); 
 

$idd = $_SESSION['id'];

$result = mysqli_query($db,"SELECT count(phone) FROM supp_phone WHERE sid = $idd");

$data = mysqli_fetch_array($result);

$phones=$data[0];





if ( $phones>1) { 
    
    $id= $_GET['id'];
    $query = "DELETE  FROM supp_phone WHERE id ='$id'";

$del = mysqli_query($db,$query);

       mysqli_close($db);
       header("location:supp_profile.php");
       
    }
    

   
    
    else {
       
        header("location:supp_profile.php");
       
        
       
            }
    

      ?>  


</div>

</body>
</html>

