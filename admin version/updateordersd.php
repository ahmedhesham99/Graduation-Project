<!DOCTYPE html>
<html lang="en">
<?php include('server3.php'); 
if (isset($_SESSION['idd'])){?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order</title>
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
</head>
<body>
    


<?php 

$id= $_GET['id'];

$qry1 = mysqli_query($db,"SELECT * FROM dist_order_total WHERE id ='$id'");

$data=mysqli_fetch_array($qry1);


if(isset($_POST['update'])){


            
    $st=$_POST['st'];
    $comment=$_POST['comment'];
    $update.=$st;
    $update.=$comment;

        $sql="UPDATE dist_otder_total SET status='$update' WHERE id ='$id'";
        $edit = mysqli_query($db,$sql);
        
        header("location:viewordersd.php");


        
        }
    


?>




<h3 class="title"> Update Order </h3> 

<button  style= margin-left:80%; type="button" class="edit_btn"><a style="color:red;text-decoration:none;" href="viewordersd.php">Back to Orders</a></button>

<form method="POST">
  
    <select style="width:200px ; height:30px" name = " st">   
             <option value="Pending " > Pend </option> 
             <option value = "Approved "> Approve</option>
             <option value = "Cancelled "> Cancel</option>
             <option value = "Delivered "> Delivered</option>

             </select>
               
             <input style="width:400px ; height:30px ; margin-left:30px; " type="text" name="comment" placeholder=" Details to the buyer" > <br><br>
    
    <input style="width:150px ; height:30px ;color:blue" type="submit" name="update" value="Update">



</form>







</body>
</html>
<?php } else {header('location:loginadmin.php');} ?>