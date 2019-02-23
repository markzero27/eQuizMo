<?php

session_start();

include 'crud-operation.php';

$type = $_GET['type'];

$diff = $_GET['diff'];

if($diff=="Easy"){
    $prev="Previous";
    $next="Average";
}else if($diff=="Average"){
    $prev="Easy";
    $next="Hard";
}else if($diff=="Hard"){
    $prev="Average";
    $next="Next";
}

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
        <h3 class="mb-2 mt-2 text-center">
        <?php if($diff=='Hard'){
             echo $type. ' - Difficult'; 
        }else{
            echo $type. ' - '. $diff; 
        }
        
        ?></h3>
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
            <button class=" btn btn-sm btn-custom" id="back" title="previus level" name="<?php echo $type; ?>" value="<?php echo $prev; ?>"><i class="fa fa-fw fa-mail-reply "></i></button>
             <?php 
          
          if($type=="Random Quiz"){ ?>
              
            <button class="ml-3 mr-3 btn btn-sm btn-custom font-weight-bold" id="random" name="<?php echo $diff; ?>">Generate Random Question</button>

          
        <?php 
          }else{ ?>
            <button class=" btn btn-sm btn-custom ml-5 mr-2" id="home" title="Home"><i class="fa fa-fw fa-home "></i></button>
            <button type="button" class="btn btn-md btn-custom mr-5 ml-2" data-toggle="modal" data-target="#add_question"><i class="fa fa-fw fa-plus "></i></button>
 
        <?php } ?>
            <button class=" btn btn-sm btn-custom" id="next" title="Next level" name="<?php echo $type; ?>" value="<?php echo $next; ?>" title="Next level"><i class="fa fa-fw fa-mail-forward "></i></button>
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
                                    
                            <input type="text" class="form-control" name="filter" placeholder="Search" id="filter">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><i class="fa fa-search"></i></label>
                            </div>
                            
                        </div>
                        
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        
                            <table class="table table-hover" id="question-table">
                                <?php 

                                    $where = array(
                                        "type" => $type,
                                        "difficulty" => $diff,
                                        );
                                    $cat_row = $obj->select_record("question_table",$where);
                                    foreach ($cat_row as $row){ ?>

                                    <tbody>
                                        <tr>
                                            <td><?php echo  $row['question']; ?></td>
                                            <td><?php echo $row['answer']; ?></td>
                                            <td><input type="hidden" name="type"  value="<?php echo $type; ?>">
                                                <input type="hidden" name="<?php echo $row['q_id']; ?>"  value="0" >
                                                <input type="hidden" name="diff"  value="<?php echo $diff?> " >
                                                <input type="checkbox" name="<?php echo $row['q_id']; ?>"  value="1" <?php echo ($row['is_selected'] ==1 ? 'checked' : ''); ?> >
                                            </td>
                                        </tr>
                                    
                                    </tbody>

                                    <?php }
                                ?>
                            </table>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">CANCEL</button>
                        <input type="submit" class="btn btn-sm btn-primary" name="ongame_update" value="SELECT">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   
   
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery/jquery.normal-game-mode.js" ></script>
    <script src="js/landscape.js" ></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#filter').on('keyup',function(){
                var searchVal = $(this).val().toLowerCase();
                $('#question-table tbody tr').each(function(){
                    var textVal = $(this).text().toLowerCase();
                    if(textVal.indexOf(searchVal) === -1){
                        $(this).hide();
                    }else{
                        $(this).show();
                    }
                });
            });
        });
    </script>
    <!-- Page level plugin JavaScript-->
    <!-- Custom scripts for all pages-->
  </div>
</body>

</html>
