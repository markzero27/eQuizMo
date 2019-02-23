<?php include 'connection.php'; ?> 
<?php
    $query = "SELECT * FROM category_table";
    $category = $mysqli->query($query) or die($mysqli->error.__LINE__);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>e-QuizMo | Category</title>
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
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- DataTables Category-->
      <div class="card mb-3">
        <div class="card-header" style="background-color:#393939" >
          <i class="fa fa-table" style="color:white"></i> <span style="color:white">Category</span>
           <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#add_c">Add Category</button>
            <div id="add_c" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="Crud.php" method="post">
                                <div class="modal-header"><h4 class="modal-title">Add Category</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" class="form-control" name="cat">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                <input type="submit" name="add_cat" value="Add" class="btn btn-sm btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
          </div>
        <div class="card-body" style="background-color:#e3e3e3">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Category</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Category</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </tfoot>
              <tbody>
                         
                <?php while($row = $category->fetch_assoc()): ?> 
                <tr>
                    <td><?php echo $row['category']?></td>
                     <!-- begining of Edit Modal btn-->  
                        
                      <td>
                          <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?php echo $row['category']; ?>">edit</button>
                          <div id="edit<?php echo $row['category']; ?>" class="modal fade" role="dialog">
                               <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="Crud.php" method="post">
                                            <div class="modal-header"><h4 class="modal-title">Edit Category</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="cat_old" value="<?php echo $row['category']?>">
                                                <input type="text" class="form-control" name="cat_new" value="<?php echo $row['category']?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                            <input type="submit" name="update_cat" value="Update" class="btn btn-sm btn-primary">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                          </div>
                        </td>
                        
                     <!-- end of Edit modal btn  -->
                    
                     <!-- start of delete modal btn  -->
                    <td>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_c<?php echo $row['category']; ?>">delete</button>
                        <div id="delete_c<?php echo $row['category']; ?>" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                    <form action="Crud.php" method="post">
                                        <div class="modal-header"><h5>Delete this Category?</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button></div>
                                        <div class="modal-body" ><?php echo $row['category']; ?>
                                        <input type="hidden" name="cat" value="<?php echo $row['category']; ?>">
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <input type="submit" name="delete_cat" value="Delete" class="btn btn-danger">
                                        </div>
                                    </form>
                                  </div>
                              </div>
                          </div>
                    </td>
                     <!-- end of delete modal btn  -->
                    </tr>
                    <?php endwhile; ?>    
                
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
           
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer bg-dark">
      <div class="container">
        <div class="text-center">
           <small class="font-weight-bold text-white">Copyright © 2018 - College of Computer Studies | Jhon Mark Daquis - Web Developer</small><br/>
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
