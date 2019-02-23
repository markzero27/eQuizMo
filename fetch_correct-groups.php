 <?php 
                
$answer_query = $obj->select_record('points_table',array('q_id'=>$q_id,'game_id'=>$game_id));
foreach($answer_query as $row) :

?>
    <tr>
        <td class="text-center"><?php echo $row['team']; ?></td>
        <td class="text-center"><?php echo $row['answer']; ?></td>
<?php 

    if(strtolower($row['answer'])==strtolower($answer)){

        echo '<td><i class="fa fa-check text-primary"></i></td>';

    }else{

         echo '<td><i class="fa fa-close text-danger"></i></td>';
    }
?>

    </tr>

<?php endforeach; ?>
               
                