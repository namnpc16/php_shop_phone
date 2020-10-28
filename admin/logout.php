<?php
    session_start();
    // unset($_SESSION["mail"]);
    // unset($_SESSION["pass"]);
    if(isset($_SESSION['mail']) && isset($_SESSION['pass'])){
        session_destroy();
    }
    header("location: index.php");
?>