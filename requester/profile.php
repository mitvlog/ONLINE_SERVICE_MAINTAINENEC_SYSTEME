<?php
include ('../conn.php');
session_start();
if($_SESSION['is_login']){
    $email=$_SESSION['email'];
    $sql="select name,email from user where email='".$email."' ";
    $res=mysqli_query($conn,$sql);
    $result=mysqli_num_rows($res);
    if($row = mysqli_fetch_assoc($res)){
     $name=$row['name'];
     $emails=$row['email'];
    }
    if(isset($_REQUEST['submit'])){
        if($_REQUEST['name']=='' ){
          echo "<script>alert('all fileds are required')</script>";
        }else{
          $name=$_REQUEST['name'];
          $result="UPDATE `user` SET `name`='$name' WHERE email='$emails'";
          $result1=mysqli_query($conn,$result);
          
          if($result1){
            echo "<script>alert('updated succesfully..')</script>";
          }else{
            echo "<script>alert('not updated..')</script>";
          }
          
        }
        
      }
}else{
    echo  "<script>location.href='./requester/user_login.php';</script>";
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
  <a href="../requester/status.php">Service Status</a>
  <a href="../requester/logout.php">Logout</a>
</div>

<div class="content" >
<form action="" method="post" style="margin:100px;">
<h3> you can update your detail here</h3>
<div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"
     name="email" readOnly value="<?php echo $emails ;?>">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>


<div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" 
    name="name"  value="<?php echo $name ;?>">
   
  </div>
  
  
  
  <button type="submit" class="btn btn-danger" name="submit">update</button>
</form>

</div>

</body>
</html>
