<?php
include ('../conn.php');
session_start();
if($_SESSION['is_login']){
    $email=$_SESSION['email'];  
      }
      else{
    echo  "<script>location.href='./requester/user_login.php';</script>";
}
$sql="SELECT * FROM `submitrequest` WHERE req_id={$_SESSION['myid']}";
$res=mysqli_query($conn,$sql);
    $result=mysqli_num_rows($res);
    if($row = mysqli_fetch_assoc($res)){
    echo "<table class='table'>
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
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>".$row['req_id']."</td>
        <td>".$row['req_name']."</td>
        <td>".$row['req_info']."</td>
        <td>".$row['desc']."</td>
        <td>".$row['add1']."</td>
        <td>".$row['add2']."</td>
        <td>".$row['city']."</td>
        <td>".$row['state']."</td>
        <td>".$row['zip']."</td>
        <td>".$row['req_email']."</td>
        <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='print' onClick='window.print()'></form></td>
      </tr>
      
      
    </tbody>
  </table>";
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
</head>
<body>
    
</body>
</html>