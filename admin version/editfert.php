<!DOCTYPE html>
<html lang="en">

    
<?php include('server3.php'); 
 if (isset($_SESSION['idd'])){?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Fertilizers</title>
</head>
<style>
     body {

background-image:url("gb.jpg") ;
background-size: cover;
background-repeat: no-repeat;
height: 100vh;

}

.upd_tit{
    font-size:45px;
    font-family:arial;
    color:white;
}
    </style>

<body>
    


<?php 

$id= $_GET['id'];

$qry1 = mysqli_query($db,"SELECT * FROM fertilizers WHERE id ='$id'");

$data=mysqli_fetch_array($qry1);



if(isset($_POST['update'])){
       
    $name=$_POST['pname'];
    $qt=$_POST['pqt'];
    $price=$_POST['pprice'];
    
      $sql="UPDATE fertilizers SET name='$name' , quantity ='$qt', price='$price' WHERE id ='$id'";
        $edit = mysqli_query($db,$sql);
        

if ($edit ) {

    mysqli_close($db);
    header("location:viewfert.php");
}


else {

   echo mysqli_error();
}

   
        }
    

?>

<h3 class="upd_tit"> Update Product </h3> 

<form method="POST">
    <input style="width:150px;height:32px;font-size:12px" type="text" name="pname" value="<?php echo $data['name']?>" required>
    <input style="width:150px;height:32px;font-size:12px" type="text" name="pqt" value="<?php echo $data['quantity']?>"required>
    <input style="width:150px;height:32px;font-size:12px" type="text" name="pprice" value="<?php echo $data['price']?>"required>

    <input style="width:150px;height:32px;font-size:20px"  type="submit" name="update" value="Update">



</form>


</body>
</html>
<?php } else {header('location:loginadmin.php');} ?>