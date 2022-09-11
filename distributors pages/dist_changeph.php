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
  html{
    
    height: 100%;
    background-image:linear-gradient(rgba(194, 190, 199, 0.486),rgba(194, 190, 199, 0.486)) ,url("fertilizer.jpg") ;

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

<body>
    


<?php 
$errors=array();

$id= $_GET['id'];

$qry1 = mysqli_query($db,"SELECT * FROM distributors WHERE id ='$id'");

$data=mysqli_fetch_array($qry1);




if(isset($_POST['update'])){


            
    $phone=$_POST['phone'];
 
    
    if (preg_match('/[^0-9 ]/', $phone)){
        array_push($errors,"Please Enter Phone in Numbers");
      } 
   
   
     
      if(count($errors)==0){
        
   
        $sql="UPDATE distributors SET phone='$phone'  WHERE id ='$id'";
        $edit = mysqli_query($db,$sql);
        header("location:dist_profile.php");


        
        }}
  

?>

<h3 class="title"> "change your Phone" </h3> 
<button  style= "margin-left:30%" type="button" class="back_btn"><a style="color:red;text-decoration:none;" href="dist_profile.php">Back to previous page</a></button>


<form method="POST">
    <input style="width:200px;height:32px" type="text" name="phone" value="<?php echo $data['phone']?>" required>
  

    <input style="width:150px;height:32px;font-size:20px" type="submit" name="update" value="Update">


</form>

<?php
if(count($errors)>0): ?>
      <div  style="color:red; text-align:center; font-size: 25px;">
      
      <?php 
      foreach ($errors as $error1){
      
      echo $error1;
      echo "<br>"; }   ?>
      </div>
      
      <?php endif ?>  
      </form>
      </body>
      </html>




      <?php } else {header('location:login.php');} ?>


