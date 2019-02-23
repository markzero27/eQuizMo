<?php 
session_start();

if(!isset($_SESSION['team'])){
   header("location:index.php");
}else{
    $team = $_SESSION['team'];
}
include 'crud-operation.php';

$android_screen = 0;
$fetch_id = "SELECT show_screen, q_id FROM display_table WHERE screen ='".$team."'";
$query_id = mysqli_query($obj->con,$fetch_id);
if(mysqli_num_rows($query_id) > 0){

    while($row = mysqli_fetch_assoc($query_id)){
        $android_screen=$row['show_screen'];
        $_SESSION['id']=$row['q_id'];
    }
}


mysqli_close($obj->con);      
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1,  maximum-scale=1.0, user-scalable=0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>e-QuizMo</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <script>
   
    var a,b;
      

            
        function startMain(){
            b = setInterval(function(){
               $('#main').load("fetch_android.php")
           }, 1000  );
        }
        
        function stopTimer(){
            clearInterval(b);
        }
        
        startMain();
      
    </script>
  <style>
    body {
        background: url('img/bg4.jpg') no-repeat; 
        background-position:center;
        background-size:cover; 
    }
    #paper{
          position: sticky;
          background-color: white;
          margin-top: 20px;
          border: 15px solid sandybrown;
          box-shadow: 2px 10px 5px 1px black;
          
        -webkit-box-shadow: inset 2px 0px 110px 19px rgba(0,0,0,0.33);
        -moz-box-shadow: inset 2px 0px 110px 19px rgba(0,0,0,0.33);
        box-shadow: inset 2px 0px 110px 19px rgba(0,0,0,0.33);
          }
      
      form{
          box-shadow: 0 0 5px 5px #984c0c;
          padding: 15px;
      }

      input{
            display:none;
      }
      
      
    .btn-custom {
      color: #000000;
      background-color: transparent;
      box-shadow: 2px 2px 8px black;
      font-size: 5vw;
      padding: 10px;
    }

      #b-submit{
         width: 70px;
      }
      .big{
          font-size: 50px;
      }.big-icon{
          font-size: 50vw;
          margin: 10vw 0;
      }
      
      #timer{
          color: #bfdbf4;
          padding-top: 20px;
          font-family:cursive;
          font-weight: 900;   
      }
      footer{
          color: white;
          font-size: 12px;
      }
      
    
        
</style>
 
</head>
    
<body id="page-top">

    <div class="container-fluid">
    <div class="container-fluid">
        
         <div id="timer" class=" text-center">
          <div id="time">...
          </div>
        </div>
        <div id="main"> 
      
            <div class=" text-center" id="paper">
               <form action="answer_crud.php" method="post">
                    <div class="mb-4 mt-4"><i class="big-icon fa fa-clock-o"></i></div>
                </form>
            </div>
            
        </div>
        
        <!-- <div class="text-center mt-3">
         <button class="text-white  btn btn-sm bg-transparent" data-toggle="modal" data-target="#logoutModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</button>
        </div>
       
            
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
              <div class="modal-header">
                <h5 class="modal-title text-white" id="logoutModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="text-white">×</span>
                </button>
              </div>
              <div class="modal-body bg-secondary text-white">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer bg-dark">
                <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-secondary btn-sm" href="logout.php?team=<?php echo $team?>">Logout</a>
              </div>
            </div>
          </div>
        </div> -->
    <footer class="">
          <div class="container mt-3 mb-3">
            <div class="text-center">
              <small class=" font-weight-bold">Copyright © 2018 - College of Computer Studies</small><br/>
              <small class=" font-weight-bold">Jhon Mark Daquis - Developer</small><br/>
            </div>
          </div>
    </footer>
        
    </div>
        
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </div>
    
</body>


</html>
