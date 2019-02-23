<?php 
session_start();
include 'crud-operation.php'; 

$game_set= $obj->fetch_record('game_set');
$last_id=end($game_set);
$game_id=$last_id['game_id'];

$diff= $_SESSION['difficulty'];

$x=1;
$sql = "SELECT *, SUM(score) as total FROM points_table WHERE game_id = '".$game_id."' AND difficulty = '".$diff."' AND type != 'Tie-Breaker' GROUP BY team ORDER BY total DESC";

$score = mysqli_query($obj->con,$sql);
if(mysqli_num_rows($score)>0){
    while($row = mysqli_fetch_assoc($score))
        { 

    ?>


    <tr>
        <td class="text-center"><?php echo $x++;?></td>
        <td class="text-center text-capitalize"><?php echo $row['team'];?></td>
        <td class="text-center"><?php echo $row['total']; ?></td>

    </tr>

    <?php 

    }
}else{
    
    
    
    
    $y=1;
    $sql2 = "SELECT screen FROM display_table WHERE screen != 'Display_screen' AND screen != 'Android_screen'";
    $query2 = mysqli_query($obj->con,$sql2);
    
    if(mysqli_num_rows($query2)>0){
        while($row2 = mysqli_fetch_assoc($query2)){ ?>
    
            <tr>
                <td class="text-center"><?php echo $y++;?></td>
                <td class="text-center text-capitalize"><?php echo $row2['screen'];?></td>
                <td class="text-center">0</td>
            </tr>

      <?php  }
    }
}
?>
