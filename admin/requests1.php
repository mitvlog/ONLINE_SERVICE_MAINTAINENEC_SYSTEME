<?php

include ('../conn.php');
  session_start();
if($_SESSION['is_adminlogin']){
   $email= $_SESSION['admin_email'];
}else{
    echo  "<script>location.href='./admin_login.php';</script>";
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
  padding:0;
}

.sidebar {
  /* margin-top: 60px; */
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: red;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 300px;
  padding: 1px 16px;
  height: 1000px;
}
.formy{
  margin-top:100px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-sm bavbar-dark bg-danger pl-5 fixed-top" >
       <h3 style="color:white;">OSMS</h3>
       
      
    </nav>
    <div class="sidebar" >
  <a class="active" href="">Dashboard</a>
  <a href="./workorder.php">Work Order</a>
  <a href="./requests1.php">Requests</a>
  <a href="./tech.php">Technician</a>
  <a href="./logout.php">Logout</a>
</div>
<div class="container">
    <?php
    $sql="select * from submitrequest";
    $res=mysqli_query($conn,$sql);
    $result=mysqli_num_rows($res);
    while($row=mysqli_fetch_assoc($res)){
       
        echo "<div class='container'>
        <div class='row'>
        <div class='col-6'>
        <div class='card' style='width: 18rem; margin-top:100px;'>
      <div class='card-body'>
        <h5 class='card-title'>".$row['req_name']."</h5>
        <h6 class='card-subtitle  text-muted'>".$row['req_info']."</h6>
        <p class='card-text'>".$row['desc']."</p>
        <p class='card-text'>".$row['date']."</p>
        <form action='' method='post'>
        <input  type='hidden' value=".$row['req_id']." name='id'>
       <input type='submit' class='btn btn-danger btn-sm' value='view' name='view'> 
       <input type='submit' class='btn btn-danger btn-sm' value='close' name='close'> 
       </form>
      </div>
    </div>
        </div>";
        
        
       }
       
    ?>
   
   
   <?php
if(isset($_REQUEST['view'])){
  $id=$_REQUEST['id'];
  $sql="SELECT * FROM `submitrequest` WHERE req_id=$id";
  $res=mysqli_query($conn,$sql);
  $result=mysqli_num_rows($res);
      $row = mysqli_fetch_assoc($res);
        
      }
      if(isset($_REQUEST['close'])){
        $id=$_REQUEST['id'];
        echo $id;
        $sql="DELETE FROM `submitrequest` WHERE req_id=$id";
        $res=mysqli_query($conn,$sql);
       if($res){
        echo  "<script>location.href='./workorder.php';</script>";
       }
              
            } 

?>


</div>
<div class="container">
<form class="formy" method="post">
  <div class="form-row">
  <div class="form-group col-md-6">
  
      <label for="inputEmail4">Request Id</label>
      <input readOnly class="form-control" id="inputEmail4"  name="request_id" 
      value="<?php if(isset($_REQUEST['id'])){echo $_REQUEST['id'];} ?>">
    </div>
   
  <div class="form-group col-md-6">
      <label for="inputEmail4">Request Info</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="request info" name="request"
      value="<?php if(isset($row['req_info'])){echo $row['req_info'];} ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">description</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="description" name="description"
      value="<?php if(isset($row['desc'])){echo $row['desc'];} ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Name</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="name" name="name"
      value="<?php if(isset($row['req_name'])){echo $row['req_name'];} ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address 1</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address1"
    value="<?php if(isset($row['add1'])){echo $row['add1'];} ?>">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="address2"
    value="<?php if(isset($row['add2'])){echo $row['add2'];} ?>">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" name="city"
      value="<?php if(isset($row['city'])){echo $row['city'];} ?>">
    </div>
    <div class="form-group col-md-4">
    <div class="form-group col-md-6">
      <label for="inputCity">State</label>
      <input type="text" class="form-control" id="inputCity" name="state" name="state"
      value="<?php if(isset($row['state'])){echo $row['state'];} ?>">
    </div>
    
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip" name="zip" onkeypress="inputNum(event)"
      value="<?php if(isset($row['zip'])){echo $row['zip'];} ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email"
      value="<?php if(isset($row['req_email'])){echo $row['req_email'];} ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Mobile</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="mobile" name="mobile" onkeypress="inputNum(event)"
      value="<?php if(isset($row['mobile'])){echo $row['mobile'];} ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Assign Technician</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="technician name" name="tech" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Date</label>
      <input type="date" class="form-control" id="inputEmail4" placeholder="date" name="date">
    </div>
  </div>
 
  <button type="submit" class="btn btn-danger" name="submit">Submit</button>
 
</form>

</div>
<?php
 
if(isset($_REQUEST['submit'])){
    if($_REQUEST['request']=='' ||$_REQUEST['request_id']=='' || $_REQUEST['description']=='' || $_REQUEST['name']==''|| $_REQUEST['address1']==''||
     $_REQUEST['address2']==''||$_REQUEST['city']==''||$_REQUEST['state']==''||$_REQUEST['zip']==''||
     $_REQUEST['email']==''||$_REQUEST['mobile']==''||$_REQUEST['date']==''||$_REQUEST['tech']==''  ){
      echo "<script>alert('all fileds are required')</script>";
    }else{
      $request_id=$_REQUEST['request_id'];
      $request=$_REQUEST['request'];
      $description=$_REQUEST['description'];
      $name=$_REQUEST['name'];
      $address1=$_REQUEST['address1'];
      $address2=$_REQUEST['address2'];
      $city=$_REQUEST['city'];
      $state=$_REQUEST['state'];
      $zip=$_REQUEST['zip'];
      $email=$_REQUEST['email'];
      $mobile=$_REQUEST['mobile'];
      $tech=$_REQUEST['tech'];
      $date=$_REQUEST['date'];
      $result="INSERT INTO `assign_work`(`assign_id`, `req_id`, `req_info`, `desc`, `name`,
       `add1`, `add2`, `city`, `state`, `zip`, `email`, `mobile`, `tech_name`, `date`) 
       VALUES ('','$request_id','$request','$description','$name',
      '$address1','$address2','$city','$state','$zip','$email',
      '$mobile','$tech','$date')";
      $result1=mysqli_query($conn,$result);
      
      
    }
    
  }

?>

</body>
</html>