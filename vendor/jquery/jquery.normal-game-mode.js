var form_id,command_id,command,id,diff,type,cmnd,timer;
var back,home,reset,typ;
            

$("button").click(function(e) {
     e.preventDefault();
    if(this.id=="back" || this.id=="home" || this.id=="reset" || this.id=="next" || this.id=="random" || this.id=="print" || this.id=="end" || this.id=="addQ"){
        typ = this.value;
       
       }else{
           
        form_id = "#"+$(this).closest("form").attr('id');
        command_id = this.id;
        command = this.value;
        id = $(form_id).find('input[name="id"]').val(); 
        diff = $(form_id).find('input[name="diff"]').val();
        type =$(form_id).find('input[name="type"]').val();
        qtimer =$(form_id).find('input[name="qtimer"]').val()*1000;
        cmnd="#"+command_id;
        tm=$(this).attr('value');
        timer="#"+$(form_id).find('button[name="timer_button"]').attr('id');
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
                  $('#random').prop('disabled',false);
                  $(timer).prop('disabled',true);
              }
          },
          error: function(){
            alert("reset Failed");
          }
      });
    }
    
   
      
});



$(document).on('click','#back',function(){
      
    if(this.value=="Previous"){
            window.location.href = "quiz-level.php?type="+this.name;
       }else{
             window.location.href = "normal-game.php?diff="+this.value+"&type="+this.name;
       }
   
  });

$(document).on('click','#home',function(){
     window.location.href = "dashboard.php";
  });

$(document).on('click','#reset',function(){
    $.ajax({
          url: 'reset.php',
          success: function(data,status,jqXHP){
              alert("Reset "+data+status);
              location.reload();
          },
          error: function (jqXHR, status, err) {
             alert(status+err);
          },
          
      });
  });

$(document).on('click','#next',function(){
    
    if(this.value=="Next"){
            window.location.href = "mode-result.php?diff="+this.value+"&type="+this.name;
       }else{
             window.location.href = "normal-game.php?diff="+this.value+"&type="+this.name;
       }
   
  });

$(document).on('click','#end',function(){
    window.location.href = "finish-game.php?"+this.name;
  });

$(document).on('click','#print',function(){
    window.location.href = "pdf.php";
  });



$(document).on('click','#random',function(){
   var dif = this.name;
    $.ajax({
          url: 'display-crud.php',
          type: 'POST',
          data: {
              'command': 'display',
              'id': '0',
              'type': 'Random Quiz',
              'diff': dif,

          },
          success: function(response){
               
              $('#random').html("<i class='fa fa-check text-primary'>done</>");
              $('#random').prop('disabled',true);
              setTimeout(function(){
                  window.location.reload();
              },10000);
          },
          error: function(){
            alert("reset Failed");
          }
      });

  });



