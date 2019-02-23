
<?php   
session_start();
include 'connection.php';


$obj = new Database;
$id=0;
if(isset($_SESSION['team'])){
    $team = $_SESSION['team'];  
    $result = mysqli_query($obj->con, "SELECT code FROM login_authentication where username='".$_SESSION['team']."'");
   
    if (mysqli_num_rows($result) > 0) {
   
        $codequery = mysqli_fetch_array($result); 
        $code = $codequery['code']; 

        if($_SESSION['code'] != $code){
        unset($_SESSION['code']);
        header('Location: multiple-login.php');
        }
    }
}else{
    unset($_SESSION['code']);
    header('Location: multiple-login.php');
}

$android_screen = 0;

$question=$diff=$type=$answer=$option1=$option2=$option3=$option4=$answer="";

$fetch_id = "SELECT show_screen, q_id FROM display_table WHERE screen ='".$team."'";
$query_id = mysqli_query($obj->con,$fetch_id);
if(mysqli_num_rows($query_id) > 0){

    while($row = mysqli_fetch_assoc($query_id)){
        $android_screen=$row['show_screen'];
        $id=$row['q_id'];
    }
}

$query="SELECT * FROM question_table WHERE q_id =".$id;
$query_q = mysqli_query($obj->con,$query);

if(mysqli_num_rows($query_q) > 0){

    while($row = mysqli_fetch_assoc($query_q)){
        $question=$row['question'];
        $type=$row['type'];
        $qtype=$row['type'];
        $diff=$row['difficulty'];
        $option1=$row['option1'];
        $option1=$row['option1'];
        $option2=$row['option2'];
        $option3=$row['option3'];
        $option4=$row['option4'];
        $answer=$row['answer'];
        $qTime=$row['timer'];
    }
}

if($android_screen==5){
    $type="Tie-breaker";
}

$_SESSION['diff'] = $diff;

if($android_screen==1 || $android_screen==5 && $qtype=="Multiple Choice"):?>

<div class="text-center" id="paper" >
   <form id="mc-form">

   <progress value="0" max="<?php echo $qTime?>" id="progressBar" class="mb-2"></progress>
        <div id="b-group">

                <input type="hidden" id="correct_answer" name="answer" value ="<?php echo $answer ?>">
                <input type="hidden" id="countdown" name="countdown" value ="<?php echo $qTime ?>">
                <input type="hidden" id="q_id"  value="<?php echo $id ?>">
                <input type="hidden" id="type"  value="<?php echo $type ?>">
                <!-- <input type="button" class="mc-btn btn btn-custom mb-2 w-100" name="optn[]" value="<?php echo $option1 ?>" id="optn[]">
                <input type="button" class="mc-btn btn btn-custom mb-2 w-100" name="optn[]" value="<?php echo $option2 ?>" id="optn[]">
                <input type="button" class="mc-btn btn btn-custom mb-2 w-100" name="optn[]" value="<?php echo $option3 ?>" id="optn[]">
                <input type="button" class="mc-btn btn btn-custom mb-5 w-100" name="optn[]" value="<?php echo $option4 ?>" id="optn[]"> -->

                <button class="mc-btn btn2 btn-custom mb-2 w-100" name="optn[]" id="optn[]"><?php echo $option1 ?></button>
                <button class="mc-btn btn2 btn-custom mb-2 w-100" name="optn[]" id="optn[]"><?php echo $option2 ?></button>
                <button class="mc-btn btn2 btn-custom mb-2 w-100" name="optn[]" id="optn[]"><?php echo $option3 ?></button>
                <button class="mc-btn btn2 btn-custom mb-2 w-100" name="optn[]" id="optn[]"><?php echo $option4 ?></button>
                <button class="btn btn-custom bg-primary mb-2 w-100 text-white" id="select-btn">SUBMIT</button>

        </div> 
    </form>
