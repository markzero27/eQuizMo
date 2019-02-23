<?php
session_start();
include 'crud-operation.php'; 

$fetch_id = "SELECT * FROM display_table WHERE screen ='display_screen'";
    $query_id = mysqli_query($obj->con,$fetch_id);
    if(mysqli_num_rows($query_id) > 0){
        
        while($row = mysqli_fetch_assoc($query_id)){
            $show_screen=$row['show_screen'];
            $id=$row['q_id'];
            $diff=$row['difficulty'];
        }
    }

$question=$answer=$option1=$option2=$option3=$option4=$answer="";
        
$query="SELECT question, timer FROM question_table WHERE q_id =".$id;
$query_q = mysqli_query($obj->con,$query);

$question = mysqli_fetch_array($query_q)

        
?>


<script type="text/javascript">
    stopMain();
var ms = 1000;
  function countDown(secs,elem) {

      var element = document.getElementById(elem);
      element.innerHTML = "<h1 id='seconds'>"+secs+"</h1>";
      if(secs<0 && secs >-6){

        element.innerHTML = "<h1 id='seconds'>Time's up!</h1>"; 
                          
         }else if(secs==-6){ element.innerHTML = "<h1 id='seconds'><i class='fa fa-hourglass-1'></i></h1>";  ms=300;
         }else if(secs==-7){ element.innerHTML = "<h1 id='seconds'><i class='fa fa-hourglass-2'></i></h1>"; 
         }else if(secs==-8){ element.innerHTML = "<h1 id='seconds'><i class='fa fa-hourglass-3'></i></h1>";
         }else if(secs==-9){ element.innerHTML = "<h1 id='seconds'><i class='fa fa-hourglass-o'></i></h1>";
         }else if(secs<-9){ element.innerHTML = "<h1 id='seconds'></h1>";
                clearTimeout(timer);
                $.ajax({ url: 'show_correct_answer.php'});
                $.ajax({ url: 'no-answer-check.php'});
                window.location.replace("display_screen.php");
            }

      secs--;
      var timer = setTimeout('countDown('+secs+',"'+elem+'")',ms);
  }

</script>

<h1 class="mb-5 mt-5 text-center"><?php echo $question[0]; ?></h1>
<div id="time" class="text-center">
    
<script>
    countDown(<?php echo $question[1]?>,"time");
</script>
                    
