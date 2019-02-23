<?php 

include "crud-operation.php";


$obj = new DataOperation;

 $q_row = $obj->fetch_record("question_table");
foreach ($q_row as $row){ 
    $obj->update_record("question_table",array("q_id"=>$row['q_id']),array("is_selected"=>"0","q_sequence"=>"0","is_done"=>"0"));
}
header("location:quiz-level.php?type=Random Quiz");
?>