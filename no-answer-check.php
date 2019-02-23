<?php
include "crud-operation.php";

$game_set= $obj->fetch_record('game_set');
$last_game=end($game_set);
$game_id=$last_game['game_id'];
$game_type=$last_game['game_type'];

$display = $obj->select_record('display_table',array('screen'=>'display_screen'));

$diff=$display[0]['difficulty'];
$q_id=$display[0]['q_id'];



$sql = "SELECT screen FROM display_table WHERE screen != 'Display_screen' AND screen != 'Android_screen'";

$score = mysqli_query($obj->con,$sql);
if(mysqli_num_rows($score)>0){
    while($row = mysqli_fetch_assoc($score))
        { 
            // $question_displayed = $obj->select_record('used_question',array('game_id'=>$game_id));
            // $q_count = count($question_displayed);
            if($game_type!="Tie-breaker"){
                $where = array("team" => $row['screen'], "difficulty" => $diff,'game_id'=>$game_id);
                $list = $obj->select_record_not("points_table",$where,array("type"=>'Tie-breaker'));

                $list_count = count($list);
                $question_displayed = $obj->select_record_not('used_question',array('game_id'=>$game_id,'difficulty'=>$diff),array("q_type"=>'Tie-breaker'));
                $q_count = count($question_displayed);
                
            }else{
                $where = array("team" => $row['screen'], "difficulty" => $diff,'game_id'=>$game_id, 'type'=>'Tie-breaker');
                $list = $obj->select_record("points_table",$where);

                $list_count = count($list);
                $question_displayed = $obj->select_record('used_question',array('game_id'=>$game_id,'difficulty'=>$diff,"q_type"=>'Tie-breaker'));
                $q_count = count($question_displayed);              
                
            }
            
            if($q_count>$list_count){
                $obj->insert_record('points_table',array('team'=>$row['screen'],'q_id'=>$q_id,'type'=>$game_type,'difficulty'=>$diff,'answer'=>'-','game_id'=>$game_id));
            }

        }
    }

?>