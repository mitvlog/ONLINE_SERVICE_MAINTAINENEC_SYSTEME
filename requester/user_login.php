<?php
include('../conn.php');
session_start();
if(!isset($_SESSION['is_login'])){
if(isset($_REQUEST['submit'])){
  
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];
    $sql="select email,password from user where email='".$email."' AND password='".$password."' limit 1";
    $res=mysqli_query($conn,$sql);
    $result=mysqli_num_rows($res);
   if($result){
     $_SESSION['is_login']=true;
     $_SESSION['email']=$email;
    echo  "<script>location.href='./profile.php';</script>";
   }else{
    echo "<script>alert('invalid credential..')</script>";
   }
   
    
  }
}else{
  echo  "<script>location.href='./profile.php';</script>";
}
  

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OSMS</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
 
</head>
<body>
    
    
<div class="container" style="margin:80px;">
<form action="" method="post">
<h3> Login Here</h3>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  
  <button type="submit" class="btn btn-danger" name="submit">login</button>
  <button class="button btn-danger btn-sm"> <a class="nav-link" href="./index.php" style="color:white;">Back to home</a></button>
</form>

</div>


</body>
</html>