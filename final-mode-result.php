<?PHP 

include "crud-operation.php";

$type = $_GET['type'];

$prev="Hard";

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
  <link href="css/normal-game.css" rel="stylesheet">
    
</head>

<body class="bg-dark">

    <div class="container-fluid">
    <div class="container-fluid">     
      <!-- Main-->
      <div class="" >
            
            <table class="table table-striped table-dark mt-2">
               <thead>
                   <tr><th class="text-center" colspan="13"><h1><?php echo $type." - Result"?></h1></th></tr>
                    <tr>
                    <th class="text-center">Rank</th>
                    <th class="text-center">School</th>
                    <th class="text-center">Easy</th>
                    <th class="text-center">Average</th>
                    <th class="text-center">Difficult</th>
                    <th class="text-center">Tie-breaker</th>
                    <th class="text-center">Total Score</th>
                   
                   </tr>
                </thead>
                
               
                <tbody>
        <?php 

            $x=0;
            $prev_sc = 0;
            $sql = "SELECT team, SUM(score) as total, SUM(tbscore) as tbtotal FROM points_table WHERE game_id = '".$game_id."' GROUP BY team ORDER BY total DESC, tbtotal DESC";
            $score = mysqli_query($obj->con,$sql);
            $num = mysqli_num_rows($score);
            if($num>0){


            while($row = mysqli_fetch_assoc($score))
                {   
                    $easy_score = 0;
                    $ave_score = 0;
                    $hd_score = 0;
                    $tb_score = 0;
                    $total_score = $row['total'];
                    $total_tbscore = $row['tbtotal'];

                    $e_query = $obj->select_record_not('points_table',array('game_id'=>$game_id,'difficulty'=>'Easy','team'=>$row['team']),array('type'=>'Tie-breaker'));
                    foreach($e_query as $e_score){
                        $easy_score += $e_score['score'];
                    }
                    
                    $a_query = $obj->select_record_not('points_table',array('game_id'=>$game_id,'difficulty'=>'Average','team'=>$row['team']),array('type'=>'Tie-breaker'));
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

                    if($x<4){
                        if($total_score!=$prev_sc){
                            $x++;
                        }else{
                            if($tb_score!=$prev_tb){
                                $x++;
                                
                            }
                        }
                    }else{
                        $x++;
                    }
                    $prev_tb = $tb_score;
                    $prev_sc = $total_score;
                    $update_rank = $obj->update_record('points_table',array('game_id'=>$game_id,'team'=>$row['team']),array('rank'=>$x));


            ?>      <tr>
                        <td class="text-center"><?php echo $x;?></td>
                        <td class="text-center"><?php echo $row['team']; ?></td>
                        <td class="text-center"><?php echo $easy_score; ?></td>
                        <td class="text-center"><?php echo $ave_score; ?></td>
                        <td class="text-center"><?php echo $hd_score; ?></td>
                        <td class="text-center"><?php echo $tb_score; ?></td>
                        <td class="text-center"><?php echo $total_score ?></td>
                    </tr>
            <?php 

                };

            }else{
                $y=1;
                $sql2 = "SELECT team_name FROM account_table WHERE team_name != 'admin'";
                $query2 = mysqli_query($obj->con,$sql2);

                if(mysqli_num_rows($query2)>0){
                    while($row2 = mysqli_fetch_assoc($query2)){ ?>
                        
                <tr>
                    <td class="text-center"><?php echo $y++;?></td>
                    <td class="text-center"><?php echo $row2['team_name']; ?></td>
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
                <tfoot> <tr><td colspan="13" class="text-center">
                    <div>
                          <div class="text-center mb-2 mt-2">
                            <?php 
                            if($type!="Tie-breaker"){?>
                                <button class=" btn btn-sm btn-custom" id="back" title="previus page" name="<?php echo $type; ?>" value="<?php echo $prev; ?>"><i class="fa fa-fw fa-mail-reply "></i></button>
                            <?php 
                            }
                            ?>

                            <button class=" btn btn-sm btn-custom" id="tie-breaker" title="Tie-Breaker" name="tie-breaker" value=""><i class="fa fa-fw fa-trophy "></i></button>

                            <button class=" btn btn-sm btn-custom" id="end" title="Finish game" name="end" value=""><i class="fa fa-fw fa-flag "></i></button>
                            
                            <button class=" btn btn-sm btn-custom" id="print" title="Print result" name="" value=""><i class="fa fa-fw fa-print "></i></button>
                        </div>
                    </div>
                    
                    
                    
                    </td></tr></tfoot>
            
            </table>
        
    </div>
</div>
        
     <footer class="fixed-bottom">
      <div class="container">
        <div class="text-center mb-1">
          <small class="font-weight-bold text-white">Copyright © 2018 - College of Computer Studies | Jhon Mark Daquis - Web Developer</small><br/>
        </div>
      </div>
    </footer>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript">
       
        $(document).on('click','#end',function(){
            window.location.href = "finish-game.php";
        });

        $(document).on('click','#tie-breaker',function(){
            window.open("tie.php");
        });

        $(document).on('click','#print',function(){
            window.open("pdf.php");
        });

        $(document).on('click','#back',function(){
      
        if(this.value=="Previous"){
                window.location.href = "quiz-level.php?type="+this.name;
            }else{
                window.location.href = "normal-game.php?diff="+this.value+"&type="+this.name;
            }
        
        });

    </script>   
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
  </div>
</body>

</html>
