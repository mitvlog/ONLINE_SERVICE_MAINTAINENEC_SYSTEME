<?php
include ('conn.php');
if(isset($_REQUEST['submit'])){
  if($_REQUEST['name']=='' || $_REQUEST['email']=='' || $_REQUEST['password']==''){
    echo "<script>alert('all fileds are required')</script>";
  }else{
    $email=$_REQUEST['email'];
    $result="SELECT `user_id`, `name`, `email`, `password` FROM `user` WHERE email='$email'";
    $result1=mysqli_query($conn,$result);
    $result2=mysqli_num_rows($result1);
    if($result2){
      echo "<script>alert('email already existed..please login instead')</script>";
    }else{
      $name=$_REQUEST['name'];
      $password=$_REQUEST['password'];
      $sql="INSERT INTO `user`(`user_id`, `name`, `email`, `password`) VALUES ('','$name','$email','$password')";
      $res=mysqli_query($conn,$sql);
    }
    
  }
  
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
    <nav class="navbar navbar-expand-sm bavbar-dark bg-danger pl-5 fixed-top" >
       <h3 style="color:white;">OSMS</h3><span style="color:white;"> customer's happiness is our aim</span>
       
       <ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" href="#" style="color:white;">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#" style="color:white;">Services</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#" style="color:white;">Registration</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./requester/user_login.php" style="color:white;">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#" style="color:white;">Contact us</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./admin/admin_login.php" style="color:white;">Admin Login</a>
  </li>
</ul>
    </nav>
    <header>
        <div class="container" style="margin:80px;">
            <div class="row" >
                <div class="col-6">
                <h1 style="color:red;">welcome to OSMS</h1>
     <button class="button btn-danger btn-sm"> <a class="nav-link" href="./requester/user_login.php" style="color:white;">Login</a></button>
     <button class="button btn-success btn-sm">sign up</button>
                </div>
                <div class="col-6">
               <h4 style="color:red;">our services</h4>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique incidunt maxime obcaecati, id eligendi nulla voluptatibus minus magnam.
     Recusandae ut natus explicabo modi, facilis dolore voluptatum provident tempora minus autem?</p>
                </div>
            </div>
        </div>
     
</header>
<div class="container">
<form action="" method="post">
<h3> Register Here</h3>
<div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="name">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  
  <button type="submit" class="btn btn-danger" name="submit">Submit</button>
</form>

</div>
<div class="container">
<h3 style="margin:auto;">our happy customers</h3>
<div class="jumbotron">
   
  <div class="container ">
    <div class="row">
        <div class="col-6">
  <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="./images/image2.webp" alt="Card image cap">
  <div class="card-body">
    
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
</div>
  </div>
</div>
<div class="col-6">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="./images/image3.avif" alt="Card image cap">
  <div class="card-body">
    
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
</div>
  </div>
</div>
  </div>
</div>
</div>

<div class="container">
<form action="" method="post">
    <h3> contact form</h3>
<div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="name">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">subject</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter subject" name="subject">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter description" name="name">

    </textarea>
</div>
  
  <button type="submit" class="btn btn-danger">Submit</button>
</form>

</div>
</body>
</html>