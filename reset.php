<?php 


$con = new mysqli("localhost", "root", "", "daquizdb");

if($con->connect_error){
    printf("Connection failed: %s/n",$mysqli->connect_error);
    exit();
}

$sql = "SELECT * FROM display_table";
$query = mysqli_query($con,$sql);

foreach($query as $row){
    $sql_update = "UPDATE display_table SET show_screen = 0 , q_id = 0 WHERE screen = '".$row['screen']."'";
    $update = mysqli_query($con,$sql_update);
}


?>