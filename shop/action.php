<?php

include "../admin/config.php";
include "../func/func_date.php";

$id = $_GET['id'];
$act = $_GET['act'];
$pm = $_GET['method'];

$aksi = $_GET['aksi'];
$tagihan = $_GET['no_tagihan'];
$nama = $_GET['fullname'];
$email = $_GET['email'];
$hp = $_GET['hp'];
$city = $_GET['city'];
$pos = $_GET['pos'];
$alamat = $_GET['alamat'];

if ($aksi=='billing') {
    $query = mysqli_query($mysqli,"SELECT * FROM oreder_temp WHERE id_session='$sesi' ");
    while ($data = mysqli_fetch_array($query)) {
        $oid = $data['id'];
        $oip = $data['id_produk'];
        $oj = $data['jumlah'];
        $uo = $data['ukuran'];
        $ot = $data['tanggal'];
        $query2 = mysqli_query($mysqli,"INSERT INTO order
            (
                no_tagihan,
                id_produk,
                jumlah,
                ukuran,
                tanggal,
                nama,
                email,
                hp,
                kota,
                pos,
                alamat,
                payment
            )
            VALUES
            (
                '$tagihan',
                '$oip',
                '$oj',
                '$uo',
                '$ot',
                '$nama',
                '$email',
                '$hp',
                '$city',
                '$pos',
                '$alamat',
                'new'
            )
        ");
    }
    header('Location:../payment/');
}

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