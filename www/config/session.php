<?php
   include('connect.php');
   session_start();

   $time = $_SERVER['REQUEST_TIME'];

    /**
    * for a 24 hr timeout, specified in seconds
    */
    $timeout_duration = 86400;

    /**
    * Here we look for the user's LAST_ACTIVITY timestamp. If
    * it's set and indicates our $timeout_duration has passed,
    * blow away any previous $_SESSION data and start a new one.
    */
    if (isset($_SESSION['LAST_ACTIVITY']) && 
    ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
        unset($_SESSION["login_user"]);
        session_unset();
        session_destroy();
        session_start();
    }

    /**
    * Finally, update LAST_ACTIVITY so that our timeout
    * is based on it and not the user's login time.
    */
    $_SESSION['LAST_ACTIVITY'] = $time;
   
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