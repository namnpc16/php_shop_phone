<?php
    session_start();
    if (isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
        define("template", true);
        include_once('./connect.php');
        $cat_id = $_POST['delete_id'];
        $sql = "DELETE FROM category WHERE cat_id=$cat_id";
        mysqli_query($conn, $sql);
        header("location: index.php?page_layout=category");
    } else {
        header("location: index.php");
    }
    
?>