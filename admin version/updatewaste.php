<!DOCTYPE html>
<html lang="en">
<?php include('server3.php');
if (isset($_SESSION['idd'])){ ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Waste</title>
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
$qry1 = mysqli_query($db,"SELECT * FROM waste WHERE id ='$id'");
$data=mysqli_fetch_array($qry1);


if(isset($_POST['update'])){


            
    $st=$_POST['st'];
    $comment=$_POST['comment'];

    $update.=$st;
    $update.=$comment;

    $a="Available";
    $c="Cancelled";
    $p="Pending";
    
  
if ($st=="Delivered "){
        $query=" UPDATE discount SET status ='$a' WHERE wasteid ='$id' ";
        $edit = mysqli_query($db,$query);
    }
   else if ($st=="Cancelled  "){
        $query2=" UPDATE discount SET status ='$c' WHERE wasteid ='$id' ";
        $edit = mysqli_query($db,$query2);
    }
    else {
        $query3=" UPDATE discount SET status ='$p' WHERE wasteid ='$id' ";
        $edit = mysqli_query($db,$query3);
    }
    $sql="UPDATE waste SET status='$update' WHERE id ='$id'";
    $edit = mysqli_query($db,$sql);
    
    mysqli_close($db);
    header("location:viewwaste.php");
        
        }
    


?>


<h3 class="title" > Update Waste </h3> 

<button  style= margin-left:80%; type="button" class="edit_btn"><a style="color:red;text-decoration:none;" href="viewwaste.php">Back to Waste</a></button>

<form method="POST">
  
    <select style="width:200px ; height:30px" name = " st">   
             <option value="Pending  " > Pending </option> 
             <option value = "Accepted  "> Accept</option>
             <option value = "Cancelled  "> Cancel</option>
             <option value = "Delivered "> Delivered</option>
 
             </select>
             <input style="width:400px ; height:30px ; margin-left:30px; " type="text" name="comment" placeholder=" Any Comments " > <br><br>
    <input style="width:150px ; height:30px ;color:blue" type="submit" name="update" value="Update">



</form>




</body>
</html>
<?php } else {header('location:loginadmin.php');} ?>