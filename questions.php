<?php include 'Crud.php'; ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>e-QuizMo | Questions</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php include "nabvar.php"; ?>
  <!-- Body -->
    
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Top -->
      <div class="row">
        <div class="mb-3 col">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text">Category</label>
                </div>
            
                <select class="custom-select">
                    <option>All</option>
                    <option>English</option>
                    <option>Math</option>
                    <option>Science</option>
                    <option>General</option>
                 </select>
            </div>
          </div>
        <div class="col ">
            <div class="input-group">
                <div class="input-group-prepend">
                <label class="input-group-text">Question Type</label></div>
               
                <select class="custom-select">
                    <option>All</option>
                    <option name="multiple">Multiple choice</option>
                    <option> Short answer</option>
                    <option>Spelling</option>
                </select>
            </div>
          </div>
        <div class="col ">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text">Difficulty</label>
                </div>
                
                <select class="custom-select">
                    <option>All</option>
                    <option name="multiple">Easy</option>
                    <option>Average</option>
                    <option>Hard</option>
                </select>
            </div>
          </div>
            <!-- add modal -->
        <div class="col">
                <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#add_q">Add Question</button>
                <div id="add_q" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header"><h4 class="modal-title">Add Question</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                            <form action="Crud.php" method="post">
                                <table class="table table-hover">
                                    
                                    <tr>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text">Question Type</label>
                                            </div>
                                            <select class="custom-select" name="type">
                                                    <option name="">Multiple Choice</option>
                                                    <option name="">Short answer</option>
                                                    <option name="">Spelling</option>
                                            </select>
                                        </div>
                                    </tr>
                                     <tr>
                                         <div class="input-group mb-3">
                                             <div class="input-group-prepend">
                                                  <label class="input-group-text">Difficulty</label>
                                             </div>
                                             
                                            <select class="custom-select" name="diff">
                                                    <option name="">Easy</option>
                                                    <option name="">Average</option>
                                                    <option name="">Hard</option>
                                            </select>
                                        </div>
                                    </tr>

                                    <tr>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">                   <label class="input-group-text">Category</label>
                                            </div>
                                            <select class="custom-select" name="cat">
                                                    <?php $cat_row = $obj->fetch_record("category_table");
                                                    foreach ($cat_row as $row){ ?>
                                                        <option name=""><?php echo $row['category']; ?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                    </tr>
                                    
                                    <tr>
                                         <div class="input-group mb-3">
                                             <div class="input-group-prepend">
                                                  <label class="input-group-text">Timer (seconds)</label>
                                             </div>
                                             
                                            <select class="custom-select" name="timer">
                                                    <option name="">5</option>
                                                    <option name="">10</option>
                                                    <option name="">15</option>
                                                    <option name="">20</option>
                                            </select>
                                        </div>
                                    </tr>

                                    <tr>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text">Question</label>
                                            </div>
                                            <input type="text" class="form-control" name="question" placeholder="Enter Question">
                                        </div>
                                        
                                    </tr>
                                    
                                    <tr>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text">Opt A</label>
                                            </div>
                                            <input type="text" class="form-control" name="option1" >
                                        </div>
                                        
                                    </tr>
                                    <tr>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text">Opt B</label>
                                            </div>
                                             <input type="text" class="form-control" name="option2">
                                        </div>
                                       
                                    </tr>
                                    <tr>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text">Opt C</label>
                                            </div>
                                            <input type="text" class="form-control" name="option3" >
                                        </div>
                                        
                                    </tr>
                                    <tr>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text">Opt D</label>
                                            </div>
                                             <input type="text" class="form-control" name="option4" >
                                        </div>
                                       
                                    </tr>
                                    <tr>
                                         <div class="input-group mb-5">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text">Answer</label>
                                            </div>
                                             <input type="text" class="form-control" name="answer" >
                                        </div>
                                    </tr>
                                </table>
                            <input type="submit" name="submit" value="Add" class="btn btn-sm btn-primary btn-block">
                            </form>
                                
                            </div>
                            <div class="modal-footer">
                                
                                <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
            
      <!-- DataTables Questions-->
      <div class="card mb-3">
       <div class="card-header bg-dark text-white">
          <i class="fa fa-table"></i> <span>Questions</span>
          <a href="print-questions.php" class=" float-right text-white" target="_blank"><i class="fa fa-print"></i></a>
          </div>
          
        <div class="card-body" style="background-color:#e3e3e3">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>QType</th>
                  <th>Difficulty</th>
                  <th>Category</th>
                  <th>Question</th>
                  <th>Answer</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>QType</th>
                  <th>Difficulty</th>
                  <th>Category</th>
                  <th>Question</th>
                  <th>Answer</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </tfoot>
              <tbody>
            <?php 
                
                $qrow = $obj->fetch_record("question_table");
                foreach ($qrow as $row){
                      //break point
                ?>
                <tr>
                    <td><?php echo $row['type']; ?></td>
                    <td><?php echo $row['difficulty']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['question']; ?></td>
                    <td><?php echo $row['answer']; ?></td>
                
                    <!-- begining of Edit Modal btn-->  
                    
                    <td>
                        <button type="button" class="btn btn-sm btn-block btn-warning" data-toggle="modal" data-target="#edit<?php echo $row['q_id']; ?>">edit</button>
                        <div id="edit<?php echo $row['q_id']; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header"><h4 class="modal-title">Edit Question</h4><button type="button" class="close" data-dismiss="modal">&times;</button></div>
                                <div class="modal-body">
                                <form action="Crud.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['q_id']; ?>">
                                <table class="table table-hover">
                                <tr>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><label class="input-group-text" >Question Type</label>
                                        </div>
                                        
                                        <select class="custom-select" name="type" >
                                        <option name=""><?php echo $row['type'];?></option>
                                        <option name="">Multiple Choice</option>
                                        <option name="">Short answer</option>
                                        <option name="">Spelling</option>
                                        </select>
                                    </div>
                                </tr>
                                    <tr>
                                        <div class="input-group mb-3">
                                        <div class="input-group-prepend"><label class="input-group-text">Question Type</label></div>
                                        <select class="custom-select" name="diff">
                                        <option name=""><?php echo $row['difficulty'];?></option>
                                        <option name="">Easy</option>
                                        <option name="">Average</option>
                                        <option name="">Hard</option>
                                        </select>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><label class="input-group-text">Category</label></div>
                                        <select class="custom-select" name="cat">
                                            <option name=""><?php echo $row['category'];?></option>
                                                <?php $cat_row = $obj->fetch_record("category_table");
                                                foreach ($cat_row as $row_c){ ?>
                                                <option name=""><?php echo $row_c['category']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </tr>
                                <tr>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text">Timer (seconds)</label>
                                            </div>
                                            
                                        <select class="custom-select" name="timer">
                                                <option name=""><?php echo $row['timer'];?></option>
                                                <option name="">5</option>
                                                <option name="">10</option>
                                                <option name="">15</option>
                                                <option name="">20</option>
                                        </select>
                                    </div>
                                </tr>

                                <tr>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text">Question:</label>
                                        </div>
                                        <input type="text" class="form-control" name="question" placeholder="Enter Question" value="<?php echo $row["question"]?>">
                                    </div>
                                    </tr>
                                <tr>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text">Opt A</label>
                                            <input type="text" class="form-control" name="option1" value="<?php echo $row['option1']; ?>" >
                                        </div>
                                    </div>
                                </tr>
                                    <tr>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text">Opt B</label>
                                            <input type="text" class="form-control" name="option2" value="<?php echo $row['option2']; ?>" >
                                        </div>
                                    </div>
                                </tr>
                                    <tr>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text">Opt C</label>
                                            <input type="text" class="form-control" name="option3" value="<?php echo $row['option3']; ?>" >
                                        </div>
                                    </div>
                                </tr>
                                    <tr>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text">Opt D</label>
                                            <input type="text" class="form-control" name="option4" value="<?php echo $row['option4']; ?>" >
                                        </div>
                                    </div>
                                </tr>
                                    <tr>
                                    <div class="input-group mb-5">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text">Answer</label>
                                            <input type="text" class="form-control" name="answer2" value="<?php echo $row['answer']; ?>" >
                                        </div>
                                    </div>
                                </tr>
                                
                                </table>
                                <input type="submit" name="update_question" value="update" class="btn btn-sm btn-primary btn-block">
                                </form>
                                </div>
                            <div class="modal-footer"><button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Cancel</button></div>
                        </div>
                            </div>
                        </div>
                    </td>
                    
                    <!-- end of Edit modal btn  -->
                    <!-- start of delete modal btn  -->
                    <td>
                        <button type="button" class="btn btn-sm btn-block btn-danger" data-toggle="modal" data-target="#delete_q<?php echo $row['q_id']; ?>">delete</button>
                        <div id="delete_q<?php echo $row['q_id']; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <form action="Crud.php" method="post">
                                    <div class="modal-header"><h5>Delete this question?</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button></div>
                                    <div class="modal-body"><?php echo $row['question']; ?>
                                        <input type="hidden" name="id" value="<?php echo $row['q_id']; ?>"><br/>
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <input type="submit" name="delete_question" value="Delete" class="btn btn-danger">
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </td>
                    <!-- end of delete modal btn  -->
                    
                </tr>
                
            <?php
                 }
             ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
           <small class="black font-weight-bold">Copyright © 2018 - College of Computer Studies | Jhon Mark Daquis - Web Developer</small><br/>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
