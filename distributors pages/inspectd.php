<!DOCTYPE html>
<html lang="en">
<?php
include("server.php");
if (isset($_SESSION['id'])){ ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    <style>
        html {
    
   height: 100%;
   background-image:linear-gradient(rgba(184, 182, 187, 0.438),rgba(194, 190, 199, 0.486)) ,url("fertilizer.jpg") ;
   background-position: center;
   background-size: cover;
   background-repeat: no-repeat;
}
.back_btn{
    margin-left:80%;
    font-size: 20px;
}
</style>
</head>
<body >
    <div style= margin-left:300px;>

    <button  style= margin-left:80%; type="button" class="back_btn"><a style="color:red;text-decoration:none;" href="fertilizers.php">Back to shopping</a></button>

</div>

<center>
    <div style="color:white; font-size:20px;">
<?php


$id= $_GET['id'];

$records = mysqli_query($db,"SELECT * FROM fertilizers WHERE id ='$id'");



$data=mysqli_fetch_array($records);

?>


<img src="<?php echo $data['image'];?>"height=200px; margin-left:50px; /><br>
<?php echo $data['name'];?><br>
<?php echo $data['quantity'];?><br>
<?php echo $data['price']." EGP";?><br>


</div>
<?php
$idd=$_SESSION['id'];
    
$name=$data['name'];
$qt=$data['quantity'];;
$price=$data['price'];
 $image=$data['image'];
  ?>
<form style="color:white; font-size:20px;" method="POST" >
       Qty
<select style="width:60px; height30x;" name = " dropdown">   
             <option value=  1> 1</option> 
             <option value = 2> 2</option>
             <option value = 3> 3</option>
             <option value = 4> 4</option>
             <option value = 5> 5</option>
             <option value = 6> 6</option>
             <option value = 7> 7</option>
             <option value = 8> 8</option>
             <option value = 9> 9</option>
             <option value = 10> 10</option>
            
             </select>
               </div>

<button style="width:80px; height30x;" type="submit"   name="additems">Add Item</button>
</form>

<?php
if(isset($_POST['additems'])){

      
        $frequency=($_POST['dropdown']);
   

        $amount = $frequency * $price ;
   
        $sql="INSERT INTO cartd(userid,frequency,amount,fert_id) values('$idd','$frequency','$amount','$id')";
        mysqli_query($db,$sql);
        
        header('location:fertilizers.php'); 
               

}
        ?>


</body>
</html>


<?php } else {header('location:login.php');} ?>