<!DOCTYPE html>
<head>
<?php include('server3.php');?>
    <title>Add Crops</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="signup1.css">
    </head>
    <body>
    <?php if(count($error)>0): ?>
<div  style="color:red; text-align:center;">

<?php  foreach ($error as $error1){

echo $error1;
echo "<br>"; }   ?>
</div>

<?php endif ?>  


        <div class="main_container">
            <h1 class="signup">Add Crops</h1>
        <div class="row">
            
            <form class="row g-3" method="POST" enctype="multipart/form-data">
                <div class="col-12 ">
                    <label for="inputuname" class="form-label"> Name</label>
                    <input type="text" class="form-control"  aria-label="username"name="name"required>
                  </div>
                  
                <div class="col-md-6">
                  <label for="inputPassword4" class="form-label">Quantity</label>
                  <input type="text" class="form-control" id="inputPassword4"name="qt"required>
                </div>
            
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Price </label>
                  <input type="text" class="form-control" id="inputAddress" name="price"required >
                </div>

                <div class="col-12">
                  <label for="inputAddress" class="form-label">Image URL</label>
                  <input type="text" class="form-control" id="inputAddress" name="image"required >
                </div>
            
                <div class="col-12">
                  <button type="submit"  class="btn btn-primary sign_up_BTN" name="add">ADD</button>
                  <a style= margin:30px;text-decoration:none  href="viewcrops.php"  > Back to View page  </a>
                </div>
               



              </form>
            </div>
    </body>

    
    <?php
  
           
    if(isset($_POST['add'])){

 $name=$_POST['name'];
 $qt=$_POST['qt'];
 $price=$_POST['price'];
 $image=$_POST['image'];
  

     $sql2="INSERT INTO Cropss(name,quantity,price,image) values('$name','$qt','$price','$image')";
     mysqli_query($db,$sql2);
     header('location:viewcrops.php'); 
            
     }
 

?>