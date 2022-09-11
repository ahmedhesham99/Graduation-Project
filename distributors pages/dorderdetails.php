<!DOCTYPE html>
<html lang="en">
    
<head>
<?php include('server.php'); 

if (isset($_SESSION['id'])){?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Orders </title>
    
</head>
<style>
 body{
    
    height: 100vh;
    background-image:linear-gradient(rgba(194, 190, 199, 0.486),rgba(194, 190, 199, 0.486)) ,url("fertilizer.jpg") ;

    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    
}
.ord_title{
  font-size:35px;
  font-family:arial;
  margin-left:42%;
  color:white;
}
.back_btn{
    margin-left:80%;
    font-size: 20px;
}

  </style>

<body>
    
<h1 class="ord_title">  Orders Details </h1>
<button  style= margin-left:80%; type="button" class="back_btn"><a style="color:red;text-decoration:none;" href="dist_orders.php">Back to previous page</a></button>


<?php 
$id= $_GET['id'];

$records = mysqli_query($db,"SELECT  dist_order_items.frequency, dist_order_items.amount,dist_order_items.fert_id, fertilizers.name, fertilizers.image, fertilizers.quantity , fertilizers.price 
FROM dist_order_items INNER JOIN fertilizers ON dist_order_items.fert_id= fertilizers.id WHERE O_id ='$id'");

while($data=mysqli_fetch_array($records))
{
  

?>
<center>

<table style="color:green" border ="6"> 

<tr style="color:white;font-size:25px;">

  <td><img src="<?php echo $data['image'];?>"height=120px; width=120px; /><td>
  <td width=350px;><?php echo $data['name'];?><td>
  <td width=100px><?php echo $data['quantity'];?><td>
  <td width=200px ><?php echo "Price: " .$data['price']. " L.E";?><td>
  <td width=100px ><?php echo "Qty: " . $data['frequency'];?><td>
  <td width=200px ><?php echo "Amount: " . $data['amount']. " L.E";?><td>

 
</tr> 
</center>

</table> 
<?php } ?>

</body>
</html>

<?php } else {header('location:login.php');} ?>