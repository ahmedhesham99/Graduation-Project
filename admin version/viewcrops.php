<!DOCTYPE html>
<html lang="en">
    
<head>
<?php include('server3.php'); 

if (isset($_SESSION['idd'])){?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Crops</title>
    
    
    
</head>
<style>

html {
    
    height: 500vh;
    background-image: url("gb.jpg") ;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
 }
.title{
    font-size:45px;
  font-family:arial;
  color:white;
  margin-left:43%;
  
}

.crop_det{
  
  margin-left:650px;
  font-family:arial;
  font-size:50px;
  
}
.edit_btn{
  font-size:20px;
  margin-top:5%;
  background-color:white;
}
.add_btn{
  margin-top:2%;
  font-size:20px;
  background-color:white;
}
.search_btn{
  font-size:20px;
}
</style>
<body>
    
 <h1 class="title" class="crop_det" >  Crops Details </h1> 
<form method = "POST">
<input style="margin-left:38%;margin-top:1%;width:200px ;height:30px" class="search_btn" type="text" name="search" placeholder="Search by name"  >
  

  <input style="margin-left:1%;width:200px ;height:40px ;color:red" type="submit" name="submit" value="Search Me!">
</form>
  <button  style= margin-left:80%; type="button" class="edit_btn"><a style="color:red;text-decoration:none;" href="admin.php">Back to Interface</a></button>
  <button  style= margin-left:80%; type="button" class="add_btn"><a style="color:red;text-decoration:none;" href="addcrops.php">Add product</a></button>



<center>
<table style="color:green;border-radius:2%" border ="6">

<tr style="color:white;font-size:20px;" >

<th> <h2> ID </h2><th>
<th> <h2> Name </h2><td>
<th> <h2> Quantity </h2> <th>
<th> <h2> Price </h2><th>
<th> <h2> Image </h2> <th>
</tr>

<?php

if(isset($_POST['submit'])){

$st= $_POST['search'];

$query= "SELECT * FROM cropss WHERE name LIKE '%$st%'";
$records= mysqli_query($db,$query);


while ($data=mysqli_fetch_array($records)){
?>

<tr style="color:white;font-size:20px;">
 <td> <?php echo $data['id']; ?> <td>
 <td> <?php echo $data['name']; ?> <td>
 <td> <?php echo $data['quantity']; ?> <td>
 <td> <?php echo $data['price']; ?> <td>
 <td><img src="<?php echo $data['image']; ?> "width=250px height=250px/><td>
 <td><a style="color:red;text-decoration:none" href="editcrops.php?id=<?php echo $data ['id'];?>" > Edit </a> <td>
 <td> <a style="color:red;text-decoration:none" href="deletecrops.php?id=<?php echo $data['id'];?>" >  Delete</a> <td>
</tr>

<?php
}  

} 
else {

?>
<?php 

$query=" SELECT * FROM cropss ";

$records= mysqli_query($db,$query);

while($data=mysqli_fetch_array($records))
{
?>

<tr style="color:white;font-size:20px;">
 <td> <?php echo $data['id']; ?> <td>
 <td> <?php echo $data['name']; ?> <td>
 <td> <?php echo $data['quantity']; ?> <td>
 <td> <?php echo $data['price']; ?> <td>
 <td><img src="<?php echo $data['image']; ?> "width=250px height=250px/><td>
 <td><a style="color:red;text-decoration:none" href="editcrops.php?id=<?php echo $data ['id'];?>" > Edit </a> <td>
 <td> <a style="color:red;text-decoration:none" href="deletecrops.php?id=<?php echo $data['id'];?>" >  Delete</a> <td>
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