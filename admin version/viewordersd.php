<!DOCTYPE html>
<html lang="en">
    
<head>
<?php include('server3.php'); 
if (isset($_SESSION['idd'])){?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Orders </title>
</head>
<style>
 body {
background-image:url("gb.jpg") ;
background-size: cover;
background-repeat: no-repeat;
height: 250vh;
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
    
<a href="viewordersd.php" style=" text-decoration:none;"><h1 class="title">  Orders Summary </h1></a>
<form method="POST">
<input style="margin-left:38%;margin-top:1%;width:200px ;height:30px" style="width:200px ;height:30px"  type="text" name="search" placeholder="Search By order id"  >
  

  <input style="margin-left:1%;width:200px ;height:30px ;color:red" style="width:200px ;height:30px ;color:red" type="submit" name="submit" value="Search Me!">
</form>
  <button   style= margin-left:80%; type="button" class="back_btn"><a style="color:red;text-decoration:none" href="admin.php">Back to Interface</a></button>

<center>

<table style="color:green;border-radius:2%" border ="6">

<tr style="color:white;font-size:25px;">


<th> <h2> Order id </h2><td>
<th> <h2> User </h2> <th>
<th> <h2> Date </h2> <th>
<th> <h2> Total </h2><th>
<th> <h2> Items </h2><th>
<th> <h2> Status </h2><th>

</tr>

<?php 



if(isset($_POST['submit'])){

  $st= $_POST['search'];
  
  
  $query= "SELECT * FROM dist_order_total WHERE id = '$st' ORDER BY date DESC";
  $records= mysqli_query($db,$query);
  
  
  
  
  
  while ($data=mysqli_fetch_array($records)){
  
   
  
    $idd = $data['user'];
    $q=  mysqli_query($db,"SELECT entityname FROM distributors WHERE id = $idd ");
    $dist=mysqli_fetch_array($q);
    $name = $dist['entityname'];
    
     
  ?>
  
  <tr style="color:white;font-size:25px;">
   
   <td> <?php echo "#" . $data['id']; ?> <td>
   <td> <a style="color:red;text-decoration:none" href="viewdist_details.php?id=<?php echo $data['user'];?>">  <?php echo $name;?>   </a> <td>
   <td> <?php echo $data['date']; ?> <td>
   <td> <?php echo $data['total'] . " L.E"; ?> <td>
   <td> <a style="color:red;text-decoration:none" href="viewordersdd.php?id=<?php echo $data['id'];?>" >View Details</a> <td>
   <td> <a style="color:red;text-decoration:none" href="updateordersd.php?id=<?php echo $data['id'];?>" ><?php echo $data['status'];?></a> <td>
   
   
    
  </tr>
      <?php
      }  
  } 
  else {
      ?>
 
 <?php




$query=" SELECT * FROM dist_order_total ORDER BY date DESC  ";

$records= mysqli_query($db,$query);

while($data=mysqli_fetch_array($records))
{
     
  $idd = $data['user'];
  $q=  mysqli_query($db,"SELECT entityname FROM distributors WHERE id = $idd ");
  $dist=mysqli_fetch_array($q);
  $name = $dist['entityname'];
  
   
?>

<tr style="color:white;font-size:25px;">
 
 <td> <?php echo "#" . $data['id']; ?> <td>
 <td> <a style="color:red;text-decoration:none" href="viewdist_details.php?id=<?php echo $data['user'];?>">  <?php echo $name;?>   </a> <td>
 <td> <?php echo $data['date']; ?> <td>
 <td> <?php echo $data['total'] . " L.E"; ?> <td>
 <td> <a style="color:red;text-decoration:none" href="viewordersdd.php?id=<?php echo $data['id'];?>" >View Details</a> <td>
 <td> <a style="color:red;text-decoration:none" href="updateordersd.php?id=<?php echo $data['id'];?>" ><?php echo $data['status'];?></a> <td>
 
 
  
</tr>

<?php
}  
}
?>

</center>
</table>





</body>
</html>
<?php } else {header('location:loginadmin.php');} ?>