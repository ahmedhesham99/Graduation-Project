<!DOCTYPE html>
<html lang="en">
<?php include('server.php');
if (isset($_SESSION['id'])){ ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change Phone</title>
</head>
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
        
        font-size:35px;
}

.back_btn{
    margin-left:80%;
    font-size: 20px;
}
</style>

<body>
    



<h3 class="title"> "change your Phone" </h3> 
<button style= "margin-left:30%;width:300px;height:40px" type="button" class="back_btn"><a style="color:red;text-decoration:none;" href="supp_profile.php">Back to previous page</a></button>


<form method="POST">
    <input style="width:200px;height:32px" type="text" name="phone"  required>
  

    <input style="width:150px;height:32px;font-size:20px" type="submit" name="update" value="Update">



</form>



<?php 

$id= $_GET['id'];

$qry1 = mysqli_query($db,"SELECT * FROM supp_phone WHERE id ='$id'");

$data=mysqli_fetch_array($qry1);


if(isset($_POST['update'])){
        
    $phone=$_POST['phone'];
 
 
      $data = mysqli_query($db,"SELECT * FROM Supp_Phone WHERE phone = $phone");
    if(mysqli_num_rows($data)==1){
    array_push($error,"phone is already exists");
    }
    
    if(count($error)==0){
   
   

   
        $sql="UPDATE supp_phone SET phone='$phone'  WHERE id ='$id'";
        $edit = mysqli_query($db,$sql);
        header("location:supp_profile.php");




        
        } }
    


?>



<?php

if(count($error)>0): ?>
    <div  style="color:red; text-align:center; font-size:25px">
    
    <?php 
    
    
    foreach ($error as $error1){
    
    echo $error1;
    echo "<br>"; }   ?>
    </div>
    
    <?php endif ?>  




</body>
</html>
<?php } else {header('location:login.php');} ?>