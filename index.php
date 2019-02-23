<?php 
    session_start();
    if(isset($_SESSION['team'])){
        unset($_SESSION['team']);
        unset($_SESSION['code']);
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
  <title>e-QuizMo | Login</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <style>
    
     #logo  {
          background: url('img/blackboard3.png') no-repeat;
          background-position:center;
          background-size:contain; 
          background-color:#f4f2f2;
      }
      
      body {
        background: url('img/bg4.jpg') no-repeat; 
        background-position:center;
        background-size:cover; 
          
      } 
      
      .shadow{
          box-shadow: 0px 0px 20px 1px #050505;
      }
      
      footer{
          color: white;
          font-size: 12px;
      }
      
      
    </style>

</head>

<body class="bg-dark">
  <div class="container px-4">
    
      
    <div class="card card-login mx-auto mt-4 bg-transparent">
      
      <div class="card-body bg-transparent shadow" >
        <form action="login.php" method="post">
            
         <div class="jumbotron bg-transparent text-center" id="logo">
            <h1 class="text-white">e-QuizMo</h1>
            <p style="color:#bebdbd"></p>
          </div>
            
          <div class="form-group">
            <input class="form-control text-center" id="team" type="text" aria-describedby="emailHelp" placeholder="Username" >
          </div>
          <div class="form-group">
            <input class="form-control text-center" id="password" type="password" placeholder="Password">
          </div>
          <div class="form-group">
          <p id="error" style="color:red"></p>
            <div class="form-check text-center">
              <label class="form-check-label text-white">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div> 
          </div>
          <input type="submit" class="btn btn-secondary bg-dark-red btn-block" name="login_btn" value="Login">
        </form>
          
          <script>
            $("form").submit(function(e){
                e.preventDefault();
                if($("#team").val()!="" && $("#password").val()!=""){
                    
                    $.post("login.php", {
                        team: $("#team").val(),
                        pass: $("#password").val()
                       
                            },
                            function(result){
                            
                                if(result=="admin" || result=="player"){
                                   if(result=="admin"){
                                      window.location.href = "dashboard.php";
                                      }else{
                                      window.location.href = "android_q.php";
                                      }
                                   }else{
                                       alert(result);
                                }
                            }
                        );
                
                }else{
                   
                    $("#error").html("fields cannot be empty <i class='big fa fa-close'></i>");
                }
            });
          
          </script>  
        <div class="text-center">
          <!-- <a class=" small mt-3" href="register.php">Register an Account</a> -->
          <!--<a class="d-block small" href="forgot-password.php">Forgot Password?</a>-->
        </div>
      </div>
    </div>
       <footer class="">
          <div class="container mt-3 mb-3">
            <div class="text-center">
              <small class="font-weight-bold text-secondary font-sm">Copyright © 2018 - College of Computer Studies</small><br/>
              <small class="font-weight-bold text-secondary">Jhon Mark Daquis - Developer</small><br/>
            </div>
          </div>
    </footer>
  </div>
  <!-- Bootstrap core JavaScript-->
 
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
