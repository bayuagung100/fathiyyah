<?php

include "admin/config.php";
include "func/func_date.php";

$id = $_GET['id'];
$act = $_GET['act'];

if ($act=='delete') {
    $qdel = mysqli_query($mysqli,"DELETE FROM order_temp WHERE id='$id' AND id_session='$sesi' ");
    header('Location:'.$_SERVER['HTTP_REFERER']);
}


?>