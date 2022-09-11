 
<!DOCTYPE html>
<html lang="en">
    
<head>
<?php include('server3.php');
if (isset($_SESSION['idd'])){ ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Distributors </title>
</head>
<style>
  body {
background-image:url("gb.jpg") ;
background-size: cover;
background-repeat: no-repeat;
height: 100vh;
}

.title{
    font-size:45px;
  font-family:arial;
  color:white;
  margin-left:41%;
  
}
.back_btn{
    margin-left:80%;
    font-size: 20px;
}
</style>

<body>
    
<h1 class="title">  Distributor's Details </h1>
<button  style= margin-left:80%; type="button" class="back_btn"><a style="color:red;text-decoration:none" href="viewordersd.php">Back to Orders</a></button>




<?php 


$id= $_GET['id'];

$records = mysqli_query($db,"SELECT * FROM distributors WHERE id ='$id'");

while($data=mysqli_fetch_array($records))
{
  


?>
<center>

<br/> <br/>
       
<table style="color:green;border-radius:2%" border ="6">
<tr style="color:white;font-size:25px;">
           <th> ID</th>
           <th> Username </th>
           <th> Entityname </th>
           <th> email </th>
           <th> Phone </th>
           <th> Location </th>
         
   </tr>
   <tr style="color:white;font-size:25px;">
   <?php

 
   echo "<td>".$data['id']."</td>";
   echo "<td>".$data['username']."</td>";
   echo "<td>".$data['entityname']."</td>";
   echo "<td>".$data['email']."</td>";
   echo "<td>".$data['phone']."</td>";
   echo "<td>".$data['location']."</td>";
 
   echo"<tr>";

?>

</table>

<?php } ?>




</body>
</html>
<?php } else {header('location:loginadmin.php');} ?>