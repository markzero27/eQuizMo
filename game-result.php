<?php 

include 'crud-operation.php';

$type = $_GET['type'];
$diff = $_GET['diff'];
$game_id = $_GET['g_id'];

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
 
  <style>
      *{
          margin: 0;
          padding: 0;
      }
   
      
      
      
    </style>
    
</head>

<body class="bg-dark">

    <div class="">   
      <!-- Main-->  
            
      <div id="main" class="bg-dark">
        <div class="container-fluid">  
           
            <table class="table table-striped table-dark mt-2">
               <thead>
                   <tr><th class="text-center" colspan="13"><h1>Score Table</h1></th></tr>
                    <tr>
                    <th class="text-center">Rank</th>
                    <th class="text-center">Team</th>
                    <th class="">1</th>
                    <th class="">2</th>
                    <th class="">3</th>
                    <th class="">4</th>
                    <th class="">5</th>
                    <th class="">6</th>
                    <th class="">7</th>
                    <th class="">8</th>
                    <th class="">9</th>
                    <th class="">10</th>
                    <th class="text-center">Total Score</th>
                   
                   </tr>
                </thead>
               
                <tbody id="load_board">
                
                
                
                <?php 

                $game_set= $obj->fetch_record('game_set');
                $last_id=end($game_set);
                $game_id=$last_id['game_id'];

                $x=1;
                $sql = "SELECT *, SUM(score) as total FROM points_table WHERE game_id = '".$game_id."' AND difficulty = '".$diff."' GROUP BY team ORDER BY total DESC";

                $score = mysqli_query($obj->con,$sql);
                if(mysqli_num_rows($score)>0){
                    while($row = mysqli_fetch_assoc($score))
                        { 

                    ?>


                    <tr>
                        <td class="text-center"><?php echo $x++;?></td>
                        <td class="text-center text-capitalize"><?php echo $row['team'];?></td>
                         <?php 
                                $score_array = array();
                                $answer_array = array();
                                $totalscore = 0;

                                $where = array("team" => $row['team'], "difficulty" => $diff);
                                $list = $obj->select_record("points_table",$where);

                                foreach($list as $sc){
                                    array_push($score_array, $sc['score']);
                                    array_push($answer_array, $sc['answer']);
                                }

                                for($i=0;$i<10;$i++){

                                    if(isset($score_array[$i])===true){
                                        if($score_array[$i]>0){
                                            echo "<td> <i class='fa fa-check text-primary' title='".$answer_array[$i]."'></i> </td>";
                                            $totalscore += $score_array[$i];
                                        }else{
                                            echo "<td> <i class='fa fa-close text-danger' title='".$answer_array[$i]."'></i> </td>";
                                        }
                                    }else{
                                        echo "<td> <i class='fa fa-clock-o text-secondary'></i> </td>";
                                    }

                                }

                            ?>
                        <td class="text-center"><?php echo $totalscore; ?></td>

                    </tr>

                <?php 

                }
            } ?>
  
                </tbody>
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
