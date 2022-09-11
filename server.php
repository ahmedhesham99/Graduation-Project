<?php

if (!isset($_SESSION) ){

    session_start();}
$error=array();


$db=mysqli_connect('localhost','root','','projectt');

// distributer 

if(isset($_POST['register'])){

  
    $username=mysqli_real_escape_string($db,$_POST['un']);
    $ename=mysqli_real_escape_string($db,$_POST['ename']);
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $password=mysqli_real_escape_string($db,$_POST['pw']);
    $phone=mysqli_real_escape_string($db,$_POST['phone']);
    $location=mysqli_real_escape_string($db,$_POST['location']);

    $query="SELECT * FROM distributors WHERE username='$username'";
    $result=mysqli_query($db,$query);

    if(mysqli_num_rows($result)==1){
        array_push($error,"username is already taken");
    }

    $query2="SELECT * FROM distributors WHERE email='$email'";
    $result2=mysqli_query($db,$query2);

    if(mysqli_num_rows($result2)==1){
        array_push($error,"email is already taken");
    }

    if(empty($username)){
        array_push($error,"Usermame is required");

    }
    if(empty($ename)){
        array_push($error,"Entity name is required");
    }
    
    if(empty($email)){
        array_push($error,"Email is required");
    } 
   
    if(empty($phone)){
        array_push($error,"Phone is required");
    } 
    if(empty($location)){
        array_push($error,"location is required");
    } 
    
    if(empty($password)){
        array_push($error,"Password is required");
    }

   
  
    
    if(count($error)==0){
       
   

        $sql="INSERT INTO distributors(username,entityname,email,phone,location,password) values('$username','$ename','$email','$phone','$location','$password')";
    
        mysqli_query($db,$sql);
        header('location:login.php'); }
    }
    
    


// supplier



    if(isset($_POST['registerr'])){

        $username=mysqli_real_escape_string($db,$_POST['un']);
        $ename=mysqli_real_escape_string($db,$_POST['ename']);
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $password=mysqli_real_escape_string($db,$_POST['pw']);
        $phone=mysqli_real_escape_string($db,$_POST['phone']);
        $phone2=mysqli_real_escape_string($db,$_POST['phone2']);
        $location=mysqli_real_escape_string($db,$_POST['location']);
        $location2=mysqli_real_escape_string($db,$_POST['location2']);
        $type=mysqli_real_escape_string($db,$_POST['dropdown']);
    
    
        $query="SELECT * FROM suppliers WHERE username='$username'";
        $result=mysqli_query($db,$query);
    
        if(mysqli_num_rows($result)==1){
            array_push($error,"username is already taken");
        }
    
        $query2="SELECT * FROM suppliers WHERE email='$email'";
        $result2=mysqli_query($db,$query2);


        if(mysqli_num_rows($result2)==1){
            array_push($error,"Email is already taken");
        }
        $query3="SELECT * FROM supp_phone WHERE phone='$phone'";
        $result3=mysqli_query($db,$query3);


        if(mysqli_num_rows($result3)==1){
            array_push($error,"First phone is already taken");
        }
        
        $query4="SELECT * FROM supp_phone WHERE phone='$phone2'";
        $result4=mysqli_query($db,$query4);


        if(mysqli_num_rows($result4)==1){

            
            array_push($error,"Second phone is already taken");
        }
        if(empty($username)){
            array_push($error,"Usermame is required");
    
        }
        if(empty($ename)){
            array_push($error,"Entity name is required");
        }
        if(empty($email)){
            array_push($error,"Email is required");
        } 
        if(empty($phone)){
            array_push($error,"Phone is required");
        } 
        if(empty($location)){
            array_push($error,"location is required");
        } 
        
        if(empty($password)){
            array_push($error,"Password is required");
        }
    
        
        if(count($error)==0){
            $sql="INSERT INTO suppliers(username,entityname,email,Type,password) values('$username','$ename','$email','$type','$password')"; 
            mysqli_query($db,$sql);
    
            $supp_id = mysqli_insert_id($db);
            
    
            $sql2="INSERT INTO supp_phone(phone,sid) values('$phone','$supp_id')";
            $sql3="INSERT INTO supp_location(location,sid) values('$location','$supp_id')";
            $sql4="INSERT INTO supp_phone(phone,sid) values('$phone2','$supp_id')";
            $sql5="INSERT INTO supp_location(location,sid) values('$location2','$supp_id')";

           
            mysqli_query($db,$sql2);
            mysqli_query($db,$sql3);
            mysqli_query($db,$sql4);
            mysqli_query($db,$sql5);
            header('location:login.php');
             }
        }
        
       

        if(isset($_POST['login'])){


            $username=mysqli_real_escape_string($db,$_POST['un']);
            $password=mysqli_real_escape_string($db,$_POST['pw']);
            $radio=mysqli_real_escape_string($db,$_POST['radio']);

        
            if($radio=="Supplier"){
        
                $query="SELECT * FROM suppliers WHERE username='$username' AND password = '$password'";
                $result=mysqli_query($db,$query,);

                if(mysqli_num_rows($result)==1){

                     $row = mysqli_fetch_array($result);
                    $_SESSION['id']=$row['id'];

                 header('location:crops.php'); 
                
                 
                }
                else if (mysqli_num_rows($result)==0) { array_push($error,"Incorrect Username or Password");}
                 
               }

               else if($radio=="Distributor"){
        

                    $query="SELECT * FROM distributors WHERE username='$username' AND password = '$password'";
                    $result=mysqli_query($db,$query,);

                  
                    if(mysqli_num_rows($result)==1){
                        $row = mysqli_fetch_array($result);
                    $_SESSION['id']=$row['id'];
                        header('location:fertilizers.php'); }

                        else if (mysqli_num_rows($result)==0){    array_push($error,"Incorrect Username or Password");   }
                             }

                }
             
        

    
        
if(isset($_GET['logout'])){

    session_destroy();
    unset($_SESSION['id']);
    header('location:login.php');
    
    
    }
        

       

    
