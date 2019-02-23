<?PHP 

include "crud-operation.php";

$game_set= $obj->fetch_record('game_set');

$last_id=end($game_set);
$game_id=$last_id['game_id'];


$query = mysqli_query($obj->con,"SELECT team, rank FROM points_table WHERE game_id = '".$game_id."' and type != 'Tie-Breaker' GROUP BY team ORDER BY rank ASC");
$num = mysqli_num_rows($query);

if($num>0){


while($row = mysqli_fetch_assoc($query))
    {   
        if($row['rank']>3 || $row['rank']==0){
            $obj->delete_record('display_table',array('screen'=>$row['team']));
        }
    }
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
  <link href="css/normal-game.css" rel="stylesheet">
    
</head>

<body class="bg-dark">

<div class="container">
    <div class="container">     
      <!-- Main-->
      <div class=" bg-secondary my-3">
      <table class="table table-dark table-striped">
      <thead>
      <tr><th class="text-center" colspan="13"><h1>Top 3 Groups</h1></th></tr>
      <tr>
        <th class="text-right">Rank</th>
        <th class="text-center">Groups</th>
        <th class="text-left">Score</th>
      </tr>
      </thead>
      <tbody>
      <?php 
        $sql = "SELECT team, rank, SUM(score) as total FROM points_table WHERE game_id = '".$game_id."' and type != 'Tie-Breaker' GROUP BY team ORDER BY rank ASC";
        $score = mysqli_query($obj->con,$sql);
        $num = mysqli_num_rows($score);
        if($num>0):
            while($row = mysqli_fetch_assoc($score)): 
                $loggedinQuery = $obj->select_record('display_table',array('screen'=>$row['team']));
                
                if(count($loggedinQuery)>0):?>

<tr>
            <td class="text-right"><?php echo $row['rank']?></td>
            <td class="text-center"><span><?php echo $row['team']?></span><br><button class="btn btn-sm btn-danger w-25" title = "remove" data-toggle="modal" data-target="#remove<?php echo $row['team']; ?>"></button></td>
            <td class="text-left"><?php echo $row['total'] ?></td>
            <div id="remove<?php echo $row['team']; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="Crud.php" method="post">
                            <div class="modal-header bg-dark text-white"><h5>Remove <?php echo $row['team']; ?> ?</h5>
                                <button type="button" class="close text-white" data-dismiss="modal">&times;</button></div>
                            <div class="modal-body bg-dark text-white" >This group will be remove from the current game. Are you sure?
                            <input type="hidden" name="team" value="<?php echo $row['team']; ?>">
                            </div>
                        <div class="modal-footer bg-dark text-white">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <input type="submit" name="logout_top3" value="remove" class="btn btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                    
        </tr>

        <?php 
                endif; 
            endwhile;
        endif;
        ?>
        
      </tbody>
      
      </table>
      
      </div>
      <div class="text-center">
      <button class="btn btn-lg btn-primary w-50 mb-5" id="start">Tie-breaker</button>
      </div>
    
        
     <footer class="fixed-bottom bg-dark">
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

       
        $(document).on('click','#start',function(){
            window.location.href = "tie-breaker.php";
        });


    </script>   
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
  </div>
</body>

</html>