</div>
<script>
    $(document).ready(function(){
    stopTimer();
    var counter = 0;
    var countdown = $("#countdown").val()*1000;
    setTimeout(function(){
        if(counter<1){
            $.post("answer_crud.php",{
                type: $("#type").val(),
                q_id: $("#q_id").val(),
                mc_answer: "No Answer"
            });
        }
        startMain();
    },countdown+3000);

    
    $(".mc-btn").click(function(e){
        e.preventDefault();
        $(".mc-btn").removeClass("selected bg-dark text-white");
        $(this).addClass("selected bg-dark text-white");
    });

    $("#select-btn").click(function(e){
        e.preventDefault();
        
        if($(".selected")[0]){
            var type = $("#type").val();
            var q_id = $("#q_id").val();
            var answer = $("#correct_answer").val();
            var mc_answer = $(".selected").text();
            $("form").html('<div class="mb-4 mt-4"><i class="big-icon fa fa-thumbs-o-up"></i></div>');
            $.post("answer_crud.php",{
                type: type,
                q_id: q_id,
                answer: answer,
                mc_answer: mc_answer
            });
            counter++;
        }
    });

   
    var timeleft = $("#countdown").val();
    var downloadTimer = setInterval(function(){
    document.getElementById("progressBar").value = $("#countdown").val() - --timeleft;
    if(timeleft <= 0)
        clearInterval(downloadTimer);
    },1000);
   });

</script>
 <?php 

 elseif($android_screen==2 || $android_screen==5 && $qtype=="Short answer"):?>

         <div class=" text-center" id="paper">
           <form action="answer_crud.php" method="post">
           <progress value="0" max="<?php echo $qTime?>" id="progressBar" class="mb-2"></progress>
                <input type="hidden" id="d_answer" name="answer" value="<?php echo $answer ?>" >
                <input type="hidden" id="countdown" name="countdown" value ="<?php echo $qTime ?>">
                <input type="hidden" id="q_id"  value="<?php echo $id ?>">
                <input type="hidden" id="type"  value="<?php echo $type ?>">
                <div class="form-group mb-4 mt-4 pt-3 pb-3">
                    <h2 class="text-center">Enter your Answer</h2>
                    <input class="form-control mt-5 mb-4" type="text" name="short_answer" id="s-answer">
                    <button class="btn btn-sm btn-dark mb-5 w-100" name="answer_btn" id="sa_btn">SUBMIT</button>
                </div>
                
            </form>
        </div>

        <script>
            $(document).ready(function(){
                stopTimer();
                var counter = 0;
                var countdown = $("#countdown").val()*1000;
                setTimeout(function(){

                    
                    if(counter<1){
                        $.post("answer_crud.php",{
                            type: $("#type").val(),
                            q_id: $("#q_id").val(),
                            s_answer: "No answer"
                        });
                    }
                    startMain();
                },countdown+2000);

                $('#sa_btn').click(function(e){
                    e.preventDefault();
                    var type = $("#type").val();
                    var q_id = $("#q_id").val();
                    var answer = $("#d_answer").val();
                    var s_answer = $("#s-answer").val();
                    if(s_answer!=""){
                        $("form").html('<div class="mb-4 mt-4"><i class="big-icon fa fa-thumbs-o-up"></i></div>');
                        $.post("answer_crud.php",{
                            type: type,
                            q_id: q_id,
                            answer: answer,
                            s_answer: s_answer
                        });
                    }
                });
            });

            var timeleft = $("#countdown").val();
            var downloadTimer = setInterval(function(){
            document.getElementById("progressBar").value = $("#countdown").val() - --timeleft;
            if(timeleft <= 0)
                clearInterval(downloadTimer);
            },1000);
        </script>

<?php 

elseif($android_screen==3): ?>

        <div class=" text-center" id="paper">
           <form action="answer_crud.php" method="post">
           
                <input type="hidden" name="id" value="<?php echo $id?>" >
                <input type="hidden" name="diff" value="<?php echo $diff?>" >
                <input type="hidden" name="team" value="<?php echo $team?>" >
                <input type="hidden" name="answer" value="<?php echo $answer?>" >
                
                <div class="mb-4 mt-4"><i class="big-icon fa fa-check"></i></div>
            </form>
            
        </div>
        <script>stopTimer();</script>
    
    
<?php else: ?>
        <div class=" text-center" id="paper">
            <form>
                    <div class="mb-4 mt-4" id="icon"><i class="big-icon fa fa-clock-o" ></i></div>
                </form>
            </div>
<?php
        endif;

?>
