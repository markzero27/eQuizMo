<?php
session_start();
include 'connection.php'; 
$obj = new Database;
$id=0;
$show_screen=0;
$display=$_SESSION['screen'];

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
        
$query="SELECT * FROM question_table WHERE q_id =".$id;
$query_q = mysqli_query($obj->con,$query);

if(mysqli_num_rows($query_q) > 0){
        
    while($row = mysqli_fetch_assoc($query_q)){

            $question=$row['question'];
            $type=$row['type'];
            $option1=$row['option1'];
            $option2=$row['option2'];
            $option3=$row['option3'];
            $option4=$row['option4'];
            $answer=$row['answer'];
    }
}

/*
show_screen values
0 = noting to show
1 = show question (multiple choices)
2 = show question (short answer)
3 = show random category
4 = show no questions to shuffle
5 = show tie breaker questions
9 = show question and answer (any type of quiz)

    */

if($show_screen==1 || $show_screen==2 || $show_screen==5){
    
  if($type=="Multiple Choice"){ ?>

            <table class="w-100" >
                <thead><tr><th colspan="13"><h2 class=""><?php echo $question; ?></h2></th></tr></thead>
                <tbody>
                <tr><td ><h2><span class="mr-5">A.</span> <?php echo $option1; ?></h2></td></tr>
				<tr><td ><h2><span class="mr-5">B.</span> <?php echo $option2; ?></h2></td></tr>
                <tr><td ><h2><span class="mr-5">C.</span> <?php echo $option3; ?></h2></td></tr>
                <tr><td ><h2><span class="mr-5">D.</span> <?php echo $option4; ?></h2></td></tr>
                
                
                </tbody>
            </table>

        <?php 

        }else{
        echo '<h2 class="mb-5 mt-5 text-center">'.$question.'</h2>';
        
        }
   
}else if($show_screen==3){ 

    $category = Array();
    
    $query="SELECT * FROM category_table";
    $query_q = mysqli_query($obj->con,$query);

    if(mysqli_num_rows($query_q) > 0){

        while($row = mysqli_fetch_assoc($query_q)){
               
            array_push($category,$row['category']);
        }
    }

?>

<div id="div-dif" style="display: none;"> <?php echo $diff; ?></div>

    
<div id="wheels bg-transparent text-center mt-5">
        <div class="wheel clearfix bg-transparent"> </div>
        <!-- add more wheels if you want; just remember to update the width in the CSS -->
    </div>
   
    

<?php  
    
}else if($show_screen==4){ echo'
        <div>
        <h2 class="text-center mt-5">Ooops! There are no questions on the category, please generate random question again!</h2>
        </div>

        ';
              
}else if($show_screen==9){ 
    echo '<h2 class="text-center" id="disp">'.$answer.'</h2>';
}

$fetch_android = "SELECT show_screen FROM display_table WHERE screen = 'android_screen'";
$query_android = mysqli_query($obj->con,$fetch_android);

$timer_query = mysqli_fetch_array($query_android);
$timer= $timer_query[0];

if($timer!=0){ ?>
    <script>stopMain();</script>
<?php
    header("location:question-timer.php");
}


?>

<script>
    stopMain();
    var randVal;
    var div = document.getElementById("div-dif");
    var diff = div.textContent;
    
    function getRandomIndex() {
            return jQuery.rand(<?php echo json_encode($category) ?>);
        }
        
        (function($) {
            $.rand = function(arg) {
                if ($.isArray(arg)) {
                    return arg[$.rand(arg.length)];
                } else if (typeof arg === "number") {
                    return Math.floor(Math.random() * arg);
                } else {
                    return 4; // chosen by fair dice roll
                }
            };
        })(jQuery);


        function startRandom() {
            // get a plain array of symbol elements
            var symbols = $(".wheel").not(".hold").get();

            if (symbols.length === 0) {
                alert("All wheels are held; there's nothing to spin");
                return; // stop here
            }

            // counter for the number of spins
            var spins = 0;

            // inner function to do the spinning
            function update() {
                for (var i = 0, l = symbols.length; i < l; i++) {
                    randVal =  getRandomIndex();
                    $('.wheel').html();
                    //Switched append to prepend
                    $('.wheel').prepend('<div style="display: none;" class="new-link" name="link[]"><h2 class="rand">' + randVal + '</h2></div>');
                    //Using "first-of-type" rather than "last"
                    $('.wheel').find(".new-link:first-of-type").slideDown("fast");

                }

                if (++spins < 40) {
                    // set a new, slightly longer interval for the next update. Makes it seem like the wheels are slowing down
                    setTimeout(update, 10 + spins * 4);
                } else {
                    
                var timer = 15;
                $.ajax({
                      url: 'set-random.php',
                      type: 'POST',
                      data: {
                          'diff': diff,
                          'random': true,
                          'category': randVal

                      },
                      success: function(response){
                          setTimeout(startMain(),5000);
                
                      },
                      error: function(){
                        alert("random Failed");
                      }
                  });
                    
                }
            }

            // Start spinning
            setTimeout(update, 1);
        }
    
        startRandom();
        


</script>