<?php 
 include 'crud-operation.php'; 

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>e-QuizMo | Results</title>
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
  <?php include "nabvar.php" ?>
  <div class="content-wrapper bg-secondary">
    <div class="container-fluid">
    
  <?php 
       
        $game_sql = "SELECT * FROM points_table GROUP BY game_id ORDER BY game_id DESC";
        $game_query = $obj->query_record($game_sql);
        
        if(count($game_query)<1){
            echo "<div class='mt-5'><h1 class='text-center' mt-5>No quiz record to show! </h1></div>";
        }
    
        foreach($game_query as $game){ 
        $type_query = $obj->select_record('game_set',array('game_id'=>$game['game_id']));
        $current_type = current($type_query);
        ?>
        
        
        
      <div class="card mb-3">
       <div class="card-header" style="background-color:#393939" >
          <span style="color:white">Game <?php echo $game['game_id']; ?> Results - <?php echo $current_type['game_type'];?></span></div>
        <div class="card-body" style="background-color:#e3e3e3">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Rank</th>
                      <th>Group</th>
                      <th>Easy</th>
                      <th>Average</th>
                      <th>Difficult</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                     
                <?php 
                    $rank = 1;
                    $query = $obj->query_record("SELECT DISTINCT team,SUM(score) as total from points_table WHERE game_id = ".$game['game_id']." GROUP BY team ORDER BY total DESC");
                    foreach ($query as $row){  ?>
                    
                  <tr>
                        <td><?php echo $rank++; ?></td>
                        <td><?php echo $row['team']; ?></td>
                      
                        <td><?php 
                            
                           $q1 = $obj->query_record("SELECT SUM(score) as total FROM points_table WHERE team = '".$row['team']."' and difficulty = 'Easy' and game_id = '".$game['game_id']."' GROUP BY team");
                            foreach($q1 as $easy){
                                echo $easy['total'];
                                
                            } ?></td>
                      
                        <td><?php 
                            
                           $q2 = $obj->query_record("SELECT SUM(score) as total FROM points_table WHERE team = '".$row['team']."' and difficulty = 'Average' and game_id = '".$game['game_id']."' GROUP BY team");
                            foreach($q2 as $ave){
                                echo $ave['total'];
                                
                            } ?></td>
                        
                        <td><?php 
                            
                           $q3 = $obj->query_record("SELECT SUM(score) as total FROM points_table WHERE team = '".$row['team']."' and difficulty = 'Hard' and game_id = '".$game['game_id']."' GROUP BY team");
                            foreach($q3 as $hard){
                                echo $hard['total'];
                              
                            } ?></td>
                        <td> <?php echo  $row['total'];?></td>
                    </tr>
                    
                    <?php }
                ?>
                  
              </tbody>
            </table>
          </div>
        </div>
          <div class="card-footer small text-right"><a href="result-details.php?game_id=<?php echo $game['game_id']; ?>" class="btn btn-sm text-dark font-weight-bold">View details<i class="font-weight-bold fa fa-fw fa-angle-right"></i></a> </div>  
      </div>
        
            <?php }?>  
    </div>
      
    <!-- /.container-fluid-->
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
