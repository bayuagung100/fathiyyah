<?php
session_start();
$sesi = session_id();
include "../admin/config.php";
include "../func/func_date.php";

$aksi = $_GET['aksi'];
$tagihan = $_GET['no_tagihan'];
$id_user_shop = $_GET['id_user_shop'];
$nama = $_GET['fullname'];
$email = $_GET['email'];
$hp = $_GET['hp'];
$city = $_GET['city'];
$pos = $_GET['pos'];
$alamat = $_GET['alamat'];

if ($aksi=='billing') {
    $query = mysqli_query($mysqli,"SELECT * FROM order_temp WHERE id_session='$sesi' ");
    while ($data = mysqli_fetch_array ($query)) {
        $oid = $data['id'];
        $oip = $data['id_produk'];
        $oj = $data['jumlah'];
        $uo = $data['ukuran'];
        $ot = $data['tanggal'];
    
        $insuser = mysqli_query($mysqli, "INSERT INTO pembelian
            (
                no_tagihan,
                id_user_shop,
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
            values
            (
            '$tagihan',
            '$id_user_shop',
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
        if ($insuser) {
            $deltemp = mysqli_query($mysqli,"DELETE FROM order_temp WHERE id='$oid' AND id_session='$sesi' ");
        }
    }
    header('Location:../payment/');
    // while ($data = mysqli_fetch_array($query)) {
    //     $oid = $data['id'];
    //     $oip = $data['id_produk'];
    //     $oj = $data['jumlah'];
    //     $uo = $data['ukuran'];
    //     $ot = $data['tanggal'];
    //     $query2 = mysqli_query($mysqli,"INSERT INTO order
    //         (
    //             no_tagihan,
    //             id_produk,
    //             jumlah,
    //             ukuran,
    //             tanggal,
    //             nama,
    //             email,
    //             hp,
    //             kota,
    //             pos,
    //             alamat,
    //             payment
    //         )
    //         VALUES
    //         (
                // '$tagihan',
                // '$oip',
                // '$oj',
                // '$uo',
                // '$ot',
                // '$nama',
                // '$email',
                // '$hp',
                // '$city',
                // '$pos',
                // '$alamat',
                // 'new'
    //         )
    //     ");
    //     if ($query2 === TRUE) {
    //         echo "New record created successfully";
    //     } else {
    //         echo "Error: " . $query2 . "<br>" . $mysqli->error;
    //     }
    // }
    // header('Location:../payment/');
}



?>