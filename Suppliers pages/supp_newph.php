<!DOCTYPE html>
<head>
<?php include('server.php');
if (isset($_SESSION['id'])){?>
    <title>Add Phone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <style>
    body {

   

      background-image:linear-gradient(rgba(184, 182, 187, 0.438),rgba(194, 190, 199, 0.486)) ,url("fertilizer.jpg") ;

background-size: cover;

background-repeat: no-repeat;

height: 100vh;

}
.main_container{
/* background-color: white; */
background-color: rgb(255, 255, 255 , 0.6);
padding: 30px;
border-radius: 30px;
box-shadow: 5px 5px #D3D3D3;
opacity: 1;
width: 500px;
margin: auto;
margin-top: 100px;
}
.signup{
margin-left: 20%;
}
.sign_up_BTN{
margin-left: 40%;
}
</style>
    </head>
    <body>
    

        <div class="main_container">
            <h1 style="font-size:35px;font-family:arial">Add Phone</h1>
        <div class="row">
            
            <form class="row g-3" method="POST" enctype="multipart/form-data">
                <div class="col-12 ">
                    <label style="font-size:25px" for="inputuname" class="form-label"> New Phone</label>
                    <input type="text" class="form-control"  aria-label="username"name="ph"required>
                  </div>
                  
              
               
              
              

                <div class="col-12">
                  <button type="submit"  class="btn btn-primary sign_up_BTN" name="add">ADD</button>
                  <a style= "margin:30px; font-size:20px; text-decoration:none";  href="supp_profile.php"  > Back to Profile  </a>
                </div>
               



              </form>
            </div>
    </body>

    <?php
  
           
  if(isset($_POST['add'])){

      $id= $_GET['id']; 
               
$phone=$_POST['ph'];

$data = mysqli_query($db,"SELECT * FROM Supp_Phone WHERE phone = $phone");
if(mysqli_num_rows($data)==1){
array_push($error,"phone is already exists");
}

if(count($error)==0){

   $sql2="INSERT INTO supp_phone(phone,sid) values('$phone','$id')";
   mysqli_query($db,$sql2);
   header('location:supp_profile.php'); 
          }
   }

   if(count($error)>0): ?>
    <div  style="color:red; text-align:center; font-size:25px">
    
    <?php 
    
    
    
    foreach ($error as $error1){
    
    echo $error1;
    echo "<br>"; }   ?>
    </div>
    
    <?php endif ?>  
    </body>
</html>
<?php } else {header('location:login.php');} ?>