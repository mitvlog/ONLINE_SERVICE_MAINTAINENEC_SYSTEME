<?php
include ('../conn.php');
session_start();
if($_SESSION['is_login']){
    $email=$_SESSION['email'];  
      }
      else{
    echo  "<script>location.href='./requester/user_login.php';</script>";
}
if(isset($_REQUEST['submit'])){
    if($_REQUEST['request']=='' || $_REQUEST['description']=='' || $_REQUEST['name']==''|| $_REQUEST['address1']==''||
     $_REQUEST['address2']==''||$_REQUEST['city']==''||$_REQUEST['state']==''||$_REQUEST['zip']==''||
     $_REQUEST['email']==''||$_REQUEST['mobile']==''||$_REQUEST['date']=='' ){
      echo "<script>alert('all fileds are required')</script>";
    }else{
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
      $date=$_REQUEST['date'];
      $result="INSERT INTO `submitrequest`(`req_id`, `req_info`, `desc`, 
      `req_name`, `add1`, `add2`, `city`, `state`, `zip`, `req_email`, `mobile`, `date`)
       VALUES ('','$request','$description','$name',
      '$address1','$address2','$city','$state',$zip,
      '$email',$mobile,'$date')";
      $result1=mysqli_query($conn,$result);
      
      if($result1){
        $genid=mysqli_insert_id($conn);
        echo "<script>alert('requeste inserted..')</script>";
        $_SESSION['myid']=$genid;
        echo  "<script>location.href='./success.php';</script>";
      }else{
        echo "<script>alert('not inserted..')</script>";
      }
      
    }
    
  }

?>




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  margin-top: 60px;
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
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}
.formy{
    margin:100px;
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
  <a class="active" href="../requester/profile.php">Profile</a>
  <a href="../requester/submitrequest.php">Submit Request</a>
  <a href="./status.php">Service Status</a>
  <a href="./logout.php">Logout</a>
</div>

<div class="content" >
<form class="formy">
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputEmail4">Request Info</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="request info" name="request">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">description</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="description" name="description">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Name</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="name" name="name">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address 1</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address1">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="address2">
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
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip" name="zip" onkeypress="inputNum(event)">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Mobile</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="mobile" name="mobile" onkeypress="inputNum(event)">
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
