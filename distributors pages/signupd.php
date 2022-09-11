<!DOCTYPE html>
<head>
<?php include('server.php');?>
    <title>Signup distributer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="signup1.css">
    </head>
    <body>



    <?php if(count($error)>0): ?>
<div  style="color:red; text-align:center; font-size:25px;">

<?php  foreach ($error as $error1){

echo $error1;
echo "<br>"; }   ?>
</div>

<?php endif ?>  


        <div class="main_container">
            <h1 class="signup">Distributor's Signup</h1>
        <div class="row">

            
            <form class="row g-3" method="POST">
                <div class="col-12 ">
                    <label for="inputuname" class="form-label"> username</label>
                    <input type="text" class="form-control" placeholder="username" aria-label="username" name="un"required>
                  </div>
                  
                <div class="col-md-6">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" class="form-control" id="inputEmail4"  name ="email">
                </div>
                <div class="col-md-6">
                  <label for="inputPassword4" class="form-label">Password</label>
                  <input type="password" class="form-control" id="inputPassword4" name="pw"required>
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Address</label>
                  <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="location"required>
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Entity Name</label>
                  <input type="text" class="form-control" id="inputAddress"name="ename" >
                </div>
                <div class="col-12">
                  <label for="inputAddress2" class="form-label">Phone Number</label>
                  <input type="text" class="form-control" id="inputAddress2" placeholder="01xxxxxxxx" name="phone"required>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary sign_up_BTN" name="register">Sign UP</button>
</div>
<div>
                  <button type="submit" class="btn btn-primary sign_up_BTN" name="registerr"><a style="color:white; text-decoration:none;" href="index.php">back to home page</a></button>
                
                </div>
              </form>
            </div>
    </body>
  </div>
</body>