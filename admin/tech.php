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
#piku{
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
<?php
 include ('../conn.php');
 session_start();
if($_SESSION['is_adminlogin']){
  $email= $_SESSION['admin_email'];
}else{
   echo  "<script>location.href='./admin_login.php';</script>";
}
if(isset($_REQUEST['submit'])){
    if( $_REQUEST['name']==''|| $_REQUEST['address']==''||
     $_REQUEST['city']==''||$_REQUEST['state']==''||$_REQUEST['zip']==''||
     $_REQUEST['email']==''||$_REQUEST['mobile']==''||$_REQUEST['date']=='' ||$_REQUEST['aadhar']==''  ){
      echo "<script>alert('all fileds are required')</script>";
    }else{
      $name=$_REQUEST['name'];
      $address=$_REQUEST['address1'];
      $city=$_REQUEST['city'];
      $state=$_REQUEST['state'];
      $zip=$_REQUEST['zip'];
      $email=$_REQUEST['email'];
      $mobile=$_REQUEST['mobile'];
     $aadhar=$_REQUEST['aadhar'];
      $date=$_REQUEST['date'];
      $result="INSERT INTO `technician`(`tech_id`, `name`, `email`, `mobile`, `add`, `city`, `state`, `aadhar_no`, `zip`, `date`)
       VALUES ('','$name','$email','$mobile','$address','$city','$state','$aadhar',
       '$zip','$date')";
      $result1=mysqli_query($conn,$result);
      
      
    }
    
  }

?>
<div class="container" >
<form class="formy" method="post" style="margin:100px;">
  <div class="form-row">
  
    
    <div class="form-group col-md-6">
      <label for="inputPassword4">Name</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="name" name="name">
    </div>
  </div>
  <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Mobile</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="mobile" name="mobile" onkeypress="inputNum(event)">
    </div>
  <div class="form-group">
    <label for="inputAddress">Address </label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" name="city">
    </div>
    <div class="form-group col-md-4">
    <div class="form-group col-md-6">
      <label for="inputCity">State</label>
      <input type="text" class="form-control" id="inputCity" name="state" name="state">
    </div>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">aadhar no</label>
      <input type="text" class="form-control" id="inputZip" name="aadhar" onkeypress="inputNum(event)">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip" name="zip" onkeypress="inputNum(event)">
    </div>
    
    <div class="form-group col-md-6">
      <label for="inputEmail4">Date</label>
      <input type="date" class="form-control" id="inputEmail4" placeholder="date" name="date">
    </div>
  </div>
 
  <button type="submit" class="btn btn-danger" name="submit">Submit</button>
</form>
</div>
<script>
    function inputNum(evt){
        var ch=String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
    }
</script>
</body>
</html>