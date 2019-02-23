

<?php


class Database{
    public $con;
    
    public function __construct(){
        $this->con = mysqli_connect("localhost", "root", "", "daquizdb");
    }
}

?>


<?php

    $db_user = 'root';
    $db_pass = '';
    $db_name = 'daquizdb';
    $db_host = 'localhost';



$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

if($mysqli->connect_error){
    printf("Connection failed: %s/n",$mysqli->connect_error);
    exit();
}

?>
