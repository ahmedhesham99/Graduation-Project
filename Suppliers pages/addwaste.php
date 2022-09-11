<!DOCTYPE html>
<head>
<?php include('server.php');
if (isset($_SESSION['id'])){?>
    <title>Waste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<style>
        html,body {
    
   height: 100%;
   background-image:linear-gradient(rgba(184, 182, 187, 0.438),rgba(194, 190, 199, 0.486)) ,url("fertilizer.jpg") ;
   background-position: center;
   background-size: cover;
   background-repeat: no-repeat;
}
.back_btn{
    margin-left:80%;
    font-size: 20px;
}
</style>
<body>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Discount details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
        1-If you provide us with 1.5 tons, you will get a 5% discount<br>
  2-If you provide us with 2.5 tons, you will get a 8% discount<br>
  3-If you provide us with 3.5 tons, you will get a 10% discount<br>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

        <div class="main_container" style="width:70%; margin-left: 15%;">
            <h1 class="signup">Waste Food</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Discount details
</button>
        <div class="row">
            
            <form class="row g-3" method="POST">
            <div class="col-12">
                  Type
                <select name = " dropdown">   
             <option value = "Fruits"> Fruits</option>
             <option value = "Vegetables"> Vegetables</option>
             <option value = "Cooked"> Cooked</option>
             </select>
               </div>


                <div class="col-12 ">
                    <label for="inputuname" class="form-label"> Name</label>
                    <input type="text" class="form-control" placeholder="Description" aria-label="username"name="name"required>
                  </div>
                  
              
                
                <div class="col-12">
                  <label for="inputAddress" class="form-label"> Weight In Kilos</label>
                  <input type="text" class="form-control"  placeholder="Only Numbers" id="inputAddress" name="qt"required >
                </div>
              

                <div class="col-12">
                  <button type="submit" class="btn btn-primary sign_up_BTN" name="send"required>Send</button>
                  <button  style= margin-left:80%;height:40px type="button" class="back_btn"><a style="color:red;text-decoration:none;" href="crops.php">Back to previous page</a></button>
                </div>
            </div>
    <?php
     $discount = 0;
     $percentage= "" ; 
   
    $errors=array();
    
    if(isset($_POST['send'])){

     
            
 $name=mysqli_real_escape_string($db,$_POST['name']);
 $qt=$_POST['qt'];
 $type=mysqli_real_escape_string($db,$_POST['dropdown']);
 $userid = $_SESSION['id'];

  
 if ( filter_var($qt, FILTER_VALIDATE_INT) === false )

 {
   array_push($errors,"Please Enter Weight in Numbers");
 } 
 if (preg_match('/[^A-Za-z ]/', $name)){
  array_push($errors,"Please Enter the description in only english");
} 


  if($qt<50){
  array_push($errors,"Minimum 50 kilos");
} 


if(count($errors)==0){

 if ($qt >1499   and $qt <2500) { $discount=0.05; $percentage="5%";} 
 else if ($qt >2499  and $qt <3500) {$discount=0.08;$percentage="8%";}
 else if ($qt >3499 )                  {$discount=0.10; $percentage="10%";}
 else {$percentage = "0%";}

     $sql2="INSERT INTO waste(name,quantity,supp_id,Type,discount) values('$name','$qt','$userid','$type','$discount')";
     mysqli_query($db,$sql2);
     $wasteid = mysqli_insert_id($db);

     if ($discount>=0.05){
     $sql3="INSERT INTO discount(num,percentage,user_id,wasteid) values('$discount','$percentage','$userid','$wasteid')"; 
    
     mysqli_query($db,$sql3);}        
     header('location:wastesent.php'); 

     
     }}

     if(count($errors)>0): ?>
      <div  style="color:red; text-align:center; font-size:25px;">
      
      <?php 
      foreach ($errors as $error1){
      
      echo $error1;
      echo "<br>"; }   ?>
      </div>
      
      <?php endif ?>  
      </form>
      </body>
      </html>
      <?php } else {header('location:login.php');} ?>
