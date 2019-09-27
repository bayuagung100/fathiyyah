<?php

include "../admin/config.php";
include "../func/func_date.php";

$id = $_GET['id'];
$act = $_GET['act'];
$pm = $_GET['method'];

if ($act=='delete') {
    $qdel = mysqli_query($mysqli,"DELETE FROM order_temp WHERE id='$id' AND id_session='$sesi' ");
    header('Location:'.$_SERVER['HTTP_REFERER']);
}
if ($act=='checkout') {
    header('Location:../checkout/');
}
if ($act=='payment' AND $pm=='whatsapp') {
    header('Location:https://api.whatsapp.com/send?phone='.$set['wa'].'&text=Assalamualaikum :)%0ASaya sudah order via web The Fathiyyah, berikut data orderan saya:%0A%0A*No.Tagihan: *%0A*Nama: *%0A*Email: *%0A*No.Hp: *%0A*Alamat: *
    ');
}


?>