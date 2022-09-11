<?php include 'server3.php';
if (isset($_SESSION['idd'])){?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
    
</head>
<style>
    
    body {

   

background-image:url("gb.jpg") ;

background-size: cover;

background-repeat: no-repeat;

height: 100vh;

}
.adm_title{
  color:white;
    font-size:45px;
  font-family:arial;
  margin-top:3%;
  margin-left:39%

}
</style>
<body >
    <header><h2 class="adm_title" style="font-family:arial">Admin Interface </h2></header>

     
   <br><br><br>
</form>
<div class="list-group">
  <a  class="list-group-item list-group-item-action active" aria-current="true">View : </a>
  <a href="viewcrops.php" class="list-group-item list-group-item-action">crops</a>
  <a href="viewfert.php" class="list-group-item list-group-item-action">fertilizers</a>
  <a href="viewwaste.php" class="list-group-item list-group-item-action">waste</a>
  <a href="vieworderss.php" class="list-group-item list-group-item-action">suppliers' orders</a>
  <a href="viewordersd.php" class="list-group-item list-group-item-action">disributers' orders</a>
  <a href="viewdistributors.php" class="list-group-item list-group-item-action">disributers</a>
  <a href="viewsuppliers.php" class="list-group-item list-group-item-action">suppliers</a>
  
  
  
</div>
<a style ="color:white; background-color:green; "  class="btn btn-success" href="admin.php?logout='1'">Logout</a>
    


</body>
</html>

<?php } else {header('location:loginadmin.php');} ?>