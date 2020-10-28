<?php
// AJAX
//  define("template", true);
//  include_once("./connect.php");
//  $comm_status = $_POST["comm_status"];
//  $comm_id = $_POST["comm_id"];
//  if ($comm_status == 1) {
//     $comm_status = 0;
//     $sql = "UPDATE `comment` SET comm_status=$comm_status WHERE comm_id=$comm_id";
//     mysqli_query($conn, $sql);
//     // header("location: index.php?page_layout=comment");
//     exit();
//  }
//  if ($comm_status == 0) {
//     $comm_status = 1;
//     $sql = "UPDATE `comment` SET comm_status=$comm_status WHERE comm_id=$comm_id";
//     mysqli_query($conn, $sql);
//     // header("location: index.php?page_layout=comment");
//     exit();
// }
?>
<?php

 define("template", true);
 include_once("./connect.php");
 $comm_status = $_GET["comm_status"];
 $comm_id = $_GET["comm_id"];
 if ($comm_status == 1) {
    $comm_status = 0;
    $sql = "UPDATE `comment` SET comm_status=$comm_status WHERE comm_id=$comm_id";
    mysqli_query($conn, $sql);
    header("location: index.php?page_layout=comment");
    exit();
 }
 if ($comm_status == 0) {
    $comm_status = 1;
    $sql = "UPDATE `comment` SET comm_status=$comm_status WHERE comm_id=$comm_id";
    mysqli_query($conn, $sql);
    header("location: index.php?page_layout=comment");
    exit();
}
?>