<?php 

include "crud-operation.php";

if(isset($_POST['random'])){
    
    $category = trim($_POST['category']);
    $diff = trim($_POST['diff']);
    
    $where_display = array( "screen"=>'display_screen');
    $check_display = $obj->select_record("display_table",$where_display);
    
    foreach($check_display as $cd){
        $screen = $cd['show_screen'];
    }
    
    
    $qnum = Array();
    $where = array("difficulty" => $diff,"category" => $category,'is_selected'=>'0');
    $seq_num = 0;
    
    $query = $obj->select_record("question_table",$where);
    
    if(count($query)>0){
        
        if($screen != '0'){
            
            $seq_num = count($obj->select_record('question_table',array('is_selected'=>'1')))+1;
        
            foreach($query as $qrows){
                array_push($qnum,$qrows['q_id']); 
            }

            $rand_q = $qnum[rand(0,count($qnum)-1)];

            $obj->update_record("question_table",array('q_id'=>$rand_q),array('is_selected'=>'1','q_sequence'=>$seq_num));

            $qset = $obj->select_record("question_table",array('q_id'=>$rand_q));

            foreach($qset as $set){
                $diff = $set['difficulty'];
                $id =  $set['q_id'];
                $type = $set['type'];
            }

            if($type==='Multiple Choice'){
                $scrn = '1';
            }else if($type=='Short answer'){
                $scrn = '2';
            }



            $myArray = array( 
                "show_screen" => $scrn,
                "q_id" => $id,
                "difficulty" => $diff,
            );

            $obj->update_record("display_table",$where_display,$myArray);

            $display = $obj->fetch_record("display_table");

            foreach ($display as $row){ 
                $sql = "UPDATE display_table SET show_screen = 0 WHERE screen ='" . $row['screen'] . "' AND screen != 'display_screen'";
                $obj->update_selected($sql);
            }
        }
      
    }else{
         $obj->update_record("display_table",$where_display,array("show_screen" => 4,"q_id" => 0 ,"difficulty" => ""));
    }
    
        
        
}

?>