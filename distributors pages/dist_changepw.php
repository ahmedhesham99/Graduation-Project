<!DOCTYPE html>
<html lang="en">
<?php include('server.php');
if (isset($_SESSION['id'])){ ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<style>
  html{
    
    height: 100%;
    background-image:linear-gradient(rgba(194, 190, 199, 0.486),rgba(194, 190, 199, 0.486)) ,url("fertilizer.jpg") ;

    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    
    
    
}
.title{
        font-family:arial;
        margin-left:23%;
        font-size:35px;
        color:white;
}       
 
.back_btn{
    margin-left:80%;
    font-size: 20px;
}

  </style>

<body>
<?php 
$error=array();

$id= $_GET['id'];

$qry1 = mysqli_query($db,"SELECT * FROM distributors WHERE id ='$id'");

$data=mysqli_fetch_array($qry1);




if(isset($_POST['update'])){

     
     $pw= $data['password']  ;     
    $oldpw=$_POST['oldpw'];
    $pw1=$_POST['pw1'];
    $pw2=$_POST['pw2'];

    
    if($oldpw!=$pw){
        array_push($error,"Incorrect Old Password");

    }
    if($pw1!=$pw2){
        array_push($error,"Passwords do not match");
  
    }
    if(count($error)==0){
        $sql="UPDATE distributors SET password='$pw1'  WHERE id ='$id'";
        $edit = mysqli_query($db,$sql);
        header("location:dist_profile.php");
    }
        

        }


?>




<h3 class="title"> "change your Password" </h3> 
<button  style= margin-left:70%; type="button" class="back_btn"><a style="color:red;text-decoration:none;" href="dist_profile.php">Back to previous page</a></button>
<br> <br>

<form style="font-size:20px;font-family:arial;" method="POST">
    Old Password 
    <input style="width:150px;height:28px;font-size:20px;" type="password" name="oldpw"  required>
    New Password 
    <input style="width:150px;height:28px;font-size:20px" type="password" name="pw1"  required>
    Confirm New Password 
    <input style="width:150px;height:28px;font-size:20px" type="password" name="pw2"  required>

    <input style="width:150px;height:28px;font-size:20px" type="submit" name="update" value="Update">



</form>


<?php if(count($error)>0): ?>
<div  style="color:red;  font-size:25px">

<?php  foreach ($error as $error1){

echo $error1;
echo "<br>"; }   ?>
</div>

<?php endif ?> 



</body>
</html>
<?php } else {header('location:login.php');} ?>