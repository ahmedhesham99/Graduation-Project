<!DOCTYPE html>
<html lang="en">
<?php include('server.php'); 
if (isset($_SESSION['id'])){
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change Locaiton</title>
</head>
<body>
<style>
        html {
    
   height: 100%;
   background-image:linear-gradient(rgba(184, 182, 187, 0.438),rgba(194, 190, 199, 0.486)) ,url("fertilizer.jpg") ;
   background-position: center;
   background-size: cover;
   background-repeat: no-repeat;
}
.title{
        font-family:arial;
        color:white;
        font-size:35px;
        
}

.back_btn{
    margin-left:80%;
    font-size: 20px;
}
</style>

    


<?php 

$id= $_GET['id'];

$qry1 = mysqli_query($db,"SELECT * FROM supp_location WHERE id ='$id'");

$data=mysqli_fetch_array($qry1);



if(isset($_POST['update'])){
        
    $loc=$_POST['loc'];
        
        $sql="UPDATE supp_location SET location='$loc'  WHERE id ='$id'";
        $edit = mysqli_query($db,$sql);
        

if ($edit ) {

    mysqli_close($db);
    header("location:supp_profile.php");
}


else {

   echo mysqli_error();
}

      
        }
    
?>

<h3 class="title"> "change your Location" </h3> 
<button style= "margin-left:30%;width:300px;height:40px" type="button" class="back_btn"><a style="color:red;text-decoration:none;" href="supp_profile.php">Back to previous page</a></button>


<form method="POST">
    <input style="width:350px;height:32px" type="text" name="loc" value="<?php echo $data['location']?>" required>
  

    <input style="width:150px;height:32px;font-size:20px" type="submit" name="update" value="Update">



</form>



</body>
</html>
<?php } else {header('location:login.php');} ?>