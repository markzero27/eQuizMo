<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>e-QuizMo | Register</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
    <script src="vendor/jquery/jquery.min.js"></script>
    <style>
        
      body {
        background: url('img/bg4.jpg') no-repeat; 
        background-position:center;
        background-size:cover; 
          
      } 
        
      #logo  {
          background: url('img/blackboard3.png') no-repeat;
          background-position:center;
          background-size:contain; 
          background-color:#f4f2f2;
      }
      
      
        /* .shadow{
            box-shadow: 0px 0px 20px 1px #050505;
        } */
      
      footer{
          color: white;
          font-size: 12px;
      }
      
    </style>
</head>
    

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto  bg-transparent text-white">
      
      <div class="card-body shadow mt-3">
          
        <!-- <div class="jumbotron bg-transparent text-center" id="logo">
            <h1 class="text-white">e-QuizMo</h1>
            <p style="color:#bebdbd">Register</p>
          </div>
           -->

           <h3 class="text-center mb-5">Register account</h3>
        <form action="account-crud.php" method="post">
            
          <div class="form-group">

            <div class="form-row">
            <div class="col-md-8">
              <input class="form-control mb-2" id="schoolName" type="text" aria-describedby="nameHelp" placeholder="School name" name="school">
            </div>
            <div class="col-md-4">
              <input class="form-control mb-2" id="course" type="text" placeholder="Course" name="course">
            </div>
           
            
            </div>
                
            <hr/>
            
              <input class="form-control mb-2" id="stud1" type="text" placeholder="Student 1" name="stud1">
              <input class="form-control mb-2" id="stud2" type="text" placeholder="Student 2" name="stud2">
              <input class="form-control mb-2" id="stud3" type="text" placeholder="Student 3" name="stud3">
        <hr/>
        <input class="form-control mb-2" id="teamName" type="text" placeholder="Username" name="team">
             <div class="form-row">

              <div class="col"> 
                <input class="form-control" id="password" type="password" placeholder="Password" name="pass">
              </div>
              <div class="col">
                <input class="form-control" id="confirm" type="password" placeholder="Confirm password" name="conf">
              </div>

             </div>

              
              
          </div>
        <hr/>
            <div>

            <div class="form-row">
            
              <div class="col"><input class="form-control mb-2" id="imei" type="text" placeholder="Mobile Serial Number" name="imei"></div>
              
              
              <!-- <div class="col">
               <input class="form-control mb-2" id="mac" type="text" placeholder="Mobile MAC Address" name="mac"></div>
               -->
        
            </div>
        <p id="error" style="color:red"></p>
          <button class="btn btn-primary btn-block bg-dark-red" name="register_button" id="register_button">Register</button>
        </form>
          
         <script>

        $("form").submit(function(e){
            e.preventDefault();
            if($("#teamName").val()!="" && $("#schoolName").val()!="" && $("#password").val()!="" && $("#confirm").val()!="" && $("#course").val()!=""){
                if($("#password").val()==$("#confirm").val()){
                   $.post("account-crud.php", {
                    register_button: $("#register_button").val(),
                    team: $("#teamName").val(),
                    school: $("#schoolName").val(),
                    pass: $("#password").val(),
                    course: $("#course").val(),
                    stud1: $("#stud1").val(),
                    stud2: $("#stud2").val(),
                    stud3: $("#stud3").val(),
                    imei: $("#imei").val(),
                    mac: $("#mac").val()
                        },
                        function(result){
                           if(result=="success"){
                               alert(result);
                                window.location.href = "register.php";
                              }else{
                                alert(result);
                              }
                        }
                    );
                }else{
                     $("#error").html("password did not match <i class='big fa fa-close'></i>");
                }
            }else{
                alert("Field empty");
                $("#error").html("fields cannot be empty <i class='big fa fa-close'></i>");
            }
        });
            
    </script>
        <!-- <div class="text-center">
          <a class="d-block small mt-3" href="index.php">Login Page</a>
         <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div> -->
      </div>
    </div>
      
      <footer class="">
          <div class="container mt-1 mb-3">
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
