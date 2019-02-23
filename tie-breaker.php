<?php

session_start();

include 'crud-operation.php';

$type = "Tie-breaker";

$game_set= $obj->fetch_record('game_set');
$last_id=end($game_set);
$game_id=$last_id['game_id'];

$obj->update_record('game_set',array('game_id'=>$game_id),array('game_type'=>$type));

$diff = "Hard";
$_SESSION['diff'] = $diff;

$x=1;

$fetch = $obj->select_record("display_table",array("screen"=>"android_screen"));
foreach($fetch as $scr){
    $scrn=$scr['show_screen'];
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

<body class="bg-transparent">
  <!-- background-->
    <div id="background">
        <img src="img/blackboard2.jpg" class="stretch" alt="" />
    </div>
 <!-- Navigation-->
    <div class="navbar navbar-nav fixed-top" id="nav">
        <h3 class="mb-2 mt-2 text-center">Tie Breaker</h3>
    </div>
    
    
    <div class="container-fluid">
    <div class="container-fluid">     
      <!-- Main-->
      <div class=" bg-transparent " id="main" >
          
        <div class="row">
            <div class="col  text-center"><label>Questions</label></div>
            <div class="col row ">
                 <div class="col text-center ml-5"><label>Answer</label></div> 
                 <div class="col ml-5"><label>Command</label></div>  
                 
            </div>
        </div>
          
        <div class="Qlist">  
        
        <?php 
    
           
            $where = array(
                "difficulty" => $diff,
                "is_selected" => 1
                );
            
            $done_arr = array();
            
            
            $q_row = $obj->select_sort_record("question_table",$where,"q_sequence","ASC");
            if(count($q_row)>0){
                foreach ($q_row as $row){
                    array_push($done_arr,$row['is_done']);
                }
                $last_done = end($done_arr);
            }
            
            
            
            foreach ($q_row as $row){ 
            $id=$row['q_id'];

            ?>
        <div class="row under">
            
            <div class="col text-left ml-5 ">
               <label class="fade-scroll qlabel text-truncate"><?php echo $row['q_sequence'].". ". $row['question']; ?></label>
            </div> 
            
           <div class="col row ">

                   <form class="col row" id="form<?php echo $x ?>">
                       <div class="col text-right">
                            <label class=""><?php echo $row['answer']; ?></label>
                       </div> 
                        <input type="hidden" name="id" value="<?php echo $id; ?>" id="id<?php echo $x;?>">
                        <input type="hidden" name="diff" value="<?php echo $row['difficulty']; ?>" id="diff<?php echo $x;?>">
                        <input type="hidden" name="type" value="<?php echo $row['type']; ?>" id="type<?php echo $x;?>">
                        <input type="hidden" name="qtimer" value="<?php echo $row['timer']; ?>" id="qtimer<?php echo $x;?>">
                       <?php 
                       
                            if($row['is_done']==0){   ?>
                        
                            <button class="col btn btn-sm btn-custom text-right btn-d" id="d<?php echo $x; ?>" title="Display Question" name="display_button" value="display"><i class="bg-transparent fa fa-fw fa-television"></i></button>
                            <button class="col btn btn-sm btn-custom text-left btn-t" id="t<?php echo $x; ?>" title="Start Timer" name="timer_button" value="timer" disabled><i class="bg-transparent fa fa-fw fa-clock-o"></i></button>

                       <?php  }else{ ?>
                            <button class="col btn btn-sm btn-custom text-right btn-d" id="d<?php echo $x; ?>" title="Display Question" name="display_button" value="display" disabled><i class="bg-transparent fa fa-fw fa-check"></i></button>
                            <button class="col btn btn-sm btn-custom text-left btn-t" id="t<?php echo $x; ?>" title="Start Timer" name="timer_button" value="timer" disabled><i class="bg-transparent fa fa-fw fa-check"></i></button>
                        <?php } ?>
                        
                   </form>

                </div>
        </div>
            <?php $x++; };
        ?>
         </div>

        <div id="controls" class="text-center mb-2 mt-2">
            
            <button class=" btn btn-md btn-custom mx-3" id="home" title="Home"><i class="fa fa-fw fa-home "></i></button>

            <button class=" btn btn-md btn-custom mx-3" id="random" title="Random Question" name="<?php echo $diff; ?>"><i class="fa fa-fw fa-refresh "></i></button>

            <button class="btn btn-md btn-custom mx-3" id="addQ" title="Add questions" data-toggle="modal" data-target="#add_question"><i class="fa fa-fw fa-plus "></i></button>

            <button class="btn btn-md btn-custom mx-3" id="result" title="Results" ><i class="fa fa-fw fa-trophy "></i></button>
          
 
        </div>
   
      </div>
    
    <footer class="fixed-bottom">
          <div class="container black">
            <div class="text-center">
              <small class="black font-weight-bold">Copyright © 2018 - College of Computer Studies | Jhon Mark Daquis - Web Developer</small><br/>
            </div>
          </div>
    </footer>
        
    </div>
    
    <div id="add_question" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="Crud.php" method="post">
                    <div class="modal-header">
                        <div class="input-group mb-2">
                                    
                            <input type="text" class="form-control search_question" name="search_question" placeholder="Search Question">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><i class="fa fa-search"></i></label>
                            </div>
                            
                        </div>
                        
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        
                            <table class="table table-hover">
                                <?php 

                                    $where = array( "difficulty" => $diff);
                                    $cat_row = $obj->select_record("question_table",$where);
                                    foreach ($cat_row as $row){ ?>

                                    <tr>
                                        <td><?php echo  $row['question']; ?></td>
                                        <td><?php echo $row['answer']; ?></td>
                                        <td><input type="hidden" name="type"  value="<?php echo $type; ?>">
                                            <input type="hidden" name="<?php echo $row['q_id']; ?>"  value="0" >
                                            <input type="hidden" name="diff"  value="<?php echo $diff?> " >
                                            <input type="checkbox" name="<?php echo $row['q_id']; ?>"  value="1" <?php echo ($row['is_selected'] ==1 ? 'checked' : ''); ?> >
                                        </td>
                                    </tr>

                                    <?php }
                                ?>
                            </table>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">CANCEL</button>
                        <input type="submit" class="btn btn-sm btn-primary" name="tiebreak_update" value="SELECT">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
   
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery/jquery.tie-breaker.js" ></script>
    <script src="js/landscape.js" ></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <!-- Custom scripts for all pages-->
  </div>
</body>

</html>
