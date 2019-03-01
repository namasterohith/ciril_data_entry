<?php
   include('connect.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:../");
      die();
   } else{   
        $tsql= "SELECT fullname FROM dbo.csgopr WHERE no = '$user_check'";
        $getResults= sqlsrv_query($db, $tsql);

        if ($getResults == FALSE){
            echo " <br/> SERVER ERROR! PLEASE RELOAD AND TRY AGAIN <br/>";
        }
        $count = 0;
        $name = '';
        while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
            $count++;
            $name = $row['fullname'];
        }
        sqlsrv_free_stmt($getResults);
        if($count == 1) {   
            $login_session = $name;
        }
    }
?>