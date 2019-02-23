<?php 

include "connection.php";

class DataOperation extends Database{
    
    public function insert_record($table,$fields){
        $sql = "";
        $sql .= "INSERT INTO ".$table;
        $sql .= " (".implode(",", array_keys($fields)).") VALUES (";
        $sql .= "('".implode("','", array_values($fields))."')"; 
    }
}

if(isset($_POST['submit'])){
    $myArray = array(
        "category_id" => $_POST['id'],
        "category" => $_POST['id']
    );
}


?>