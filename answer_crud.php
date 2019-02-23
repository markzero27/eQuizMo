<?php 

session_start();
unset($_SESSION['time_started']);

include "crud-operation.php";

if(isset($_POST['mc_answer'])){
    $answer = trim($_POST['mc_answer']);
    $ans = $_POST['mc_answer'];
}else if(isset($_POST['s_answer'])){
    $answer = trim($_POST['s_answer']);
    $answ = $_POST['s_answer'];
}else{
    $answer="No answer";
    $ans = "No answer";
}

$game_set = $obj->fetch_record('game_set');
$last_id = end($game_set);

$id =  $_POST['q_id'];
$type = $_POST['type'];
$diff = $_SESSION['diff'];
$team = $_SESSION['team'];
$correct = trim($_POST['answer']);
$game_id = $last_id['game_id'];

$seq_set = $obj->select_record('points_table',array('team'=>$team,'game_id'=>$game_id));
$last_seq = end($seq_set);

if(empty($seq_set)){
    $q_seq = 1;
}else{
    $q_seq = $last_seq['q_sequence'] + 1;
}

if(strtolower($answer)==strtolower($correct)){

    if($diff=='Easy'){
        $points=1;
    }else if($diff=='Average'){
        $points=2;
    }else if($diff=='Hard'){
        $points=3;
    }
}else{
    $points=0;
}

if($type=="Tie-breaker"){
    $score = "tbscore";
}else{
    $score = "score";
}

$fields = array( 
   
    "team" => $team,
    "q_id" => $id,
    "type" => $type,
    "difficulty" => $diff,
    "answer" => $answer,
    $score => $points,
    "game_id" => $game_id,
    "q_sequence" => $q_seq
);


$duplicate_query = $obj->select_record('display_table',array('screen'=>$team));
$q_id = $duplicate_query[0]['q_id'];

if($q_id!=0){
  if($obj->insert_record("points_table",$fields) && $obj->update_record("display_table",array("screen" => $team),array("show_screen" => 0, "q_id" =>0))){
    header("location:android_q.php?msg=done");
  }  
}else{
    header("location:android_q.php?msg=timesup");
}

?>