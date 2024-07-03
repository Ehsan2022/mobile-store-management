<?php
if (true) {
    include("user_authentication.php");
    header("location:home.php");


}
   else{
    header("location:login.php?re");
   }
die;