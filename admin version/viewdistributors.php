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
    
 
 <a href="viewdistributors.php" style=" text-decoration:none;"><h1 class="title">  View Distributors  </h1></a>
<form method = "POST">
<input style="margin-left:38%;margin-top:1%;width:200px ;height:30px" type="text" name="search" placeholder="Search By Entity Name"  >
  

  <input style="margin-left:1%;width:200px ;height:30px ;color:red" type="submit" name="submit" value="Search Me!">
  <form>
<button  style= margin-left:80%; type="button" class="back_btn"><a style="color:red;text-decoration:none" href="admin.php">Back to admin</a></button>
  


<br> <br>
<center>
   
   <table style="color:green;border-radius:2%" border=6   >
   <tr style="color:white;font-size:30px;">
     
       <th> Username </th>
       <th> Entity Name </th>
       <th> Email </th>
       <th> Phone </th>
       <th> Location </th>
       <th> Password </th>
       
</tr>



<?php 




if(isset($_POST['submit'])){

  $st= $_POST['search'];
  
  
  $query= "SELECT * FROM distributors WHERE entityname LIKE '%$st%'";
  $records= mysqli_query($db,$query);
  
  
  
  while ($data= mysqli_fetch_array($records)){
    $password=$data['password'];

 

    $hash = preg_replace("|.|","*",$password);


    ?>


 <tr style="color:white;font-size:25px;">
<td> <?php echo $data['username']; ?> </td>
<td> <?php echo $data['entityname']; ?> </td>
<td> <?php echo $data['email']; ?> </td>
<td> <?php echo $data['phone']; ?> </td>
<td> <?php echo $data['location']; ?> </td>
<td> <?php echo $hash; ?> </td>
<td> <a style="color:red;text-decoration:none" href="deletedist.php?id=<?php echo $data['id'];?>" >  Delete </a> <td>
</tr>

      <?php
      }  
  } 
  else {
      ?>
 <?php




$records = mysqli_query($db,"SELECT * FROM distributors");

while ($data= mysqli_fetch_array($records)){

  $password=$data['password'];

 

  $hash = preg_replace("|.|","*",$password);
    ?>




 <tr style="color:white;font-size:25px;">
<td> <?php echo $data['username']; ?> </td>
<td> <?php echo $data['entityname']; ?> </td>
<td> <?php echo $data['email']; ?> </td>
<td> <?php echo $data['phone']; ?> </td>
<td> <?php echo $data['location']; ?> </td>
<td> <?php echo $hash; ?> </td>
<td> <a style="color:red;text-decoration:none" href="deletedist.php?id=<?php echo $data['id'];?>" >  Delete </a> <td>
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