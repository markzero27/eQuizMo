<?php 

include "crud-operation.php";

if(isset($_GET['team'])){
    if($obj->delete_record('display_table',array('screen'=>$_GET['team']))){
        header("location:index.php?msg=logout succesful");
    }else{
        header("location:index.php?msg=logout failed");
    }
}




?>