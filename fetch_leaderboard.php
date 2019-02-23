<?php 

include 'crud-operation.php'; 

$x=1;

$game_query = $obj->fetch_record('game_set');
$game = end($game_query);
$sql = "SELECT team, SUM(score) as total FROM points_table WHERE game_id = ".$game['game_id']." GROUP BY team ORDER BY total DESC LIMIT 10 ";
$score = mysqli_query($obj->con,$sql);
$num = mysqli_num_rows($score);
if($num>0){
    

while($row = mysqli_fetch_assoc($score))
    { 

?>

<div class="row under">

    <div class="col col-lg-1"><label><?php echo $x++;?></label></div> 
    <div class="col col-lg-6 text-left"><label><?php echo $row['team']; ?></label></div> 
    <div class="col col-lg-5 text-right pr-5"><label><?php echo $row['total']; ?></label></div>

</div>

<?php 

    };
    
}else{
    $y=1;
    $sql2 = "SELECT screen FROM display_table WHERE screen != 'Display_screen' OR screen != 'Android_screen'";
    $query2 = mysqli_query($obj->con,$sql2);
    
    if(mysqli_num_rows($query2)>0){
        while($row2 = mysqli_fetch_assoc($query2)){ ?>
            
            <div class="row under">
            <div class="col col-md-1 text-left">
               <label class=""><?php echo $y++;?></label>
            </div>
            <div class="col col-md-6 text-left">
               <label class="text-capitalize"><?php echo $row2['team_name'];?></label>
            </div>

            <div class="col col-md-5 pr-5 text-right">
               <label class="">0</label>
            </div>
        </div>
            
      <?php  }
    }
}

?>
