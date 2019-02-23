<?php 
 include 'Crud.php'; 

 $type=$_GET['type'];

?>



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
  <?php include "nabvar.php" ?>
  <div class="content-wrapper bg-secondary">
    <div class="container-fluid">
        
      <!-- Easy Questions-->
      <div class="card mb-3">
       <div class="card-header" style="background-color:#393939" >
          <i class="fa fa-list" style="color:white"></i> <span style="color:white"><?php echo $type?> - Easy Questions</span></div>
        <div class="card-body" style="background-color:#e3e3e3">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>QType</th>
                      <th>Category</th>
                      <th>Question</th>
                      <th>Answer</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>QType</th>
                      <th>Category</th>
                      <th>Question</th>
                      <th>Answer</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     
                <?php 
                    
                    $difficulty='Easy';
                    $where = array(
                        "difficulty" => $difficulty,
                        "type" => $type,
                        "is_selected" => 1
                        );
                    $cat_row = $obj->select_record("question_table",$where);
                    foreach ($cat_row as $row){ ?>
                    
                  <tr>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo  $row['question']; ?></td>
                        <td><?php echo $row['answer']; ?></td>
                    </tr>
                    
                    <?php }
                ?>
                  
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted"><span>Updated yesterday at 11:59 PM</span> 
            
                <button type="button" class="btn pull-right btn-primary" data-toggle="modal" data-target="#add_easy">Select Question</button>
                <div id="add_easy" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="Crud.php" method="post">
                            <div class="modal-header">
                                <div class="input-group mb-2">
                                         
                                    <input type="text" class="form-control search_question" name="1" placeholder="Search Question" id="filter1">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text"><i class="fa fa-search"></i></label>
                                    </div>
                                    
                                </div>
                                
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                               
                                    <table class="table table-hover" id="table-1">
                                       <?php 

                                            $difficulty='Easy';
                                            $where = array(
                                                "type" => $type,
                                                "difficulty" => $difficulty,
                                                );
                                            $cat_row = $obj->select_record("question_table",$where);
                                            foreach ($cat_row as $row){ ?>

                                          <tr>
                                                <td><?php echo  $row['question']; ?></td>
                                                <td><?php echo $row['answer']; ?></td>
                                                <td><input type="hidden" name="type"  value="<?php echo $type; ?>">
                                                    <input type="hidden" name="<?php echo $row['q_id']; ?>"  value="0" >
                                                    <input type="checkbox" name="<?php echo $row['q_id']; ?>"  value="1" <?php echo ($row['is_selected'] ==1 ? 'checked' : ''); ?> >
                                                </td>
                                            </tr>

                                            <?php }
                                        ?>
                                    </table>
                            </div>
                            <div class="modal-footer">
                                
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">CANCEL</button>
                                <input type="submit" class="btn btn-sm btn-primary" name="update_selected" value="SELECT">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            
          </div>
      </div>
        <!-- Average Questions-->
      <div class="card mb-3">
       <div class="card-header" style="background-color:#393939" >
          <i class="fa fa-list" style="color:white"></i> <span style="color:white"><?php echo $type?> - Average Questions</span></div>
        <div class="card-body" style="background-color:#e3e3e3">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>QType</th>
                      <th>Category</th>
                      <th>Question</th>
                      <th>Answer</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>QType</th>
                      <th>Category</th>
                      <th>Question</th>
                      <th>Answer</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     
                <?php 
                    
                    $difficulty='Average';
                    $where = array(
                        "difficulty" => $difficulty,
                        "type" => $type,
                        "is_selected" => 1
                        );
                    $cat_row = $obj->select_record("question_table",$where);
                    foreach ($cat_row as $row){ ?>
                    
                  <tr>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo  $row['question']; ?></td>
                        <td><?php echo $row['answer']; ?></td>
                    </tr>
                    
                    <?php }
                ?>
                  
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted"><span>Updated yesterday at 11:59 PM</span> 
            
                <button type="button" class="btn pull-right btn-primary" data-toggle="modal" data-target="#add_ave">Select Question</button>
                <div id="add_ave" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="Crud.php" method="post">
                            <div class="modal-header">
                                <div class="input-group mb-2">
                                         
                                    <input type="text" class="form-control search_question" name="2" placeholder="Search Question" id="filter2">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text"><i class="fa fa-search"></i></label>
                                    </div>
                                    
                                </div>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                               
                                    <table class="table table-hover" id="table-2">
                                       <?php 

                                            $difficulty='Average';
                                            $where = array(
                                                "type" => $type,
                                                "difficulty" => $difficulty,
                                                );
                                            $cat_row = $obj->select_record("question_table",$where);
                                            foreach ($cat_row as $row){ ?>

                                          <tr>
                                                <td><?php echo  $row['question']; ?></td>
                                                <td><?php echo $row['answer']; ?></td>
                                                <td><input type="hidden" name="type"  value="<?php echo $type; ?>">
                                                    <input type="hidden" name="<?php echo $row['q_id']; ?>"  value="0" >
                                                    <input type="checkbox" name="<?php echo $row['q_id']; ?>"  value="1" <?php echo ($row['is_selected'] ==1 ? 'checked' : ''); ?> >
                                                </td>
                                            </tr>

                                            <?php }
                                        ?>
                                    </table>
                            </div>
                            <div class="modal-footer">
                                
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">CANCEL</button>
                                <input type="submit" class="btn btn-sm btn-primary" name="update_selected" value="SELECT">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            
          </div>
      </div>
         <!-- hard Questions-->
      <div class="card mb-3">
       <div class="card-header" style="background-color:#393939" >
          <i class="fa fa-list" style="color:white"></i> <span style="color:white"><?php echo $type?> - Difficult Questions</span></div>
        <div class="card-body" style="background-color:#e3e3e3">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>QType</th>
                      <th>Category</th>
                      <th>Question</th>
                      <th>Answer</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>QType</th>
                      <th>Category</th>
                      <th>Question</th>
                      <th>Answer</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     
                <?php 
                    
                    $difficulty='Hard';
                    $where = array(
                        "type" => $type,
                        "difficulty" => $difficulty,
                        "is_selected" => 1
                        );
                    $cat_row = $obj->select_record("question_table",$where);
                    foreach ($cat_row as $row){ ?>
                    
                  <tr>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo  $row['question']; ?></td>
                        <td><?php echo $row['answer']; ?></td>
                    </tr>
                    
                    <?php }
                ?>
                  
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted"><span>Updated yesterday at 11:59 PM</span> 
            
                <button type="button" class="btn pull-right btn-primary" data-toggle="modal" data-target="#add_hard">Select Question</button>
                <div id="add_hard" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="Crud.php" method="post">
                            <div class="modal-header">
                                <div class="input-group mb-2">
                                         
                                    <input type="text" class="form-control search_question" name="3" placeholder="Search Question" id="filter3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text"><i class="fa fa-search"></i></label>
                                    </div>
                                    
                                </div>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                               
                                    <table class="table table-hover" id="table-3">
                                       <?php 

                                            $difficulty='Hard';
                                            $where = array(
                                                "difficulty" => $difficulty,
                                                "type" => $type
                                                );
                                            $cat_row = $obj->select_record("question_table",$where);
                                            foreach ($cat_row as $row){ ?>

                                          <tr>
                                                <td><?php echo  $row['question']; ?></td>
                                                <td><?php echo $row['answer']; ?></td>
                                                <td><input type="hidden" name="type"  value="<?php echo $type; ?>">
                                                    <input type="hidden" name="<?php echo $row['q_id']; ?>"  value="0" >
                                                    <input type="checkbox" name="<?php echo $row['q_id']; ?>"  value="1" <?php echo ($row['is_selected'] ==1 ? 'checked' : ''); ?> >
                                                </td>
                                            </tr>

                                            <?php }
                                        ?>
                                    </table>
                            </div>
                            <div class="modal-footer">
                                
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">CANCEL</button>
                                <input type="submit" class="btn btn-sm btn-primary" name="update_selected" value="SELECT">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            
          </div>
      </div>
    </div>
      
    <div class="text-center text-white mb-3 container">
        <a class="w-100 btn btn-lg btn-danger" id="home" title="Back to dashboard" href="quiz-level.php?type=<?php echo $type?>">Game Start</a>
      </div>
      
    <!-- /.container-fluid-->
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
    <script>
    $(document).ready(function(){
            $('.search_question').on('keyup',function(){
                var num = $(this).attr('name');
                var searchVal = $(this).val().toLowerCase();
                var table = '#table-'+num+' tr';
                
                $(table).each(function(){
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
  </div>
</body>

</html>
