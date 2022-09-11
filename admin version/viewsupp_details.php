<!DOCTYPE html>
<html lang="en">
    
<head>
<?php include('server3.php');
if (isset($_SESSION['idd'])){
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Suppliers </title>
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
    
<h1 class="title">  Supplier's Details </h1>

<button  style= margin-left:80%; type="button" class="back_btn"><a style="color:red;text-decoration:none" href="admin.php">Back to Interface</a></button>
<?php 


$id= $_GET['id'];

$records = mysqli_query($db,"SELECT * FROM suppliers WHERE id ='$id'");
if ($row = mysqli_fetch_array($records)){
    ?>

    <br> <br>

    <table style="color:white;border-radius:2%" border=5   >
    <tr style="color:white;font-size:25px;">
        <th> ID</th>
        <th> Username </th>
        <th> Entityname </th>
        <th> email </th>
       
        <th> Type </th>
</tr>
<tr  style="color:white;font-size:25px;" >
<?php

echo "<td>".$row['id']."</td>";
echo "<td>".$row['username']."</td>";
echo "<td>".$row['entityname']."</td>";
echo "<td>".$row['email']."</td>";

echo "<td>".$row['Type']."</td>";
echo"</tr>";  } ?>
</table>
<br/> 

<table style="color:green;border-radius:2%" border=5 >
    <tr style="color:white;font-size:25px;">
        <th> Locations </th>
        </tr> 

<?php
$query3= "SELECT * FROM supp_location WHERE sid='$id'";
$result= mysqli_query($db,$query3);

while ($data = mysqli_fetch_array($result))

{ ?>
  
        <tr style="color:white;font-size:25px;">
        <td><?php echo $data['location'];?></td>
</tr>
<?php } 

?>
</table>
    <br>
    <table style="color:green;border-radius:2%" border=5 >
    <tr style="color:white;font-size:25px;">
        <th> Phones </th>
        </tr>

<?php
$query3= "SELECT * FROM supp_phone WHERE sid='$id'";
$result= mysqli_query($db,$query3);

while ($data = mysqli_fetch_array($result))

{ 
   ?>

        <tr style="color:white;font-size:25px;">
        <td><?php echo $data['phone'];?></td>

       
</tr>
<?php } 

?>

</table>
    <br>


</body>
</html>
<?php } else {header('location:loginadmin.php');} ?>