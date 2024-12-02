<?php
    session_start();
    $_SESSION["logedIn"] = false;
    header("location: manager.php");

?>