
<?php 

include "crud-operation.php";

$table="display_table";

$game_set= $obj->fetch_record('game_set');
$last_id=end($game_set);
$game_id=$last_id['game_id'];

$diff = $_POST['diff'];
$id =  $_POST['id'];
$type = $_POST['type'];
$command = $_POST['command'];

if($type==='Multiple Choice'){
    $scrn = '1';
}else if($type=='Short answer'){
    $scrn = '2';
}else if($type=='Random Quiz'){
    $scrn = '3';
}else if($type=='Tie-breaker'){
    $scrn = '5';
}

$where_display = array( "screen"=>'display_screen');
    
$myArray = array( 
    "show_screen" => $scrn,
    "q_id" => $id,
    "difficulty" => $diff,
);


if($command=="display"){
    $obj->update_record("display_table",$where_display,$myArray);
    $display = $obj->fetch_record("display_table");
    foreach ($display as $row){ 
     $sql = "UPDATE display_table SET show_screen = 0 WHERE screen ='" . $row['screen'] . "' AND screen != 'display_screen'";
     $obj->update_selected($sql);
    }
    
}else if($command=="timer"){   
        
    $display = $obj->fetch_record("display_table");
    
    foreach ($display as $row){ 
     $sql = "UPDATE display_table SET show_screen = ".$scrn." , q_id = '".$id."' WHERE screen ='" . $row['screen'] . "' AND screen != 'display_screen'";
     $obj->update_selected($sql);
    }
    
    $obj->update_record('question_table',array('q_id'=>$id),array('is_done'=>1));
   
    $inserted = $obj->select_record('used_question',array('game_id'=>$game_id,'question_id'=>$id));

    if(count($inserted)<1){
        $obj->insert_record('used_question',array('game_id'=>$game_id,'question_id'=>$id,'difficulty'=>$diff,'q_type'=>$type));
    }
 }
mysqli_close($obj->con);

?>





