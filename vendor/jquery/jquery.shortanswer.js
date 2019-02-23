var form_id,command_id,command,id,diff,type,cmnd,timer;
var back,home,reset,typ;
            

$("button").click(function(e) {
 // alert(this.id); // or alert($(this).attr('id'));
    if(this.id=="back" || this.id=="home" || this.id=="reset"){
        typ = this.value;
       
       }else{
           
        form_id = "#"+$(this).closest("form").attr('id');
        command_id = this.id;
        command = this.value;
        id = $(form_id).find('input[name="id"]').val(); 
        diff = $(form_id).find('input[name="diff"]').val();
        type =$(form_id).find('input[name="type"]').val();
        cmnd="#"+command_id;
        tm=$(this).attr('value');
        timer="#"+$(form_id).find('button[name="timer_button"]').attr('id');
       }
    
    e.preventDefault();
      $.ajax({
          url: 'display-crud.php',
          type: 'POST',
          data: {
              'command': command,
              'id': id,
              'diff': diff,
              'type': type,

          },
          success: function(response){
              $(cmnd).prop('disabled',true);
              $(timer).prop('disabled',false);
              $(cmnd).html("<i class='fa fa-check text-primary'></>");
              
              if(tm=="timer"){
                  $(timer).prop('disabled',true);
                  setTimeout(function(){ 
                        $.ajax({
                          url: 'show_correct_answer.php',

                      });
                  }, 15000);
              }
          },
          error: function(msg){
              alert("failed");
          }
      });
    });



$(document).on('click','#back',function(){
      window.location.href = "quiz-level.php?type="+typ;
  });

$(document).on('click','#home',function(){
      window.location.href = "dashboard.php";
  });

$(document).on('click','#reset',function(){
    $.ajax({
          url: 'reset.php',
          success: function(data,status,jqXHP){

              alert("Reset "+data+status);
          },
          error: function (jqXHR, status, err) {
             alert(status+err);
          },
          
      });
  });


