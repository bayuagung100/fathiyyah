<?php

include "admin/config.php";
include "func/func_date.php";
$ip = $_GET['id'];
$uk = $_GET['ukuran'];
$jl = $_GET['jumlah'];

$cek = mysqli_query($mysqli,"SELECT * FROM order_temp WHERE id_produk='$ip' 
    AND id_session='$sesi' AND ukuran='$uk' ");
$ceking = mysqli_num_rows($cek);

if ($ceking > 0){
    $tambah = mysqli_query($mysqli, "UPDATE order_temp 
        SET jumlah = jumlah + '$jl'
        WHERE id_session='$sesi' AND id_produk='$ip'
    ");
    if ($tambah) {
        echo"
        <script>window.alert('Success, Add to Cart');
        window.location=('cart/')</script>
        ";
    }else{
        echo"
        <script>window.alert('Failed');
        window.location=('".$_SERVER['HTTP_REFERER']."')</script>
        ";
    }
}else{
    $query = mysqli_query($mysqli,"INSERT INTO order_temp
        (
            id_produk,
            id_session,
            ukuran,
            jumlah,
            tanggal
        )
        VALUES 
        (
            '$ip',
            '$sesi',
            '$uk',
            '$jl',
            '$tanggal'
        )
    ");


    if ($query) {
        echo"
        <script>window.alert('Success, Add to Cart');
        window.location=('cart/')</script>
        ";
    }else{
        echo"
        <script>window.alert('Failed');
        window.location=('".$_SERVER['HTTP_REFERER']."')</script>
        ";
    }
}



?>