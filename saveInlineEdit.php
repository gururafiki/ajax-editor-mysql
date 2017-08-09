<?php
include_once("db_connect.php");
$sql = "UPDATE `orders` SET `".$_POST['column']."` = '".$_POST['value']."' WHERE `orders`.`".$_POST['column']."` = '".$_POST['old']."';";
mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
?>