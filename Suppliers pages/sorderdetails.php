<!DOCTYPE html>
<html lang="en">
    
<head>
<?php include('server.php');

if (isset($_SESSION['id'])){
  ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Orders </title>
    
</head>
<style>
        body {
    
          height: 200vh;
   background-image:linear-gradient(rgba(184, 182, 187, 0.438),rgba(194, 190, 199, 0.486)) ,url("fertilizer.jpg") ;
   background-position: center;
   background-size: cover;
   background-repeat: no-repeat;
}
.back_btn{
    margin-left:80%;
    font-size: 20px;
}
.title{
    font-size:45px;
  font-family:arial;
  margin-left:38%;
   color:white;
}
</style>

<body>
    
<h1 class="title">  Orders Details </h1>


<button  style= margin-left:80%; type="button" class="back_btn"><a style="color:red;text-decoration:none;" href="Supp_orders.php">Back to Orders</a></button>

<?php 
$id= $_GET['id'];

$records = mysqli_query($db,"SELECT  supp_order_items.frequency, supp_order_items.amount,supp_order_items.crops_id, cropss.name, cropss.image, cropss.quantity , cropss.price 
FROM supp_order_items INNER JOIN cropss ON supp_order_items.crops_id= cropss.id WHERE O_id ='$id'");

while($data=mysqli_fetch_array($records))
{
  


?>
<center>

<table  style="color:green" border ="6"> 

<tr style="color:white;font-size:22px;">

  <td><img src="<?php echo $data['image'];?>"height=100px; width=110px; /><td>
  <td width=100px;><?php echo $data['name'];?><td>
  <td width=100px><?php echo $data['quantity'];?><td>
  <td width=180px ><?php echo "Price: " .$data['price']. " L.E";?><td>
  <td width=100px ><?php echo "Qty: " . $data['frequency'];?><td>
  <td width=200px ><?php echo "Amount: " . $data['amount']. " L.E";?><td>

 
</tr> 
</center>

</table> 
<?php } ?>




</body>
</html>
<?php } else {header('location:login.php');} ?>