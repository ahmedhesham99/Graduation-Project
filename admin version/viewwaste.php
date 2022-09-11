<!DOCTYPE html>
<html lang="en">
    
<head>
<?php include('server3.php');
if (isset($_SESSION['idd'])){ ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Waste</title>
    
</head>
<style>
    body {

   

background-image:url("gb.jpg") ;

background-size: cover;

background-repeat: no-repeat;

height: 100vh;

}
.title{
  color:white;
    font-size:45px;
  font-family:arial;
  margin-top:3%;
  margin-left:39%

}


  </style>
<body>
<a href="viewwaste.php" style=" text-decoration:none;"><h1 class="title">  Waste Details </h1></a>


<form method = "POST">
<input style="margin-left:38%;margin-top:1%;width:200px ;height:30px" type="text" name="search" placeholder="Search By Status"  >
  
  <input  style="margin-left:1%;width:200px ;height:30px ;color:red" type="submit" name="submit" value="Search Me!">
  <form>
    
<button  style="  margin-left:80%; width:150px; height:30px; " type="button" class="back_btn"><a style="color:red;text-decoration:none" href="admin.php">Back to Interface</a></button>

<center>

<table style="color:green;border-radius:2%"   border ="6">

<tr style="color:white;font-size:30px;">


<th> <h2> Name </h2><td>
<th> <h2> Quantity </h2> <th>
<th> <h2> Type </h2><th>
<th> <h2> Time </h2> <th>
<th> <h2> Supplier </h2> <th>
<th> <h2> Status </h2> <th>
</tr>
<?php


if(isset($_POST['submit'])){

$st= $_POST['search'];

$query= "SELECT * FROM waste WHERE status LIKE '%$st%' ORDER BY status ";
$records= mysqli_query($db,$query);

while($data=mysqli_fetch_array($records))
{
     $idd = $data['supp_id'];
   $q=  mysqli_query($db,"SELECT entityname FROM suppliers WHERE id = $idd ");
   $supp=mysqli_fetch_array($q);
   $name = $supp['entityname'];
?>

<tr style="color:white;font-size:25px;">
 
 <td> <?php echo $data['name']; ?> <td>
 <td> <?php echo $data['quantity']; ?> <td>
 <td> <?php echo $data['Type']; ?> <td>
 <td> <?php echo $data['time']; ?> <td>
 <td> <a style="color:red;font-size:25x; text-decoration:none;" href="viewsupp_details.php?id=<?php echo $data['supp_id'];?>">  <?php echo $name;?>   </a> <td>
 <td> <a style="color:red;font-size:25px; text-decoration:none;" href="updatewaste.php?id=<?php echo $data['id'];?>"> <?php echo $data['Status'];?> </a> <td>   
</tr>
<?php
}  

} 
else {

$query=" SELECT * FROM Waste ORDER BY status ";

$records= mysqli_query($db,$query);

while($data=mysqli_fetch_array($records))
{
     $idd = $data['supp_id'];
   $q=  mysqli_query($db,"SELECT entityname FROM suppliers WHERE id = $idd ");
   $supp=mysqli_fetch_array($q);
   $name = $supp['entityname'];
?>

<tr style="color:white;font-size:25px;">
 
 <td> <?php echo $data['name']; ?> <td>
 <td> <?php echo $data['quantity']; ?> <td>
 <td> <?php echo $data['Type']; ?> <td>
 <td> <?php echo $data['time']; ?> <td>
 <td> <a style="color:red;font-size:25x; text-decoration:none;" href="viewsupp_details.php?id=<?php echo $data['supp_id'];?>">  <?php echo $name;?>   </a> <td>
 <td> <a style="color:red;font-size:25px; text-decoration:none;" href="updatewaste.php?id=<?php echo $data['id'];?>"> <?php echo $data['Status'];?> </a> <td>   
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