
<script>
    window.sessionStorage.clear();
    window.localStorage.clear();
</script>
<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   unset($_SESSION["login_user"]);
   
   echo 'You have logged out!';
   header('Refresh: 0.01; URL = ../');
?>