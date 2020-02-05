
<?php 
session_start();

include ("functions/functions.php");
?>
<?php if(isset($_SESSION['key'])){
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Myechelon Admin -eggs</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>


 <body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Myechelon Eggs</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="tasks.php">
            <i class="fa fa-fw fa-bell"></i>
            <span class="nav-link-text">Tasks</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="tables.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Tables</span>
          </a>
        </li>
       
        
           
       
      </ul>
     <center>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           ADD<i class="fa fa-fw fa-plus"></i>
            <span class="d-lg-none">add data
              
            </span>
         
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Add Data:</h6>
            <div class="dropdown-divider"></div>
            <form action="index.php" method="post">

      <label><b>No chickens</b></label>
      <input id="input"  placeholder="Enter n/o ckicks" name="ckicks" required/>

      <label><b>eggs</b></label>
      <input id="input"  placeholder="Enter n/o eggs" name="eggs" required/>
        <label><b>food</b></label>
      <input id="input"  placeholder="Enter food expense" name="food" required/>
        <label><b>amount</b></label>
      <input id="input"  placeholder="Enter amount earned" name="amount" required/>
      
     <center> <button id="submit" class="btn-primary" type="submit" name="save">save</button></center>
      
    </div>

  </form>
          </div>
        </li>
        </ul>
        </center>
<?php

  if(isset($_POST['save'])){
 date_default_timezone_set("Africa/Cairo");
    
    $date=date("d-m-Y h:i:sa");
    $eggs = $_POST['eggs'];
    $food = $_POST['food'];
  $amount = $_POST['amount'];
  $ckicks = $_POST['ckicks'];
  $net=$amount-$food;
  $insert_product = "insert into data (date,chicken,eggs,food,amount,net) values ('$date','$ckicks','$eggs','$food','$amount','$net')";
 
     $insert_pro = mysqli_query($con, $insert_product);
      
  if ($insert_pro){
    
     echo "<div class='alert success'>
  <strong>Success!</strong>
</div>";
    echo "<script>window.open('index.php','_self')</script>";
        } 

 
}


?>
 <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
          <?php getsincome();?>


      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5"><span id="count"></span> New Task(s)!</div>

            </div>
            <a class="card-footer text-white clearfix small z-1" href="tasks.php">
              <span class="float-left">View Details</span>
              <span class="float-right nav-link">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
				 <th>Date</th>
                  <th>No chicken</th>
                  <th>No Eggs/week</th>
                  <th>Food/week</th>
                  <th>Amount/week</th>
				          <th>Net Amount</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                <th>Date</th>
                <th>No chicken</th>
                  <th>No Eggs/week</th>
                  <th>Food/week</th>
                  <th>Amount/week</th>
                  <th>Net Amount</th>
                </tr>
              </tfoot>
              <tbody>
               
               <?php getsdata(); ?> 
                
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Data Table</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Myechelon eggs 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
<script>
$(document).ready(function(){

setInterval(function(){
  $('#count').load('cnt.php')},2000);

});

</script>
<?php }else{

echo "<script>window.open('login.php','_self')</script>";}
  ?>
