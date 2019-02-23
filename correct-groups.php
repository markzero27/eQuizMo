<?php 

include "crud-operation.php";


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
   /* function play_sound() {
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', '/soundclip/notif.mp3');
        audioElement.setAttribute('autoplay', 'autoplay');
        audioElement.load();
        audioElement.play();
    }*/
        
        var beep = new Audio();
        beep.src = "soundclip/notif.mp3";
        beep.load(); 
        
        
    </script>
    <style>
    
        #main{
             height: 550px;
            overflow: auto;
        }
    </style>

</head>

<body class="fixed-nav sticky-footer bg-dark sidenav-toggled">

  <!-- Navigation-->
    <?php include "nabvar.php"?>    
    <div class="top">   
      <!-- Main-->  
            
      <div  class="content-wrapper bg-secondary">
        <div id="main" class="container-fluid">  
           
            <?php
                $game_array = array();
                $game_query = $obj->fetch_record('game_set');
                $game_array = end($game_query);
                $game_id = $game_array['game_id'];
    
                $points_array = array();
                $points_query = $obj->select_record('points_table',array('game_id'=>$game_id));
                $points_array = end($points_query);
                $q_id = $points_array['q_id'];
                
                $question_array = array();
                $question_query = $obj->select_record('question_table',array('q_id'=>$q_id));
                $question_array = end($question_query);
                $question = $question_array['question'];
                $answer = $question_array['answer'];
                
            ?>
            
            <table class="table table-striped table-dark mt-2">
               <thead>
                   <tr><th class="text-center" colspan="13"><h1><?php echo $question; ?></h1></th></tr>
                    <tr>
                    <th class="text-center">School</th>
                    <th class="text-center">Answer</th>
                    <th class="text-center">Correct</th>
                   
                   </tr>
                </thead>
                 <tbody id='t-body'>
            <?php
                $i=0;
                $answer_query = $obj->select_record('points_table',array('q_id'=>$q_id,'game_id'=>$game_id));
            ?>
                <script type="text/javascript">
                var fa = "";
                var points_db = <?php echo json_encode($answer_query);?>;
                var questArr = <?php echo json_encode($question_array);?>;
                var correct_answer = questArr.answer.toLowerCase();
                var points_row = Array();
                var value_row = Array();
                var i = 0;
                var j = points_db.length;
                    
                    
                    
                function checkAnswer(){
                   
                    Check = setInterval(function(){
                        points_row = points_db[i];
                        team = points_row.team;
                        answer = points_row.answer.toLowerCase();
                        if(answer.trim() == correct_answer.trim()){
                                fa = "check text-primary";
                           }else{
                               fa = "close text-danger";
                           }
                        beep.play();
                        $('#t-body').append('<tr><td class="text-center">'+team+'</td><td class="text-center">'+points_row.answer+'</td><td class="text-center"><i class="fa fa-'+fa+'"></i></td></tr>');
                       
                        $("#main").scrollTop($("#main")[0].scrollHeight);
                        
                    i++; 
                    if(i>j){
                        stopChecking();
                       }
                    },1300);
                   
                    
                       
                }
                    
                function stopChecking(){
                    clearInterval(Check);
                }
            
                $(document).on('click','#refresh',function(){
                    $('#main').load(location.reload());
                  });
                
                checkAnswer();
                    
                </script>
                
                </tbody>
                <tfoot> <tr><td colspan="13" class="text-center"><button class="btn btn-lg bg-transparent" id="refresh"><i class="fa fa-refresh text-secondary"></i></button></td></tr></tfoot>
            
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
