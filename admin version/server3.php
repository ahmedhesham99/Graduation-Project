
<?php

if (!isset($_SESSION) ){

session_start();}
$error=array();


$db=mysqli_connect('localhost','root','','projectt');


if(isset($_POST['register'])){

$username=mysqli_real_escape_string($db,$_POST['un']);
$name=mysqli_real_escape_string($db,$_POST['name']);
$password=mysqli_real_escape_string($db,$_POST['pw']);

$query="SELECT * FROM admin WHERE username='$username'";
$result=mysqli_query($db,$query);


if(mysqli_num_rows($result)==1){
    array_push($error,"username is already taken");
}


if(count($error)==0){
   


    $sql="INSERT INTO admin(username,name,password) values('$username','$name','$password')";

    mysqli_query($db,$sql);
    header('location:loginadmin.php'); }
}

if(isset($_POST['login'])){


    $username=mysqli_real_escape_string($db,$_POST['un']);
    $password=mysqli_real_escape_string($db,$_POST['pw']);

    if(empty($username)){
        array_push($error,"Usermame is required");
    }

    if(empty($password)){
        array_push($error,"Password is required");
    }

    if(count($error)==0){

        $query="SELECT * FROM admin WHERE username='$username' AND password = '$password'";
        $result=mysqli_query($db,$query);
        if(mysqli_num_rows($result)==1){

            $row = mysqli_fetch_array($result);
            $_SESSION['idd']=$row['id'];
            
         header('location:admin.php'); }

         if(mysqli_num_rows($result)==0){
            
            array_push($error,"Incorrect Username or Password"); }
        
}


}

if(isset($_GET['logout'])){

    session_destroy();
    unset($_SESSION['id']);
    header('location:loginadmin.php');
    
    
    }
        