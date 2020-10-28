<?php
    define("template", true);
    include_once("./connect.php");
    $vulgar_id = $_POST["delete_id"];
    $sql = "DELETE FROM `vulgarwords` WHERE id = $vulgar_id";
    $query = mysqli_query($conn, $sql);
    header("location: index.php?page_layout=vulgar");
?>