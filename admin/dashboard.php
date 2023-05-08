
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
<div class="container" id="piku">

<table class="table">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
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
  $sql="select * from user";
  $res=mysqli_query($conn,$sql);
  $result=mysqli_num_rows($res);
  while($row=mysqli_fetch_assoc($res)){
   
   echo "<tbody>
   <tr>
     
   <td>".$row['user_id']."</td>
   <td>".$row['name']."</td>
   <td>".$row['email']."</td>
   </tr>
   
   
 </tbody>";
  }

  ?>
  
</table>


</div>


</body>
</html>
