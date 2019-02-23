<?php 
 include 'crud-operation.php'; 

    $game_id = $_GET['game_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>e-QuizMo | Result Details</title>
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
     <?php $dif = array('Easy','Average','Hard'); for($i=0;$i<3;$i++){ ?>  
      <div class="card mb-3">
       <div class="card-header" style="background-color:#393939" >
          <span class="text-white">Game
           <?php 
           if($dif[$i]=="Hard"){
            echo $game_id." - Difficult Scores";
           }else{
            echo $game_id." - ".$dif[$i]." Scores";
           }
          ?>
           </span>
           <a target="_blank" href="pdf.php?game_id=<?php echo $game_id?>" class="text-white float-right"><i class="fa fa-fw fa-print"></i>Print</a>
          </div>
          
      
        <div class="card-body" style="background-color:#e3e3e3">
        
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Rank</th>
                      <th>Group</th>
                     <?php 
                     $qnum=20;
                      for($j=1;$j<=$qnum;$j++){
                        echo '<td>'.$j.'</td>';
                      }
                     
                     
                     
                     ?>
                      <th>Total Score</th>
                    </tr>
                  </thead>
                  <tbody>
<?php 
$x=1;
$sql = "SELECT *, SUM(score) as total FROM points_table WHERE game_id = '".$game_id."' AND difficulty = '".$dif[$i]."' AND  type != 'Tie-breaker' GROUP BY team ORDER BY total DESC";

$score = mysqli_query($obj->con,$sql);

    while($row = mysqli_fetch_assoc($score))
        { 

    ?>


    <tr>
        <td class=""><?php echo $x++;?></td>
        <td class=""><?php echo $row['team'];?></td>
         <?php 
                $score_array = array();
                $answer_array = array();
                $empty = 20;
                $where = array("team" => $row['team'], "difficulty" => $dif[$i],'game_id'=>$game_id);
                $list = $obj->select_record_not("points_table",$where,array('type'=>'Tie-breaker'));
        
                foreach($list as $sc){
                    
                    if($sc['score']>0){
                        echo "<td class='text-primary'>".$sc['answer']." <i class='fa fa-check text-primary'></i> </td>";
                    }else{
                        echo "<td class='text-danger'>".$sc['answer']." <i class='fa fa-close text-danger'></i> </td>";

                    }
                    
                    $empty--;
                }
        
                for($j=0;$j<$empty;$j++){
                    echo "<td> <i class='fa fa-clock-o text-secondary'></i> </td>";
                }

            ?>
        <td class="text-center"><?php echo $row['total']; ?></td>

    </tr>

    <?php 

    } ?>
                    
                    </tbody>
            </table>
          </div>
        </div>
          
   
          <div class="card-footer small text-right"></div>  
      </div>
         <?php } ?> 
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
