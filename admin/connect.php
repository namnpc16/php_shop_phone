<?php
	if (!defined("template")) {
		die("error");
	}
?>
<?php
    $serverName = "localhost";
    $userName = "root";
    $pass = "";
    $dbname = "vietpro_mobile_shop";
    $conn = mysqli_connect($serverName, $userName, $pass , $dbname);
    mysqli_query($conn, "SET NAMES 'utf8'");

    // $sql = "SELECT * FROM category WHERE cat_id = 1";
    // $query = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_array($query);

    // echo "<pre>";
    // print_r($row);
    // echo "</pre>";
    // echo "<br>";

    // $num_row = mysqli_num_rows($query);
    // echo $num_row;
?>