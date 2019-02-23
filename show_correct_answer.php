 <?php
include "crud-operation.php";
$sql = "SELECT * FROM display_table WHERE screen != 'display_screen'";
$query = mysqli_query($obj->con,$sql);

foreach($query as $row){
    $sql_update = "UPDATE display_table SET show_screen = 0 , q_id = 0 WHERE screen = '".$row['screen']."'";
    $update = mysqli_query($obj->con,$sql_update);

}

$sql_show = "UPDATE display_table SET show_screen = 9 WHERE screen = 'display_screen'";
$show_answer = mysqli_query($obj->con,$sql_show);

?>