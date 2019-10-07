<?php
session_start();
include "../../admin/config.php";

$query = $mysqli->query("SELECT DISTINCT no_tagihan, nama, tanggal, payment FROM pembelian WHERE id_user_shop=$_SESSION[id] order by id DESC ");

$response = array();
$response["data"] = array();
while ($x = mysqli_fetch_array($query)) {
    
    $h["no_tagihan"] = $x['no_tagihan'];
    $h["nama"] = $x['nama'];
    $h["tanggal"] = $x['tanggal'];
    $h["status"] = $x['payment'];
    
    $query2 = $mysqli->query("SELECT * FROM pembelian where no_tagihan='$x[no_tagihan]'");
	  while ($d = mysqli_fetch_array($query2)) {
      $ip = $d['id_produk'];
      $jumlah = $d['jumlah'];
      $ukuran = $d['ukuran'];
      $query3 = $mysqli->query("SELECT * FROM product where id='$ip'");
      while ($xd = mysqli_fetch_array($query3)) {
        $h["nama_produk"][] = $xd['nama_product'];
        $h["ukuran"][] = $ukuran;
        $h["jumlah"][] = $jumlah;
        $h["harga"][] = $xd['harga'];
      }
    }
    
    array_push($response["data"], $h);

}
echo json_encode($response, JSON_UNESCAPED_SLASHES);


?>