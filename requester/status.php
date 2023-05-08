


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bavbar-dark bg-danger pl-5 fixed-top" >
       <h3 style="color:white;">OSMS</h3>
       
      
    </nav>
<div class="sidebar"  class='d-print-none'>
  <a class="active" href="../requester/profile.php"  class='d-print-none'>Profile</a>
  <a href="../requester/submitrequest.php"  class='d-print-none'>Submit Request</a>
  <a href="./status.php"  class='d-print-none'>Service Status</a>
  <a href="../requester/logout.php"  class='d-print-none'>Logout</a>
</div>
<div class="content" >
<form action="" method="post" style="margin:100px;"  class='d-print-none'>
<h3> check status</h3>
<div class="form-group">
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter id"
     name="status" >
     <button type="submit" class="btn btn-danger" name="submit">submit</button>
</div>
  

</form>
<?php
include ('../conn.php');
session_start();
if($_SESSION['is_login']){
    $email=$_SESSION['email'];  
      }
      else{
    echo  "<script>location.href='./user_login.php';</script>";
}
if(isset($_REQUEST['status'])){
    $id=$_REQUEST['status'];
    $sql="SELECT * FROM `assign_work` WHERE req_id=$id";
    $res=mysqli_query($conn,$sql);
    $result=mysqli_num_rows($res);
    $row=mysqli_fetch_assoc($res);
    if($row){
        echo "<table class='table-sm' style='margin:100px;'>
        <thead>
          <tr>
            <th scope='col'>id</th>
            <th scope='col'>Name</th>
            <th scope='col'>Info</th>
            <th scope='col'>Description</th>
            <th scope='col'>Address1</th>
            <th scope='col'>Address2</th>
            <th scope='col'>City</th>
            <th scope='col'>State</th>
            <th scope='col'>Zip</th>
            <th scope='col'>email</th>
            <th scope='col'>technician name</th>
            <th scope='col'>assign date</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>".$row['req_id']."</td>
            <td>".$row['name']."</td>
            <td>".$row['req_info']."</td>
            <td>".$row['desc']."</td>
            <td>".$row['add1']."</td>
            <td>".$row['add2']."</td>
            <td>".$row['city']."</td>
            <td>".$row['state']."</td>
            <td>".$row['zip']."</td>
            <td>".$row['email']."</td>
            <td>".$row['tech_name']."</td>
            <td>".$row['date']."</td>
            <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='print' onClick='window.print()'></form></td>
          </tr>
          
          
        </tbody>
      </table>";
    }

}
?>

</div>
</body>
</html>
