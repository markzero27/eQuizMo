<?php 

include "crud-operation.php";


//Question CRUD

if(isset($_POST['submit'])){
    

    $points=0;
    if($_POST['diff']=="Easy"){
        $points = 1;
    }else if($_POST['diff']=="Average"){
        $points = 2;
    }else{
        $points = 3;
    }

    $timer = $_POST['timer'];
    
    $myArray = array(
        "category" => $_POST['cat'],
        "difficulty" => $_POST['diff'],
        "type" => $_POST['type'],
        "question" => $_POST['question'],
        "q_image" => $_POST['image'],
        "option1" => $_POST['option1'],
        "option2" => $_POST['option2'],
        "option3" => $_POST['option3'],
        "option4" => $_POST['option4'],
        "answer" => $_POST['answer'],
        "points" => $points,
        "timer" => $timer
        
    );
    
    if($obj->insert_record("question_table",$myArray)){
        header("location:questions.php?msg=Record Inserted");
    }
}

if(isset($_POST['update_question'])){
   $id = $_POST['id'];
   $timer = $_POST['timer'];
   $where = array("q_id"=>$id);
   $points=0;
    
   if($_POST['diff']=="Easy"){
        $points = 1;
   }else if($_POST['diff']=="Average"){
        $points = 2;
   }else{
        $points = 3;
   }
    
     $myArray = array(
        "category" => $_POST['cat'],
        "difficulty" => $_POST['diff'],
        "type" => $_POST['type'],
        "question" => $_POST['question'],
        "q_image" => $_POST['image'],
        "option1" => $_POST['option1'],
        "option2" => $_POST['option2'],
        "option3" => $_POST['option3'],
        "option4" => $_POST['option4'],
        "answer" => $_POST['answer2'],
        "points" => $points,
        "timer" => $timer
    );
    if($obj->update_record("question_table",$where,$myArray)){
        header("location:questions.php?msg=Record updated succesfully");
    }
}

if(isset($_POST['delete_question'])){
   $id= $_POST['id'] ?? null;
   $where = array("q_id" => $id);
   if($obj->delete_record("question_table",$where)){
        header("location:questions.php?msg=Record deleted succesfully");
    }
    
   
}

if(isset($_POST['update_selected'])){
    $x=1;
    $type = $_POST['type'];
    $id_row = $obj->fetch_record("question_table");
    foreach ($id_row as $row){ 
        if(isset($_POST[$row['q_id']])){
            $sql = "UPDATE question_table SET is_selected = ".$_POST[$row['q_id']].", q_sequence = ".$x++." WHERE q_id ='" . $row['q_id'] . "'";
            $obj->update_selected($sql);
        }
    }
    
    header("location:question-select.php?type=".$type."&&msg=updated succesfully");
    
}

if(isset($_POST['ongame_update'])){
    $x=1;
    $diff = $_POST['diff'];
    $type = $_POST['type'];
    $id_row = $obj->fetch_record("question_table");
    foreach ($id_row as $row){ 
        if(isset($_POST[$row['q_id']])){
            $sql = "UPDATE question_table SET is_selected = ".$_POST[$row['q_id']].", q_sequence = ".$x++." WHERE q_id ='" . $row['q_id'] . "'";
            $obj->update_selected($sql);
        }
    }
    
    header("location:normal-game.php?type=".$type."&diff=".$diff);
    
}

if(isset($_POST['tiebreak_update'])){
    $x=1;
    $diff = $_POST['diff'];
    $type = $_POST['type'];
    $id_row = $obj->fetch_record("question_table");
    foreach ($id_row as $row){ 
        if(isset($_POST[$row['q_id']])){
            $sql = "UPDATE question_table SET is_selected = ".$_POST[$row['q_id']].", q_sequence = ".$x++." WHERE q_id ='" . $row['q_id'] . "'";
            $obj->update_selected($sql);
        }
    }
    
    header("location:tie-breaker.php");
    
}

//Category CRUD

if(isset($_POST['add_cat'])){
    
    $myArray = array("category" => $_POST['cat']);
    
    if($obj->insert_record("category_table",$myArray)){
        header("location:categories.php?msg=Record Inserted");
    }
}

if(isset($_POST['update_cat'])){
    $cat = $_POST['cat_new'];
    $where = array("category"=>$_POST['cat_old']);
    $myArray = array("category" => $cat);
    if($obj->update_record("category_table",$where,$myArray)){
       header("location:categories.php?msg=Record updated succesfully");
    }
}

if(isset($_POST['delete_cat'])){
   $cat= $_POST['cat'] ?? null;
   $where = array("category" => $cat);
   if($obj->delete_record("category_table",$where)){
        header("location:categories.php?msg=Record deleted succesfully");
    }
}

//score CRUD

if(isset($_POST['remove_group'])){
   $id = $_POST['group_id'] ?? null;
   $where = array("id" => $id);
   if($obj->delete_record("account_table",$where)){
        header("location:registered-users.php?msg=Record deleted succesfully");
    }
}

if(isset($_POST['logout_group'])){
   $id = $_POST['group_id'] ?? null;
   $where = array("id" => $id);
   if($obj->delete_record("display_table",$where)){
        header("location:registered-users.php?msg=Record remove succesfully");
    }
}

if(isset($_POST['logout_top3'])){
    $team = $_POST['team'] ?? null;
    $where = array("screen" => $team);
    if($obj->delete_record("display_table",$where)){
         header("location:tie.php?msg=Record remove succesfully");
     }
 }
?>