<!DOCTYPE html>
<html lang="en">
    
<head>
<?php include('server.php');
if (isset($_SESSION['id'])){ ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Orders </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<style>
    body{
        height: 200vh;
        background-image:linear-gradient(rgba(184, 182, 187, 0.438),rgba(194, 190, 199, 0.486)) ,url("fertilizer.jpg") ;
        background-position: center;
   background-size: cover;
   background-repeat: no-repeat;
    }
    .title{
        font-family:arial;
        margin-left:42%;
        font-size:35px;
        color:white;
    }
    .back_btn{
        margin-left:80%;
        color:white;
        font-size: 20px;

    }
    </style>
<body>
    
<h1  class="title">  Orders Summary </h1>


<button  style= margin-left:80%; type="button" class="back_btn"><a style="color:red;text-decoration:none;" href="fertilizers.php">Back to Interface</a></button>

<center>

<table class="table table-striped table-hover" style="width:80%" border ="6">

<tr style="color:white;font-size:25px;" >

<th> <h2> Order id </h2><td>
<th> <h2> Date </h2> <th>
<th> <h2> Total </h2><th>
<th> <h2> Status </h2><th>
<th> <h2> Details </h2><th>

</tr>

<?php 

$id = $_SESSION['id'];

$query=" SELECT * FROM dist_order_total WHERE user =$id ";

$records= mysqli_query($db,$query);

while($data=mysqli_fetch_array($records))
{
     
   
?>

<tr style="color:white;font-size:25px;">
 
 <td> <?php echo "#" . $data['id']; ?> <td>
 <td> <?php echo $data['date']; ?> <td>
 <td> <?php echo $data['total'] . " L.E"; ?> <td>
 <td> <?php echo $data['status'] ; ?> <td>
 <td> <a style="color:red;text-decoration:none;" href="dorderdetails.php?id=<?php echo $data['id'];?>" >View </a> <td>

</tr>

<?php
}  
?>

</center>
</table>





</body>
</html>
<?php } else {header('location:login.php');} ?>