<!DOCTYPE html>
<html lang="en">
    
<head>
<?php include('server3.php'); 
if (isset($_SESSION['idd'])){
  ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Orders </title>
</head>
<style>
      body {

   

background-image:url("gb.jpg") ;

background-size: cover;

background-repeat: no-repeat;

height: 200vh;

}
.title{
    font-size:45px;
  font-family:arial;
  color:white;
  margin-left:41%;
  
}

.back_btn{
    margin-left:80%;
    font-size: 20px;
}
</style>
<body>
    
<h1 class="title">  Orders Details </h1>

<button  style= margin-left:80%; type="button" class="back_btn"><a style="color:red;text-decoration:none" href="vieworderss.php">Back to Orders</a></button>

<?php 

$id= $_GET['id'];

$records = mysqli_query($db,"SELECT  supp_order_items.frequency, supp_order_items.amount,supp_order_items.crops_id, cropss.name, cropss.image, cropss.quantity , cropss.price 
FROM supp_order_items INNER JOIN cropss ON supp_order_items.crops_id= cropss.id WHERE O_id ='$id'");

while($data=mysqli_fetch_array($records))
{
  


?>
<center>

<table style="color:green;border-radius:2%" border ="6"> 

<tr style="color:white;font-size:20px;">

  <td><img src="<?php echo $data['image'];?>"height=100px; width=110px; /><td>
  <td width=100px;><?php echo $data['name'];?><td>
  <td width=100px><?php echo $data['quantity'];?><td>
  <td width=100px ><?php echo "Price: " .$data['price']. " L.E";?><td>
  <td width=100px ><?php echo "Qty: " . $data['frequency'];?><td>
  <td width=150px ><?php echo "Amount: " . $data['amount']. " L.E";?><td>

 
</tr> 
</center>

</table> 
<?php } ?>




</body>
</html>
<?php } else {header('location:loginadmin.php');} ?>