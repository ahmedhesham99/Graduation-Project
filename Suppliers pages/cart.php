<?php include("server.php");
if (isset($_SESSION['id'])){ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
          html {
    
   height: 200vh;
   background-image:linear-gradient(rgba(184, 182, 187, 0.438),rgba(194, 190, 199, 0.486)) ,url("fertilizer.jpg") ;
   background-position: center;
   background-size: cover;
   background-repeat: no-repeat;
}
.title{
         color:white;
        font-family:arial;
        margin-left:45%;
        font-size:40px;
}

.back_btn{ 
    margin-left:60%;
    font-size: 20px;
}
</style>
</head>
<body style="color:white; font-size:22px;">
<h3 class="title">My cart</h3>
    <div >

    <button  style= margin-left:80%; type="button" class="back_btn"><a style="color:red ; text-decoration:none;" href="crops.php">Back to interface</a></button>

</div>
<?php


$userid=$_SESSION['id'];

$records = mysqli_query($db,"SELECT cart.id, cart.userid,cart.frequency,cart.amount  , cropss.name, cropss.image, cropss.quantity , cropss.price 

  FROM cart INNER JOIN cropss ON cart.crops_id = cropss.id WHERE cart.userid = '$userid'");

$total=0;
$totalafter=0;

while($data=mysqli_fetch_array($records))
{
  


?>
<center>

<table style="color:green" border ="3"> 

<tr tr style="color:white;font-size:22px;">

  <td><img src="<?php echo $data['image'];?>"height=100px; width=100px; /><td>
  <td width=100px;><?php echo $data['name'];?><td>
  <td width=100px><?php echo $data['quantity'];?><td>
  <td width=150px ><?php echo "Price: " .$data['price'];?><td>
  <td width=150px ><?php echo "Qty: " . $data['frequency'];?><td>
  <td width=150px ><?php echo "Amount: " . $data['amount'];?><td>
  <td width=100px> <a style="color:red;text-decoration:none" href="deletecart.php?id=<?php echo $data['id'];?>" >  Remove</a> <td> 
  
</tr> 
</center>

</table> 
<br>
<form > 

<?php
$amount=$data['amount'] ;


$total += $amount ;   


      } 
     
      if (mysqli_num_rows($records)==0)    {echo" your cart is empty! ";}   
      else { 

        $resulttt = mysqli_query($db,"SELECT * FROM discount WHERE user_id ='$userid' and status = 'Available' ");
        if  (mysqli_num_rows($resulttt)==0) {echo " Sorry No Available Discounts";}
        else {
        $i=0;
        while($dataa=mysqli_fetch_array($resulttt))    {
          if ($i==0){echo "Your Available Discounts"; $i=1;}
          ?>
           
          <div style="margin-top:5px;" >
          <input class="form-check-input" type="radio" name="discid" value="<?php echo  $dataa['id'];?>" id="flexRadioDefault1" >
           <a style="color:black; text-decoration:none;">  <label class="form-check-label" for="flexRadioDefault1 " >   <?php echo $dataa['percentage']; ?> </label></a>
           <a style="color:pink; text-decoration:none;"  href="disccart.php?id=<?php echo $dataa['id'];?>" > click here for details</a> <?php  if (@$_SESSION['discid']==$dataa['id']) {echo "   Applied"; } ?>
         
        </div>
        
        <?php
        }    
       
        ?>
<br>
<button style="color:red ; text-decoration:none; width:100pxpx; height:30px; " type="submit"   name="disc">Apply Discount</button>
<button style="color:red ; text-decoration:none; width:100pxpx; height:30px;" type="submit"   name="ddisc">Remove Discount</button>
      

<?php 
}


if(isset($_GET['disc'])){

  @$discidd=mysqli_real_escape_string($db,$_GET['discid']);
  if(empty($discidd)){
    echo "please select a discount";
} 
else {
  $qry1 = mysqli_query($db,"SELECT * FROM discount WHERE id =$discidd");
  $dataaa=mysqli_fetch_array($qry1);
  $discount= $dataaa['num'];
$_SESSION['discid'] = $dataaa['id'];
$_SESSION['discountt'] = $dataaa['num'];
@header("location:cart.php");



}

}
$discount=0;
$totaldisc=0;
@$discount=$_SESSION['discountt'];
$totaldisc= $discount * $total;
$totalafter=$total - $totaldisc;


if(isset($_GET['ddisc'])){

$_SESSION['discid'] = 0;
$_SESSION['discountt'] = 0;
@header("location:cart.php");


}
     
         ?>  
        
         <h4> <?php echo "Total  ".$total ." L.E" ?>    </h4>      
         <h4> <?php echo " Discount  ".$totaldisc ." L.E" ?>    </h4>           
         <h4> <?php echo " Total After Disc.  ".$totalafter ." L.E" ?>    </h4>             <br>
      <button style=" font-size:25px; color:black;  border-radius: 20px 20px;" type="submit"   name="place">Place Order</button> 
      

   
      
<?php 




if(isset($_GET['place'])){

  $discid=$_SESSION['discid'];
  $querry= "INSERT INTO supp_order_total(total,user,discount) values('$totalafter','$userid','$totaldisc')";
  $f=mysqli_query($db,$querry);
  
  $o_id = mysqli_insert_id($db);
  $records = mysqli_query($db,"SELECT cart.id, cart.userid,cart.frequency,cart.amount, cart.crops_id , cropss.name, cropss.image, cropss.quantity , cropss.price 

  FROM cart INNER JOIN cropss ON cart.crops_id = cropss.id WHERE cart.userid = '$userid'");

  while($data=mysqli_fetch_array($records))
  { 
    
     $crops_id=$data['crops_id'];
     $id=$data['id'];
     $amount=$data['amount'];
     $frequency=$data['frequency'];
     
        $sql="INSERT INTO supp_order_items(crops_id,amount,O_id,frequency) values('$crops_id','$amount','$o_id','$frequency')";
        mysqli_query($db,$sql);
      
        $sql2 = "DELETE FROM cart WHERE id ='$id'";
        mysqli_query($db,$sql2);

       if ($discid>0){$sql3="UPDATE discount SET status='used'  WHERE id ='$discid'";
        $edit = mysqli_query($db,$sql3);} 
        $_SESSION['discountt'] = 0;
       @header("location:Supp_Orders.php");
               

} } 
        ?>
        </form> 
<?php 
} 
 ?>

</body>
</html>
<?php } else {header('location:login.php');} ?>