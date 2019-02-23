<?php include 'crud-operation.php'; ?> 


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>e-QuizMo | Registered Players</title>
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

  <?php include "nabvar.php"?>
  <div class="content-wrapper bg-secondary">
    <div class="container-fluid">
      <!-- DataTables Category-->
        <div class="card mb-3">
        <div class="card-header bg-dark"><span class="text-white">Registered Groups</span></div>
        <div class="card-body" style="background-color:#e3e3e3">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>School</th>
                  <th>SCH</th>
                  <th>Member 1</th>
                  <th>Member 2</th>
                  <th>Member 3</th>
                  <th>remove</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>School</th>
                  <th>Group</th>
                  <th>Member 1</th>
                  <th>Member 2</th>
                  <th>Member 3</th>
                  <th>Remove</th>
                </tr>
              </tfoot>
              <tbody>
                         
                <?php 
                    $query = $obj->query_record("SELECT * FROM account_table WHERE team_name != 'admin'");
                    foreach($query as $row): ?> 
                <tr>
                    <td><?php echo $row['school']?></td>
                    <td><?php echo $row['team_name']?></td>
                    <td><?php echo $row['student_1']?></td>
                    <td><?php echo $row['student_2']?></td>
                    <td><?php echo $row['student_3']?></td>
                   
                        
                    
                     <!-- start of delete modal btn  -->
                    <td>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#remove<?php echo $row['id']; ?>">remove</button>
                        <div id="remove<?php echo $row['id']; ?>" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                    <form action="Crud.php" method="post">
                                        <div class="modal-header"><h5>Remove <?php echo $row['team_name']; ?> ?</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button></div>
                                        <div class="modal-body" >This group will be unregistered. Are you sure?
                                        <input type="hidden" name="group_id" value="<?php echo $row['id']; ?>">
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <input type="submit" name="remove_group" value="remove" class="btn btn-danger">
                                        </div>
                                    </form>
                                  </div>
                              </div>
                          </div>
                    </td>
                     <!-- end of delete modal btn  -->
                    </tr>
                    <?php endforeach; ?>    
                
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
        <div class="card mb-3">
        <div class="card-header bg-dark"><span class="text-white">Logged-in Groups</span></div>
        <div class="card-body" style="background-color:#e3e3e3">
          <div class="table-responsive">
            <table class="table table-bordered" id="teamTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>SCH</th>
                  <th>Current Game</th>
                </tr>
              </thead>
              <tbody \>
                         
                <?php 
                    $query = $obj->query_record("SELECT * FROM display_table WHERE screen != 'display_screen' AND screen != 'android_screen'");
                  
                    if(count($query)<1){
                        echo "<td class='text-center'>No player is currently logged-in</td>";
                    }
                    foreach($query as $row): 
                  
                    $team =  $row['screen'];
                    $id = $row['id'];
                    ?> 
                <tr>
                    <td><?php echo $team; ?></td>
                   
                        
                    
                     <!-- start of remove modal btn  -->
                    <td>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#remove<?php echo $row['id']; ?>">remove</button>
                        <div id="remove<?php echo $row['id']; ?>" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                    <form action="Crud.php" method="post">
                                        <div class="modal-header"><h5>Remove <?php echo $team; ?> ?</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button></div>
                                        <div class="modal-body" >This group will be remove from the current game. Are you sure?
                                        <input type="hidden" name="group_id" value="<?php echo $id; ?>">
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <input type="submit" name="logout_group" value="logout" class="btn btn-danger">
                                        </div>
                                    </form>
                                  </div>
                              </div>
                          </div>
                    </td>
                     <!-- end of delete modal btn  -->
                    </tr>
                    <?php endforeach; ?>    
                
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
