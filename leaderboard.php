

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
      body{
          margin: 0 100px;
      }
       #background {
        width: 100%; 
        height: 100%; 
        position: absolute; 
        left: 0px; 
        top: 0px; 
        z-index: -1; /* Ensure div tag stays behind content; -999 might work, too. */
      }
      
      .stretch {
        width:100%;
        height:100%;
      }
      
      #main{
          padding-top: 70px;
          font-family: cursive;
      }
      
      #main a{
        color: #ffffff;
      }
      
      #main a:hover{
          color: #5454db;
          text-decoration:inherit;
      }
      
      #main h1{
          color:#f86b6b;
          font-size: 3vw;
      }
      
      
      #main label{
          color: white;
           font-size: 1vw;
      }
        
      footer{
         
      }
      
      .under{
          border-bottom: 1px solid white;
      }
      
      .black{
          color: #1a1818;
           font-weight: bolder;
          text-shadow: 2px 1px 5px #ffffff;
      }
    
    </style>
    
</head>

<body>
  <!-- background-->
    <div id="background">
        <img src="img/blackboard2.jpg" class="stretch" alt="" />
    </div>    
  <!-- Navigation-->
    
    <div class="container">
    <div class="container">     
      <!-- Main-->
      <div class="jumbotron bg-transparent" id="main" >
        <div>  
            <h1 class="mb-3 text-center">Top 10</h1>

            <div class="row mb-3 under">
                <div class="col col-lg-1"><label>#</label></div>
                <div class="col col-lg-6 text-left"><label>Team</label></div> 
                <div class="col col-lg-5 text-right pr-5"><label>Score</label></div>
            </div>

            <div  id="load_board" class="mb-4"></div>
            
          </div>
   
      </div>
        
     <footer class="fixed-bottom">
      <div class="container black">
        <div class="text-center mb-1">
          <small class="black font-weight-bold">Copyright © 2018 - College of Computer Studies | Jhon Mark Daquis - Web Developer</small><br/>
        </div>
      </div>
    </footer>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript">
       $(document).ready(function(){
           setInterval(function(){
               $('#load_board').load('fetch_leaderboard.php')
           }, 1000  );
       });
    </script>   
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
  </div>
</body>

</html>
