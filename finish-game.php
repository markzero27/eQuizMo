<?php 

include "crud-operation.php";


$obj = new DataOperation;

$obj->insert_record("game_set",array('game_id'=>NULL,'game_type'=>''));
$query = $obj->fetch_record("question_table");
foreach($query as $question){
    $obj->update_record('question_table',array('q_id'=>$question['q_id']),array('is_selected'=>0,'is_done'=>0));
}

header("location:dashboard.php");
?>