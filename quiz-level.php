<?php

session_start();

include "crud-operation.php";

$type = $_GET['type'];

$link = "normal-game.php";

$game_set= $obj->fetch_record('game_set');
$last_id=end($game_set);
$game_id=$last_id['game_id'];

$set_game= $obj->update_record('game_set',array('game_id'=>$game_id),array('game_type'=>$type,'is_locked'=>1));

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
  <style>
      #background {
        width: 100%; 
        height: 100%; 
        position: fixed; 
        left: 0px; 
        top: 0px; 
        z-index: -1; /* Ensure div tag stays behind content; -999 might work, too. */
      }
      
      .stretch {
        width:100%;
        height:100%;
      }
      
      #main{
          padding-top: 32px;
      }
      
      #main a{
        color: #ffffff;
      }
      
      #main a:hover{
          color: #5454db;
          text-decoration:inherit;
      }
      
      #main h1{
          color:white;
          font-size: 35px;
      }
      
      #main h4{
          color:white;
          font-size: 12px;
      }
      
      #main h5{
           color: #ff426e;
           font-size: 14px;
      }
      
      #main p{
          color:#9f8585;
          font-size: 10px;
      }
      
      #main i{
          font-size: 20px;
      }
      small{
          color: #362d2d;
          font-size: 6px;
      }

      
          
@media only screen and (min-width: 768px){
        
    #main{
          padding-top: 60px;
          font-family: cursive;
      }
      
      #main a{
        color: #ffffff;
          
      }
      
      
      #main h4:hover{
          color: #5454db;
          text-decoration:inherit;
      }
      
      #main h1{
          color:white;
          font-size: 80px;
      }
    
      #main h4{
          color:white;
          font-size: 40px;
      }
    
      #main i{
          color:white;
          font-size: 40px;
          margin-top: 30px;
      }
      
    
      #main h5{
           color: #ff426e;
           font-size: 30px;
           margin-bottom: 30px;
           text-shadow: 2px 2px 2px black;
      }

    
      small{
          color: #362d2d;
          font-size: 12px;
      }

      footer{
          padding-top: 20px;
      }    
      
}
    
    </style>
</head>

<body class="bg-dark">
    <!-- background-->
    <div id="background">
        <img src="img/blackboard2.jpg" class="stretch" alt="" />
    </div>    
    
  <!-- Navigation-->
    
    <div class="container">
    <div class="container-fluid">     
      <!-- Main-->
      <div class=" text-center bg-transparent mt-3" id="main" >
        <h1>e-QuizMo</h1>
        <h5><?php echo $type; ?></h5>
        <div class="text-center"><a href="<?php echo $link.'?diff=Easy'.'&type='.$type; ?>"><h4>Easy 
        </h4></a></div>
        <div class="text-center"><a href="<?php echo $link.'?diff=Average'.'&type='.$type; ?>"><h4>Average </h4></a></div>
        <div class="text-center"><a href="<?php echo $link.'?diff=Hard'.'&type='.$type; ?>"><h4>Difficult </h4></a></div>
          <div class="text-center ">
              
              <a href="dashboard.php" title="Dashboard"><i class="fa fa-fw fa-home"></i></a>
              <?php if($type!="Random Quiz"){
    
                    echo '<a href="question-select.php?type='.$type.'" title="Select Questions"><i class="fa fa-fw fa-gear"></i></a></div>';
                        
                }else{
                     echo '<a href="reset-random.php" title="Reset Questions"><i class="fa fa-fw fa-refresh"></i></a></div>';
                    
                }
              ?>
              
          </div>  
        </div>  
        
         <footer>
              <div class="container">
                <div class="text-center">
                  <small class="text-white">Copyright © 2018 - College of Computer Studies</small><br/>
                  <small class="text-white">Jhon Mark Daquis - Web Developer</small>
                </div>
              </div>
        </footer>
    </div>
    <!-- /.container-fluid-->
    <!-- /.container-->
    
  
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </div>
</body>

</html>
