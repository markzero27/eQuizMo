<?php include "crud-operation.php";

session_start();


$link = "leader-board.php?diff=";

$game_set= $obj->fetch_record('game_set');

$last_id=end($game_set);
$game_id=$last_id['game_id'];

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
               $('#load_board').load('fetch_leader-board.php')
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
                   <!-- <tr><th class="text-center" colspan="13"><h1><a href="leader-board.php?diff=Hard" title="Hard" class="mr-5"><i class='fa fa-angle-left text-dark'></i></a>Leader Board</h1></th></tr> -->
                   <tr><th class="text-center" colspan="13"><h1>Quizbee Result</h1></th></tr>
                    <tr>
                    <th class="text-center text-primary">Rank</th>
                    <th class="text-center text-primary">School</th>
                    <th class="text-center text-primary">Easy</th>
                    <th class="text-center text-primary">Average</th>
                    <th class="text-center text-primary">Hard</th>
                    <th class="text-center text-primary">Total Score</th>
                    <th class="text-center text-primary">Tie-breaker</th>
                   
                   </tr>
                </thead>
                
               
                <tbody>
        <?php 

            $x=1;
            $sql = "SELECT team, rank, SUM(score) as total, SUM(tbscore) as tbtotal FROM points_table WHERE game_id = '".$game_id."' GROUP BY team ORDER BY total DESC,tbtotal DESC";
            $score = mysqli_query($obj->con,$sql);
            $num = mysqli_num_rows($score);
            if($num>0){


            while($row = mysqli_fetch_assoc($score))
                {   
                    $easy_score = 0;
                    $ave_score = 0;
                    $hd_score = 0;
                    $tb_score = 0;
                
                    $e_query = $obj->select_record_not('points_table',array('game_id'=>$game_id,'difficulty'=>'Easy','team'=>$row['team']),array('type'=>'Tie-breaker'));
                    foreach($e_query as $e_score){
                        $easy_score += $e_score['score'];
                    }
                    
                    $a_query = $obj->select_record_not('points_table',array('game_id'=>$game_id,'difficulty'=>'Average','team'=>$row['team']),array('type'=>'Tie-Breaker'));
                    foreach($a_query as $a_score){
                        $ave_score += $a_score['score'];
                    }
                    
                    $h_query = $obj->select_record_not('points_table',array('game_id'=>$game_id,'difficulty'=>'Hard','team'=>$row['team']),array('type'=>'Tie-breaker'));
                    foreach($h_query as $h_score){
                        $hd_score += $h_score['score'];
                    }

                    $tb_query = $obj->select_record('points_table',array('game_id'=>$game_id,'difficulty'=>'Hard','team'=>$row['team'],'type'=>'Tie-breaker'));

                    if(count($tb_query)>0){
                        foreach($tb_query as $t_score){
                          $tb_score += $t_score['tbscore'];
                      }
                    }else{
                      $tb_score = "-";
                    }
                    
            ?>      <tr>
                        <td class="text-center"><?php echo $row['rank']?></td>
                        <td class="text-center"><?php echo $row['team']; ?></td>
                        <td class="text-center"><?php echo $easy_score; ?></td>
                        <td class="text-center"><?php echo $ave_score; ?></td>
                        <td class="text-center"><?php echo $hd_score; ?></td>
                        
                        <td class="text-center"><?php echo $row['total']; ?></td>
                        <td class="text-center"><?php echo $tb_score; ?></td>
                    </tr>
            <?php 

                };

            }else{
                $y=1;
                $sql2 = "SELECT screen FROM display_table WHERE screen != 'Display_screen' AND screen != 'Android_screen'";
                $query2 = mysqli_query($obj->con,$sql2);

                if(mysqli_num_rows($query2)>0){
                    while($row2 = mysqli_fetch_assoc($query2)){ ?>
                        
                <tr>
                    <td class="text-center"><?php echo $x++;?></td>
                    <td class="text-center"><?php echo $row2['screen']; ?></td>
                    <td class="text-center">0</td>
                    <td class="text-center">0</td>
                    <td class="text-center">0</td>
                    <td class="text-center">0</td>
                    <td class="text-center">0</td>
                  </tr>      
                 

                  <?php  }
                }
            }

            ?>
                </tbody>
                <tfoot></tfoot>
            
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
