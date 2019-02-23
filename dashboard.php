<?php 

include "crud-operation.php";

$game_check = $obj->fetch_record("game_set");
if(count($game_check)==0){
   $obj->insert_record('game_set',array('game_id'=>NULL,'game_type'=>''));
   header("location:dashboard.php");
}else{
    $game = end($game_check);
    $obj->update_record('game_set',array('game_id'=>$game['game_id']),array('is_locked'=>0));
}
$query = $obj->fetch_record("display_table");

foreach($query as $row){
    $where = array('screen'=>$row['screen']);
    $fields = array('show_screen' => 0,'q_id' => 0,'difficulty'=>'');
    $update = $obj->update_record('display_table',$where,$fields);
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>e-QuizMo | Dashboard</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <style>
    
    #mode a{
        color: #ffffff;
      }
      #mode a:hover{
          color: #252526;
          text-decoration:inherit;
      }
      
      #main{
          background: url('img/blackboard3.png') no-repeat;
          background-position:center;
          background-size:contain; 
          background-color:#f4f2f2;
      }
    
    </style>
</head>

<body class="fixed-nav sticky-footer" id="page-top">
  <!-- Navigation-->
  
    <?php include "nabvar.php"?>
    <div class="content-wrapper">
    <div class="container-fluid">     
      <!-- Main-->
      <div class="jumbotron text-center" id="main">
        <h1 style="color:white;">e-QuizMo</h1>
        <p style="color:#bebdbd">Quizbee Made-Easy</p>
      </div>
    
        <div class="" id="mode">
        <div class="mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body"> 
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="text-center"><a href="quiz-level.php?type=Multiple Choice"><h3>Multiple Choice</h3></a></div>
            </div>
          </div>
        </div> 

        <div class="mb-3">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body"> 
              <div class="card-body-icon">
                <i class="fa fa-fw fa-pencil-square-o"></i>
              </div>
              <div class="text-center"><a href="quiz-level.php?type=Short Answer"><h3>Short Answer</h3></a></div>
            </div>
          </div>
        </div>

         <div class="mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body"> 
              <div class="card-body-icon">
                <i class="fa fa-fw fa-random"></i>
              </div>
              <div class="text-center"><a href="quiz-level.php?type=Random Quiz"><h3>Random Quiz</h3></a></div>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body"> 
              <div class="card-body-icon">
                <i class="fa fa-fw fa-delicious"></i>
              </div>
              <div class="text-center"><a href="quiz-level.php?type=Custom Quiz"><h3>Custom Quiz</h3></a></div>
            </div>
          </div>
        </div>

        </div>
        <!--Mode-->
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer bg-dark">
      <div class="container">
        <div class="text-center">
           <small class="text-white font-weight-bold">Copyright © 2018 - College of Computer Studies | Jhon Mark Daquis - Web Developer</small><br/>
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
            <a class="btn btn-primary" href="index.php">Logout</a>
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
