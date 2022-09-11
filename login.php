<!DOCTYPE html>
<head>
<?php include('server.php');?>
    <title> signin    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="signinadmin.css">
    
</head>
<body>


  <div class="main_container" >
  <?php if(count($error)>0): ?>
<div  style="color:red; text-align:center; font-size:25px">

<?php  foreach ($error as $error1){

echo $error1;
echo "<br>"; }   ?>
</div>

<?php endif ?> 
    <h1 class="log1"> Login</h1>
    <form method="POST"> 
        <div class="form-floating mb-3 email_text">
            <input type="text" class="form-control " id="floatingInput" placeholder="name@example.com"name="un">
            <label for="floatingInput">Username </label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password"name="pw">
            <label for="floatingPassword">Password</label>
          </div>
        <br/>
        <div class="form-check radio1">
        <input class="form-check-input" type="radio" name="radio" value="Supplier" id="flexRadioDefault1" checked>
        <label style="color:white" class="form-check-label" for="flexRadioDefault1"> Supplier</label>
      </div>
      <div class="form-check radio2">
        <input class="form-check-input" type="radio" name="radio" value="Distributor" id="flexRadioDefault2" >
        <label style="color:white" class="form-check-label" for="flexRadioDefault2"> Distributor</label>
      </div>
      <br/>
        <button type="submit" class="btn btn-primary login_BTN" name="login">Login</button> 
        <button   type="button" class="back_btn"><a style="color:red;text-decoration:none" href="index.php">Back to home page</a></button>

    </form>
  </div>
</body>