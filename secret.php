<?php
    session_start();
    if (isset($_POST['submit'])) {
        $_SESSION["c"]=$_SESSION["c"]+1;
        //echo $_SESSION["c"];

        //unset($_SESSION["c"]);

         $sec = $_POST['secret'];
         $num = $_POST['number'];
         $rev = $_POST['reveal'];
         $temp="";
        $_SESSION['secret']=$sec;

        
         function call($str1,$str2){
             $str1.=$str2;
             $GLOBALS['temp']=$str1;
         }

        if($_SESSION["c"]<=3){
            echo $_SESSION["c"];
            if($sec===$num){
                $_SESSION["op"]=" ";
                header("Location: http://localhost/Retheeka/Secret_main.php?congrats&reveal");
            }else{
                for($i=0;$i<strlen($sec);$i++){
                    for($j=0;$j<strlen($sec);$j++){
                        if($sec[$i]===$num[$i]){
                            call($temp,"+");
                            break;
                        }else if($sec[$i]===$num[$j]){
                            call($temp,"-");
                        }else if($sec[$i]!==$num[$j]){
                            call($temp," ");
                        }else{
                            call($temp,"-");
                        }
                    }
                 }
                 $_SESSION["op"]=$temp;
                 $_SESSION['reveal']=$sec;
                header("Location: http://localhost/Retheeka/Secret_main.php?reveal");
            } 
        }else{
            header("Location: http://localhost/Retheeka/Secret_main.php?over");  
        }  

    }
    //session_destroy();
?>
