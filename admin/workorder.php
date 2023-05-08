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
    <div class="sidebar" style="margin-top:100px;">
  <a class="active" href="" class="d-print-none">Dashboard</a>
  <a href="./workorder.php" class="d-print-none">Work Order</a>
  <a href="./requests1.php" class="d-print-none">Requests</a>
  <a href="./tech.php" class="d-print-none">Technician</a>
  <a href="./logout.php" class="d-print-none">Logout</a>
</div>
<div class="container" class="d-print-none">
<table class="table" class="d-print-none">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col" class="d-print-none">id</th>
      <th scope="col" class="d-print-none">name</th>
      <th scope="col" class="d-print-none">purchase date</th>
      <th scope="col" class="d-print-none">available product</th>
      <th scope="col" class="d-print-none">total product</th>
      <th scope="col" class="d-print-none">original price</th>
      <th scope="col" class="d-print-none">selling price</th>
      <th scope="col-2" class="d-print-none">action</th>
    </tr>
  </thead>
<?php
  include ('../conn.php');
  session_start();
if($_SESSION['is_adminlogin']){
   $email= $_SESSION['admin_email'];
}else{
    echo  "<script>location.href='./admin_login.php';</script>";
}
  $sql="select * from assign_work";
  $res=mysqli_query($conn,$sql);
  $result=mysqli_num_rows($res);
  while($row=mysqli_fetch_assoc($res)){
   
   echo "<tbody>
   <tr>
     
   <td class='d-print-none'>".$row['req_id']."</td>
   <td class='d-print-none'>".$row['req_info']."</td>
   <td class='d-print-none'>".$row['desc']."</td>
   <td class='d-print-none'>".$row['name']."</td>
   <td class='d-print-none'>".$row['add1']."</td>
   <td class='d-print-none'>".$row['add2']."</td>
   <td class='d-print-none'>".$row['city']."</td>
   <td class='d-print-none'>".$row['state']."</td>
   <td class='d-print-none'>".$row['zip']."</td>
   <td class='d-print-none'>".$row['email']."</td>
   <td class='d-print-none'>".$row['mobile']."</td>
   <td class='d-print-none'>".$row['tech_name']."</td>
   <td>
   <form action='' method='post'>
    <input  type='hidden' value=".$row['req_id']." name='id' class='d-print-none'>
    <input type='submit' class='btn btn-danger btn-sm' value='view' name='view' class='d-print-none'> 
    <input type='submit' class='btn btn-danger btn-sm' value='close' name='close'> 
   </form>
   </td>
   </tr>
   
   
 </tbody>";
  }
  if(isset($_REQUEST['view'])){
    $id=$_REQUEST['id'];
    $sql="SELECT * FROM `assign_work` WHERE req_id=$id";
    $res=mysqli_query($conn,$sql);
    $result=mysqli_num_rows($res);
        $row = mysqli_fetch_assoc($res);
          
        }
        
        if(isset($_REQUEST['close'])){
          $id=$_REQUEST['id'];
          $sql="DELETE FROM `assign_work` WHERE req_id=$id";
          $res=mysqli_query($conn,$sql);
         
                
              }
              
  
    
  ?>
  
</table>
            </div>
<div class="container" >
<form class="formy" style="margin:100px;" method="post">
  <div class="form-row" style="margin:100px;">
  <div class="form-group " style="margin:100px;">
  
      <label for="inputEmail4">Request Id</label>
      <input readOnly class="form-control" id="inputEmail4"  name="request_id" 
      value="<?php if(isset($_REQUEST['id'])){echo $_REQUEST['id'];} ?>">
   
   
 
      <label for="inputEmail4">Request Info</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="request info" name="request"
      value="<?php if(isset($row['req_info'])){echo $row['req_info'];} ?>">
   
    
      <label for="inputPassword4">description</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="description" name="description"
      value="<?php if(isset($row['desc'])){echo $row['desc'];} ?>">
   
    
      <label for="inputPassword4">Name</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="name" name="name"
      value="<?php if(isset($row['name'])){echo $row['name'];} ?>">
   
  
    <label for="inputAddress">Address 1</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address1"
    value="<?php if(isset($row['add1'])){echo $row['add1'];} ?>">
  
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="address2"
    value="<?php if(isset($row['add2'])){echo $row['add2'];} ?>">
 
    
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" name="city"
      value="<?php if(isset($row['city'])){echo $row['city'];} ?>">
   
      <label for="inputCity">State</label>
      <input type="text" class="form-control" id="inputCity" name="state" name="state"
      value="<?php if(isset($row['state'])){echo $row['state'];} ?>">
    
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip" name="zip" onkeypress="inputNum(event)"
      value="<?php if(isset($row['zip'])){echo $row['zip'];} ?>">
    
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email"
      value="<?php if(isset($row['email'])){echo $row['email'];} ?>">
    
      <label for="inputEmail4">Mobile</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="mobile" name="mobile" onkeypress="inputNum(event)"
      value="<?php if(isset($row['mobile'])){echo $row['mobile'];} ?>">
   
      <label for="inputEmail4">Assign Technician</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="technician name" name="tech" 
      value="<?php if(isset($row['tech_name'])){echo $row['tech_name'];} ?>">
   
      <label for="inputEmail4">customer signature</label>
      <input type="text" class="form-control" id="inputEmail4" >
    
      <label for="inputEmail4">technician signature</label>
      <input type="text" class="form-control" id="inputEmail4" >
      <form class='d-print-none'><input class='btn btn-danger' type='submit' value='print' onClick='window.print()'></form>
    </div>
  
 
  
 
</form>



</div>

</body>
</html>