<?php include "crud-operation.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <title>e-QuizMo | Analytics</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
    
</head>

<body class="fixed-nav sticky-footer bg-dark sidenav-toggled">

  <!-- Navigation-->
    <?php include "nabvar.php"?>    
    <div class="container-fluid">   
      <div class="content-wrapper">
        <div class="container-fluid">
        <div class="card bg-dark text-white mb-3">
      <div class="card-header">Predictive Analytics Table</div>
        <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-secondary text-white">
                  <tr>
                    <th>Questions</th>
                    <th>Total Quiz</th>
                    <th>Total Answers</th>
                    <th>Correct Answers</th>
                    <th>Correct Percentage</th>
                    <th>Previous Difficulty</th>
                    <th>Predicted Difficulty</th>
                  </tr>
                </thead>
                <!-- <tbody>
                  <tr>
                    <td>Which one of the following is not considered as an organization?</td>
                    <td>5</td>
                    <td>50</td>
                    <td>83 %</td>
                    <td>Average</td>
                    <td>Easy</td>
                  </tr>
                  <tr>
                    <td>He was the last president of Philippine Commonwelth?</td>
                    <td>5</td>
                    <td>50</td>
                    <td>43 %</td>
                    <td>Easy</td>
                    <td>Difficult</td>
                  </tr>
                  <tr>
                    <td>The first Asian to be elected as secretary General of the United Nation in 1949?</td>
                    <td>5</td>
                    <td>50</td>
                    <td>84 %</td>
                    <td>Difficult</td>
                    <td>Easy</td>
                  </tr>
                  <tr>
                    <td>Which organ of the alimentary canal is known as "Graveyard of Red Blood Cells"?</td>
                    <td>5</td>
                    <td>50</td>
                    <td>64 %</td>
                    <td>Average</td>
                    <td>Average</td>
                  </tr>
                </tbody> -->

                <tbody>
                
                <?php 
                $query = mysqli_query($obj->con,"SELECT q_id, difficulty, COUNT(q_id) as num FROM points_table GROUP BY q_id");
                while($q = mysqli_fetch_assoc($query)){

                  $question = $obj->select_record('question_table',array('q_id'=>$q['q_id']));
                  $used = $obj->select_record('used_question',array('question_id'=>$q['q_id']));
                  $incorrects = $obj->select_record('points_table',array('q_id'=>$q['q_id'],'score'=>0,'tbscore'=>0));
                  $count = count($used);
                  $percent = (($q['num']-count($incorrects))/$q['num'])*100;
                  ?>

                  <tr>
                    <td><?php echo $question[0]['question']?></td>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $q['num'] ?></td>
                    <td><?php echo $q['num']-count($incorrects) ?></td>
                    <td><?php echo number_format((float)$percent, 2, '.', '')." %"; ?></td>
                    <td>
                    <?php if($q['difficulty']!='Hard'){
                      echo $q['difficulty']; 
                      }else{
                        echo 'Difficult';
                      }
                      ?>
                    </td>
                    <td>
                    <?php if($percent>=70){
                      echo 'Easy';
                    }else if($percent<=40){
                      echo 'Difficult';
                    }else{
                      echo "Average";
                    } ?>
                    </td>
                  </tr>
                <?php 
                }
                ?>


                </tbody>
              </table>
          </div>

        </div>
      
    </div>  
</div>  
  
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
