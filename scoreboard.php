<?php include "connection.php";

session_start();

if(isset($_GET['diff'])){
    $_SESSION['difficulty'] = $_GET['diff'];  
}else{
    $_SESSION['difficulty'] = "Easy";
}

$diff=$_SESSION['difficulty'];
if($diff=="Hard"){
  $dif="Difficult";
}else{
  $dif=$diff;
}

if($diff=="Easy"){
    $left = "Hard";
    $right = "Average";
}else if($diff=="Average"){
    $left = "Easy";
    $right = "Hard";
}else if($diff=="Hard"){
    $left = "Average";
    $right = "Easy";
}

if(!isset($_GET['Tiebreaker'])){
  $link = "fetch_scoreboard.php";
  $header = "Scoreboard";
}else{
  $link = "fetch_tiebreaker.php";
  $header = "Tie-Breaker Score";
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
               $('#load_board').load('<?php echo $link?>')
           }, 1000  );
       });
    </script>
  <style>
      *{
          margin: 0;
          padding: 0;
      }
   
      
      
      
    </style>
    
</head>

<body class="fixed-nav sticky-footer bg-dark sidenav-toggled">

  <!-- Navigation-->
    <?php include "nabvar.php"?>    
    <div class="">   
      <!-- Main-->  
            
      <div id="main" class="content-wrapper bg-secondary">
        <div class="container-fluid">  
           
            <table class="table table-striped table-dark mt-2">
               <thead>
                   <tr><th class="text-center" colspan="23"><h1><a href="scoreboard.php?diff=<?php echo $left; ?>" title="<?php echo $left; ?>" class="mr-5"><i class='fa fa-angle-left text-dark'></i></a> <?php echo $header." - ".$dif; ?><a href="scoreboard.php?diff=<?php echo $right?>" title="<?php echo $right; ?>" class="ml-5"><i class='fa fa-angle-right text-dark'></i></a></h1></th></tr>
                    <tr>
                    <!-- <th class="text-center">Rank</th> -->
                    <th class="text-center">School</th>
                    <?php
                    
                    for($i=1;$i<=20;$i++){
                      echo '<th class="text-center">'.$i.'</th>';
                    }
                    
                    ?>
                    <th class="text-center">Total Score</th>
                   
                   </tr>
                </thead>
               
                <tbody id="load_board"></tbody>
                <tfoot> <tr><td colspan="13" class="text-center"></td></tr></tfoot>
            
            </table>
          </div>
 
   
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
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </div>
</body>

</html>
