

<?php 
session_start();

include ("functions/functions.php");
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin - Login</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
<center>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="" method="post">
         
          <div class="form-group">
            <label for="exampleInputPassword1" >Password</label>
            <input class="form-control" id="exampleInputPassword1" name="pass" type="password" placeholder="Password">
          </div>
          
          </div>
          <input class="btn btn-primary btn-block" name="login" type="submit" value="login">
        </form>
        
      </div>
    </div>
  </div>
  </center>



 <?php
  
  if(isset($_POST['login'])){
      
     
    $pass = $_POST['pass'];
    
               
    $sel_c = "select * from admin where pass='$pass' ";
    
    $run_c = mysqli_query($con, $sel_c);
    $row = mysqli_fetch_array($run_c);
      $pss =$row['pass'];
      
    

    $check_customer = mysqli_num_rows($run_c);
    
    if($check_customer==0){
      
 
      
    exit();  
    }
    
   else{
    
    $_SESSION['key']=$pss;
  
     echo "<script>window.open('index.php','_self')</script>";
       
    
        
     
   }
  }




?>





  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
