$(document).ready(function(){
           setInterval(function(){
               $('#timer').load(location.href + ' #time')
           }, 1000  );
            setInterval(function(){
               $('#main').load("fetch_android.php")
           }, 1000  );
       });
