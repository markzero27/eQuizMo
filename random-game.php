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
        <h3 class="mb-2 mt-2 text-center"><?php echo $type. ' - '. $diff; ?></h3>
    </div>
    
    
    <div class="container-fluid">
    <div class="container-fluid">     
      <!-- Main-->
      <div class=" bg-transparent " id="main" >
          
        <div class="row">
            <div class="col  text-center"><label>Questions</label></div>
            <?php if($type!="Random Quiz"){ ?>
            <div class="col row ">
                 <div class="col text-center ml-5"><label>Answer</label></div> 
                 <div class="col text-left mr-5"><label>Display</label></div>  
                 
            </div>
            <?php }else{ ?>
              <div class="col row ">
                 <div class="col text-center ml-5"><label>Answer</label></div> 
                 
                 
            </div>
    
    
            <?php } ?>
        </div>
          
        <div class="Qlist">  
        
        <?php 
    
           
            if($type=="Random Quiz"){
                 $where = array(
                    "difficulty" => $diff,
                    "is_selected" => 1
                    );
            }else{
                 $where = array(
                    "difficulty" => $diff,
                    "type" => $type,
                    "is_selected" => 1
                    );
            }
            $q_row = $obj->select_sort_record("question_table",$where,"q_sequence","ASC");

            foreach ($q_row as $row){ 
            $id=$row['q_id'];
            
            ?>
        <div class="row under">
            
            <div class="col text-left ml-5 ">
               <label class="fade-scroll qlabel text-truncate"><?php echo $row['q_sequence'].". ". $row['question']; ?></label>
            </div> 
            
           <div class="col row ">

                   <form class="col row" id="form<?php echo $x ?>">
                       <div class="col <?php echo "text-center";?>">
                            <label class=""><?php echo $row['answer']; ?></label>
                       </div> 
                        <input type="hidden" name="id" value="<?php echo $id; ?>" id="id<?php echo $x;?>">
                        <input type="hidden" name="diff" value="<?php echo $row['difficulty']; ?>" id="diff<?php echo $x;?>">
                        <input type="hidden" name="type" value="<?php echo $row['type']; ?>" id="type<?php echo $x;?>">
                        <input type="hidden" name="type" value="<?php echo $row['type']; ?>" id="type<?php echo $x;?>">
                
                        <button class="col btn btn-sm btn-custom text-right btn-d" id="d<?php echo $x; ?>" name="display_button" value="display"><i class="bg-transparent fa fa-fw fa-television"></i></button>
                        <button class="col btn btn-sm btn-custom text-left btn-t" id="t<?php echo $x; ?>" name="timer_button" value="timer" disabled><i class="bg-transparent fa fa-fw fa-clock-o"></i></button> 
                            
                   </form>

                </div>
        </div>
            <?php $x++; };
        ?>
         </div>
          
          <div id="controls" class="text-center mb-2 mt-2">
            <button class=" btn btn-sm btn-custom" id="back" title="previus level" name="<?php echo $type; ?>" value="<?php echo $prev; ?>"><i class="fa fa-fw fa-mail-reply "></i></button>
            <button class=" btn btn-sm btn-custom" id="reset" title="Reset all display"><i class="fa fa-fw fa-refresh "></i></button>
            <button class=" btn btn-sm btn-custom" id="next" title="Next level" name="<?php echo $type; ?>" value="<?php echo $next; ?>" title="Next level"><i class="fa fa-fw fa-mail-forward "></i></button>
        </div>
          
        <?php 
          
          if($type=="Random Quiz"){ ?>
              <div class="text-center">
                  <button class=" btn btn-sm btn-light font-weight-bold" id="random" name="<?php echo $diff; ?>">Generate Random Question</button>
          </div>
        <?php 
          }
        ?>
        
   
      </div>
        
      <div id="timer">
<?php 

if($scrn == 1 || $scrn == 2){
                   
                
 if(!isset($_SESSION['countdown2']) || $_SESSION['countdown2'] > 15 || $_SESSION['countdown2'] < 0){

        unset( $_SESSION['time_started2']);
        $_SESSION['countdown2'] = 15;
        $_SESSION['time_started2'] = time();
    }

    $now = time();
    $timeSince = $now - $_SESSION['time_started2'];
    $remainingSeconds = abs($_SESSION['countdown2'] - $timeSince);

    if($remainingSeconds < 1){
       unset($_SESSION['time_started2']); 
        
        $sql = "SELECT * FROM display_table WHERE screen != 'display_screen'";
        $query = mysqli_query($obj->con,$sql);

        foreach($query as $row){
            $sql_update = "UPDATE display_table SET show_screen = 0 , q_id = 0 WHERE screen = '".$row['screen']."'";
            $update = mysqli_query($obj->con,$sql_update);

        }
        
        $sql_show = "UPDATE display_table SET show_screen = 9 WHERE screen = 'display_screen'";
        $show_answer = mysqli_query($obj->con,$sql_show);

    }
}else{
   unset($_SESSION['time_started2']);
   unset($_SESSION['countdown2']);
}

?>
        
        </div>
               
    
    <footer class="fixed-bottom">
          <div class="container black">
            <div class="text-center">
              <small class="black font-weight-bold">Copyright © 2018 - College of Computer Studies | Jhon Mark Daquis - Web Developer</small><br/>
            </div>
          </div>
    </footer>
        
    </div>
        
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
   
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <?php 
    
    if($scrn ==1) { ?>
        
        <script type="text/javascript">
       $(document).ready(function(){
           setInterval(function(){
               $('#timer').load(location.href + ' #time')
           }, 1000  );
       });
        </script>
        
        <?php 
    }
    
    ?>
    <script src="vendor/jquery/jquery.normal-game.js" ></script>
    <script src="js/landscape.js" ></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <!-- Custom scripts for all pages-->
  </div>
</body>

</html>
