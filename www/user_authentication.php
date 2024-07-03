<?php
  ob_start();
  ob_clean();
  session_start();
// every time generates a new id for session
session_regenerate_id();

if (!isset($_SESSION["login_session"])) {
    header("location:login.php");
}
?>