<?php 
session_start();
include 'crud-operation.php'; 

$game_set= $obj->fetch_record('game_set');
$last_id=end($game_set);
$game_id=$last_id['game_id'];

$diff= "Hard";

$operation="=";

$sql = "SELECT *, SUM(tbscore) as total FROM points_table WHERE game_id = '".$game_id."' AND difficulty = '".$diff."' AND type ".$operation." 'Tie-breaker' GROUP BY team";

$score = mysqli_query($obj->con,$sql);
if(mysqli_num_rows($score)>0){
    while($row = mysqli_fetch_assoc($score))
        { 

    ?>


    <tr>
        <td class="text-center text-capitalize"><?php echo $row['team'];?></td>
         <?php 
                $score_array = array();
                $answer_array = array();
                $empty = 20;
                $where = array("team" => $row['team'], "difficulty" => $diff,'game_id'=>$game_id);
                $list = $obj->select_record("points_table",array("team" => $row['team'], "difficulty" => $diff,'game_id'=>$game_id,"type"=>'Tie-breaker'));
                foreach($list as $sc){
                    
                    if($sc['tbscore']>0){
                        echo "<td> <i class='fa fa-check text-primary' title='".$sc['answer']."'></i> </td>";
                    }else{
                        echo "<td> <i class='fa fa-close text-danger' title='".$sc['answer']."'></i> </td>";

                    }
                    
                    $empty--;
                }
        
                for($i=0;$i<$empty;$i++){
                    echo "<td> <i class='fa fa-clock-o text-secondary'></i> </td>";
                }

            ?>
        <td class="text-center"><?php echo $row['total']; ?></td>

    </tr>

    <?php 

    }
}else{
    
    
    

    $sql2 = "SELECT screen FROM display_table WHERE screen != 'display_screen' AND screen != 'android_screen'";
    $query2 = mysqli_query($obj->con,$sql2);
    
    if(mysqli_num_rows($query2)>0){
        while($row2 = mysqli_fetch_assoc($query2)){ ?>
    
            <tr>
                <td class="text-center text-capitalize"><?php echo $row2['screen'];?></td>
                <?php 

                for($i=0;$i<20;$i++){
                    echo "<td><i class='fa fa-clock-o text-secondary'></i> </td>";
                }
                ?>
                <td class="text-center">0</td>
            </tr>

      <?php  }
    }
}
?>
