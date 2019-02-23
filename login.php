<?php 
session_start();


$db_user = 'root';
$db_pass = '';
$db_name = 'daquizdb';
$db_host = 'localhost';

$con = new mysqli($db_host, $db_user, $db_pass, $db_name);

if($con->connect_error){
    echo ("Connection error");
}else{
    
    $user = $_POST['team'];
    $pass = $_POST['pass'];

    function getCode($length){
        $code = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); 
       
        for ($i=0; $i < $length; $i++) {
         $code .= $codeAlphabet[random_int(0, $max-1)];
        }
       
        return $code;
       }

    $sql = "SELECT * FROM account_table WHERE team_name='".$user."'";

    $query = mysqli_query($con,$sql);

    if(mysqli_num_rows($query)>0){
        $code = getCode(10);
        $_SESSION['team'] = $user;
        $_SESSION['code'] = $code;

        while($row = mysqli_fetch_assoc($query)){
            $password = $row['password'];
            $role = $row['role'];
        }

        if($pass==$password){
            if($role=="admin"){
                echo "admin";
            }else{
                
                $game_query = mysqli_query($con,"SELECT * FROM game_set");
                $array = array();

                while($gm = mysqli_fetch_assoc($game_query)){
                    $array[] = $gm;
                }

                $current_game = end($array);
                
                if($current_game['is_locked']=='1'){
                    echo "Game is currently locked" ;
                }else{
                    $result_code = mysqli_query($con, "SELECT count(*) AS allcount FROM login_authentication");
                    $row_code = mysqli_fetch_assoc($result_code);

                    if($row_code['allcount'] > 0){
                        mysqli_query($con,"UPDATE login_authentication SET code = '".$code."' WHERE username='".$user."'");
                    }else{
                        mysqli_query($con,"INSERT INTO `login_authentication` (`id`, `username`, `code`, `login_time`) VALUES (NULL, '".$user."', '".$code."', CURRENT_TIMESTAMP)");

                    }
                    $sql = "SELECT * FROM display_table WHERE screen = '".$user."'";
                    $team_query = mysqli_query($con,$sql);

                    if(mysqli_num_rows($team_query)==0){

                        $ins = "INSERT INTO display_table (screen) VALUES ('".$user."')";
                        $insert_display = mysqli_query($con,$ins);

                        if($insert_display){

                            echo "player";

                        }else{
                            echo "Error";
                        }
                    }else{
                        echo "player";
                    }
                }
              
                
            }
        }else{
            echo "incorrect password";
        }
    }else{
        echo "no record exist";
    }

    
}



?>