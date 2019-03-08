
<script>
    window.sessionStorage.clear();
    window.localStorage.clear();
</script>
<?php
   session_start();
   unset($_SESSION["login_user"]);
   session_unset();
   session_destroy();
   
   echo 'You have logged out!';
   header('Refresh: 0.01; URL = ../');
?>