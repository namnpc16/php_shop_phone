<?php
    define("template", true);
    include_once("./connect.php");
    $comm_id = $_POST["delete_id"];
    $sql = "DELETE FROM `comment` WHERE comm_id = $comm_id";
    $query = mysqli_query($conn, $sql);
    header("location: index.php?page_layout=comment");
?>