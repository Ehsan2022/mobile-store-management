<?php
    include("user_authentication.php");

    ob_start();
    ob_clean();
    session_start();

    // destroys the created cookies
    setcookie("username","username",time()-10000);
    setcookie("password","password",time()-10000);

    // destroys all the created sessions
    session_destroy();

    header("Location:login.php");
?>