<!DOCTYPE html>
<html lang="en">
    
<head>
<?php include('server.php');  
if (isset($_SESSION['id'])){
$id = $_SESSION['id'];?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Profile </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
</head>
<style>
         body {
    
    height: 150vh;
    background-image:linear-gradient(rgba(184, 182, 187, 0.438),rgba(194, 190, 199, 0.486)) ,url("fertilizer.jpg") ;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
 }
.title{
     color:white;
    font-size:45px;
  font-family:arial;
  margin-left:45%
}

.back_btn{
    margin-left:80%;
    font-size: 20px;
}
.btn-group{
    background-color:green;
}

</style>

<body>
    
<h1 class="title">  Profile </h1>


<button  style= "margin-left:80%;width:200px;height:35px;" type="button" ><a style="color:red;text-decoration:none;font-size:20px" href="supp_newloc.php?id=<?php echo $id;?>">Add new location </a></button>
<button  style= "margin-left:80%;width:200px;height:35px;" type="button" ><a style="color:red;text-decoration:none;font-size:20px" href="supp_newph.php?id=<?php echo $id;?>">Add new phone</a></button>

<button  style= "margin-left:80%;width:250px;height:55px;" type="button" class="back_btn"><a style="color:red;text-decoration:none;" href="crops.php">Back to previous page</a></button>


<center>

<table class="table table-striped table-hover" style="width:80%" border ="6">

<tr style="color:white;font-size:20px;">


<th> <h2> Name </h2><th>
<th> <h2> Email </h2> <th>
<th> <h2> Type </h2><th>
<th> <h2> Password </h2><th>

</tr>

<?php 

$id = $_SESSION['id'];

$query=" SELECT * FROM suppliers WHERE id =$id ";

$records= mysqli_query($db,$query);

while($data=mysqli_fetch_array($records))
{
     
   
  
   
?>

<tr style="color:white;font-size:25px;">
 
 <td> <?php echo $data['entityname']; ?> <td>
 <td> <?php echo $data['email']; ?> <td>
 <td> <?php echo $data['Type']; ?> <td>
 <td> <a style="color:red;text-decoration:none;" href="supp_changepw.php?id=<?php echo $data['id'];?>" >Change pw</a> <td>
    
 
  
</tr>
<?php
}  
?>

</center>
</table>

<br ><br >

<table class="table table-striped table-hover" style="width:80%" border="6" >
    <tr style="color:white;font-size:22px;">
        <th> Locations <th>
        <th> Change <th>
        <th> Delete Location <th>
        <tr>
     
<?php
$result2 = mysqli_query($db,"SELECT count(location) FROM supp_location WHERE sid = $id");

$locdata = mysqli_fetch_array($result2);

$query3= "SELECT * FROM supp_location WHERE sid='$id'";
$result= mysqli_query($db,$query3);

while ($data = mysqli_fetch_array($result))

{ 
   ?>
  
  <tr style="color:white;font-size:25px;">
        <td> <?php echo $data['location']; ?>  <td>
        <td> <a style="color:red;text-decoration:none;" href="supp_changeloc.php?id=<?php echo $data['id'];?>" >Edit</a> <td>
        <td> <a style="color:red;text-decoration:none;" href="supp_deleteloc.php?id=<?php echo $data['id'];?>" >Delete</a> <td>
       
</tr>


<?php } 

?>
</table>
    <br>
    <table class="table table-striped table-hover" style="width:80%" border="6" >
    <tr style="color:white;font-size:25px;">
        <th> Phones <th>
        <th> Change <th>
        <th> Delete Phone <th>
</tr>

<?php


$query3= "SELECT * FROM supp_phone WHERE sid='$id'";
$result= mysqli_query($db,$query3);

$result3 = mysqli_query($db,"SELECT count(phone) FROM supp_phone WHERE sid = $id");

$phdata = mysqli_fetch_array($result3);

while ($data = mysqli_fetch_array($result))

{ 
   ?>
        <tr style="color:white;font-size:25px;">
        <td><?php echo $data['phone'];?><td>
        <td> <a style="color:red;text-decoration:none;" href="supp_changeph.php?id=<?php echo $data['id'];?>" >Edit</a> <td>
        <td> <a style="color:red;text-decoration:none" href="supp_deleteph.php?id=<?php echo $data['id'];?>" >Delete</a> <td>
            
<tr>
<?php } 

?>

</table>
    <br>
    <div  style="color:red; text-align:center; font-size:23px">
      
      <?php 
               $phone= $phdata[0];
               $loc= $locdata[0];
              if ($phone <2 OR $loc <2 ) {echo "You Should have at least 1 Phone And 1 Location";}
         ?>
      </div>
      
    

</body>
</html>

<?php } else {header('location:login.php');} ?>
