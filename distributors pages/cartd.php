<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    
</head>
<style>
  html{
    
    height: 200vh;
    background-image:linear-gradient(rgba(194, 190, 199, 0.486),rgba(194, 190, 199, 0.486)) ,url("fertilizer.jpg") ;

    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    
    
    
}
.title{
        font-family:arial;
        margin-left:45%;
        font-size:35px;
}

.back_btn{
    margin-left:60%;
    font-size: 20px;
}

  </style>

<body style="color:white; font-size:22px;" >
  <h3 class="title">My cart</h3>
  <div>
    <button  style= margin-left:80%; type="button" class="back_btn"><a style="color:red ; text-decoration:none;" href="fertilizers.php">Back to interface</a></button>
         </div>

    <?php
include("server.php");

if (isset($_SESSION['id'])){

$userid=$_SESSION['id'];

$records = mysqli_query($db,"SELECT cartd.id, cartd.userid,cartd.frequency,cartd.amount  , fertilizers.name, fertilizers.image, fertilizers.quantity , fertilizers.price 

  FROM cartd INNER JOIN fertilizers ON cartd.fert_id = fertilizers.id WHERE cartd.userid = '$userid'");



$total=0;

while($data=mysqli_fetch_array($records))
{
  


?>
<center>

<table style="color:green" border ="6"> 

<tr style="color:white;font-size:22px;">

  <td><img src="<?php echo $data['image'];?>"height=150px; width=150px; /><td>
  <td width=150px;><?php echo $data['name'];?><td>
  <td width=100px><?php echo $data['quantity'];?><td>
  <td width=100px ><?php echo "Price: " .$data['price'];?><td>
  <td width=100px ><?php echo "Qty: " . $data['frequency'];?><td>
  <td width=150px ><?php echo "Amount: " . $data['amount'];?><td>
  <td width=100px> <a style="color:red ;text-decoration:none;" href="deletecartd.php?id=<?php echo $data['id'];?>" >  Remove</a> <td> 
  
</tr> 
</center>

</table> 

<form >  
<?php

$amount=$data['amount'] ;
  

$total += $amount ;   

      } 
     
      
      if (mysqli_num_rows($records)==0) {echo" your cart is empty ";}
 
      else { 
         ?>  
        
         <h4> <?php echo "Total  ".$total ." L.E" ?>    </h4>                  <br>
      <button style="width:200px;height:35px; border-radius: 20px 20px;"; type="submit"   name="place">Place Order</button> 
      

<?php 
}

$_SESSION['t']=$total;

if(isset($_GET['place'])){

  
  

  $querry= "INSERT INTO dist_order_total(total,user) values('$total','$userid')";
  $f=mysqli_query($db,$querry);
  
  
  $o_id = mysqli_insert_id($db);
  $records = mysqli_query($db,"SELECT cartd.id, cartd.userid,cartd.frequency,cartd.amount, cartd.fert_id , fertilizers.name, fertilizers.image, fertilizers.quantity , fertilizers.price 
  FROM cartd INNER JOIN fertilizers ON cartd.fert_id = fertilizers.id WHERE cartd.userid = '$userid'");


  while($data=mysqli_fetch_array($records))
  { 
    $fert_id=$data['fert_id'];
  
    
     $id=$data['id'];
     $amount=$data['amount'];
     $frequency=$data['frequency'];
     
        $sql="INSERT INTO dist_order_items(fert_id,amount,O_id,frequency) values('$fert_id','$amount','$o_id','$frequency')";
        mysqli_query($db,$sql);
      
        $sql2 = "DELETE FROM cartd WHERE id ='$id'";
        

        mysqli_query($db,$sql2);
        header("location:dist_Orders.php");
               

} } 
        ?>
        </form> 
        <?php 

 ?>

</body>
</html>

<?php } else {header('location:login.php');} ?>