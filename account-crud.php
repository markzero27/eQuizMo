<?php 

$db_user = 'root';
$db_pass = '';
$db_name = 'daquizdb';
$db_host = 'localhost';

$con = new mysqli($db_host, $db_user, $db_pass, $db_name);
if($con->connect_error){
    printf("Connection failed: %s/n",$mysqli->connect_error);
    exit();
}

$team = $_POST['team'];
$school = $_POST['school'];
$password = $_POST['pass'];
$course = $_POST['course'];
$stud1 = $_POST['stud1'];
$stud2 = $_POST['stud2'];
$stud3 = $_POST['stud3'];
$imei = $_POST['imei'];
//$mac = $_POST['mac'];


$sql = "SELECT * FROM account_table WHERE team_name = '".$team."'";
$team_query = mysqli_query($con,$sql);

if(mysqli_num_rows($team_query)>0){
    echo "Record existed";
}else{

    //$macfile = fopen("mac.txt", "a") or die("Unable to open mac.txt!");
    //fwrite($macfile, $mactxt."\n");
    //fclose($macfile);

    //$imeifile = fopen("imei.txt", "a") or die("Unable to open imei.txt!");
    //fwrite($imeifile, $imeitxt."\n");
    //fclose($imeifile);

    //$macfile = file_put_contents("../ccs.txt", $mac.PHP_EOL , FILE_APPEND | LOCK_EX);
    $imeifile = file_put_contents("../ccs.txt", $imei.PHP_EOL , FILE_APPEND | LOCK_EX);

    $ins = "INSERT INTO account_table (school,course,team_name,student_1,student_2,student_3,password,imei) VALUES ('".$school."','".$course."','".$team."','".$stud1."','".$stud2."','".$stud3."','".$password."','".$imei."')";
    $insert_account = mysqli_query($con,$ins);
    
    if($insert_account){
        echo "success";
    }else{
        echo "failed";
    }
}


?>