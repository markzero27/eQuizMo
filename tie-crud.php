
<?php 

include "crud-operation.php";

$table="display_table";

$id =  $_POST['id'];
$command = $_POST['command'];
$scrn = '5';

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
        
 }
mysqli_close($obj->con);

?>





