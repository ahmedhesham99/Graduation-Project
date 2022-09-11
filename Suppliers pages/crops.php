<?php include('server.php'); 


if (isset($_SESSION['id'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crops</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <style>
        h1{color:green;}
        header{border:thin solid black; height:100;}
        article{border:thin solid black; height:500;}
        footer{border:thin solid black; height:50;text-align:center;}
        li{display:inline;}
        a{margin-right:30px;}
        .vertical{text-align:center; float:left; width:300px; margin-top:30px; height:400px;}
        .add-cart{
            position: absolute;
           
            
            transition: all 0.1 ease-in-out;
            text-decoration: none;
            cursor: pointer;
            text-align: center;
            color: black;
            border-style:solid;
            border-radius:20px;
            padding:9px;
            margin-left:-40px;
          }
            
            .cart ion-icon{
    vertical-align: bottom;
    font-size:20px;
    padding-right: 5px;
}

.border{border-color: rgb(33, 175, 33) ;
}

    .fertilizers{
        background-image: url('sun.jpeg');
        background-repeat: no-repeat;
        height: 250px;
        width: 100%;
        background-size: cover;
        background-position: center;
     }
     li a {
        padding: 5px;
        background-color: white;
        text-decoration: none;
       
    } 
    

        </style>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</head>
<body>
<header  class=fertilizers> <a style="text-decoration:none;" href="crops.php"> <h1> Crops </h1></a> <br><br>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a style="color:green" class="navbar-brand" href="supp_profile.php">Profile</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a style="color:green" class="nav-link active" aria-current="page" href="Supp_Orders.php">My orders</a>
        </li>
        <li class="nav-item">
          <a style="color:green" class="nav-link" href="addwaste.php">Send waste food</a>
        </li>
        <li class="nav-item">
          <a style="color:green" class="nav-link" href="wastesent.php">Waste have been sent</a>
        </li>
        <li class="nav-item">
          <a style="color:green" class="nav-link" href="disc.php">Discounts</a>
        </li>
        <li class="nav-item">
          <a style="color:green" class="nav-link" href="cart.php">Cart</a>
        </li> 
      </ul>
    </div>
    <form class="d-flex" role="search" method="POST">
      <input class="form-control me-2" name="search" type="search" placeholder="Search by name" aria-label="Search">
      <input type="submit" name="submit" value="Search Me!" class="border">
    </form>
    
    
    
  </div>
 <a class="btn btn-success" href="crops.php?logout='1'">Logout</a>

</nav>

</header>

<article>

<?php 


if(isset($_POST['submit'])){

  $st= $_POST['search'];
  

  $query= "SELECT * FROM cropss WHERE name LIKE '%$st%'";
  $q= mysqli_query($db,$query);


  while ($result = mysqli_fetch_array($q)){

  
?>

<div class ="vertical">

<img src="<?php echo $result ['image'];?>"height=200px; margin-left:50px; /><br>
<?php echo @$result  ['name'];?><br>
<?php echo @$result ['quantity'];?><br>
<?php echo @$result ['price']." EGP";?> 
<br>
<a class=" add-cart cart1" href="inspect.php?id=<?php echo$result['id'];?>">Add cart</a> <br> <br> <br>

</div>


<?php

}  


    }


    else {
?>



<?php

$product="SELECT * FROM cropss";
$query=mysqli_query($db,$product);
$result = mysqli_fetch_array($query);


do {

?>

<div class ="vertical">

<img src="<?php echo $result ['image'];?>"height=200px; margin-left:50px; /><br>
<?php echo @$result  ['name'];?><br>
<?php echo @$result ['quantity'];?><br>
<?php echo @$result ['price']." EGP";?> 
<br>
<a class=" add-cart cart1" href="inspect.php?id=<?php echo$result['id'];?>">Add cart</a> <br> <br> <br>

</div>

<?php
 } while ($result =mysqli_fetch_array($query));
}
?>

</article>


</body>
</html>



<?php } else {header('location:login.php');} ?>






















