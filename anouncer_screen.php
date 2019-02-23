<?php session_start(); include 'connection.php'; $_SESSION['screen'] = "anouncer"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <title>e-QuizMo </title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
    
  <script type="text/javascript">
       $(document).ready(function(){
           setInterval(function(){
               $('#timer').load(location.href + ' #time')
           }, 1000  );
       });
    </script>
    
  <script type="text/javascript">
       $(document).ready(function(){
           setInterval(function(){
               $('#main').load('fetch_display.php')
           }, 1000  );
       });
  </script>
    
  <style>
      
      /*bakcground*/

        #background {
            width: 100%; 
            height: 100%; 
            position: fixed; 
            left: 0px; 
            top: 0px; 
            z-index: -1; /* Ensure div tag stays behind content; -999 might work, too. */
        }

        .stretch {
            width:100%;
            height:100%;
        }

      #main{
          font-family: cursive;
          color:white;
          
      }
      
      footer{
          color: #0f0c0d;
          font-weight: bolder;
          text-shadow: 1px 1px 1px white;
          margin-top: 80px;
      }
     
      h1{
        padding-top: 30px;
        
      }
      
      #disp{
          font-size: 100px;
      }
      
      
    
    </style>
</head>

<body class="">
    
   <!-- background-->
    <div id="background">
        <img src="img/blackboard2.jpg" class="stretch" alt="" />
    </div>
    
  <!-- Navigation-->
    
    <div class="container">
    <div class="container" id="body">     
      <!-- Main-->
    <div class="jumbotron bg-transparent" id="main" > </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="fixed-bottom">
          <div class="container black">
            <div class="text-center">
              <small class="black font-weight-bold">Copyright © 2018 - College of Computer Studies | Jhon Mark Daquis - Web Developer</small><br/>
            </div>
          </div>
    </footer>
   
    <!-- Bootstrap core JavaScript-->
    
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
