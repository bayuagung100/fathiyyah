<?php
session_start();
$sesi = session_id();
include "../admin/config.php";
include "../func/func_date.php";

$aksi = $_POST['aksi'];
$tagihan = $_POST['no_tagihan'];
$id_user_shop = $_POST['id_user_shop'];
$berat = $_POST['berat'];
$nama = $_POST['fullname'];
$email = $_POST['email'];
$hp = $_POST['hp'];
$provinsi = $_POST['provinsi'];
$kabupaten = $_POST['kabupaten'];
$kecamatan = $_POST['kecamatan'];
$kode_pos = $_POST['kode_pos'];
$alamat = $_POST['alamat'];
$cour = $_POST['cour'];
$service = $_POST['service'];
$price = explode("-",$service);

if ($aksi == 'billing') {
    echo'aksi:'.$aksi.'<br>';
    echo'tagihan:'.$tagihan.'<br>';
    echo'id_user_shop:'.$id_user_shop.'<br>';
    echo'berat:'.$berat.'<br>';
    echo'nama:'.$nama.'<br>';
    echo'email:'.$email.'<br>';
    echo'hp:'.$hp.'<br>';
    echo'provinsi:'.$provinsi.'<br>';
    echo'kabupaten:'.$kabupaten.'<br>';
    echo'kecamatan:'.$kecamatan.'<br>';
    echo'kode_pos:'.$kode_pos.'<br>';
    echo'alamat:'.$alamat.'<br>';
    echo'cour:'.$cour.'<br>';
    echo'service:'.$service.'<br>';
    echo'price:'.$price[1].'<br>';

    // $query = mysqli_query($mysqli,"SELECT * FROM order_temp WHERE id_session='$sesi' ");
    // while ($data = mysqli_fetch_array ($query)) {
    //     $oid = $data['id'];
    //     $oip = $data['id_produk'];
    //     $oj = $data['jumlah'];
    //     $uo = $data['ukuran'];
    //     $ot = $data['tanggal'];

    //     $insuser = mysqli_query($mysqli, "INSERT INTO pembelian
    //         (
    //             no_tagihan,
    //             id_user_shop,
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
    //         values
    //         (
    //         '$tagihan',
    //         '$id_user_shop',
    //         '$oip',
    //         '$oj',
    //         '$uo',
    //         '$ot',
    //         '$nama',
    //         '$email',
    //         '$hp',
    //         '$city',
    //         '$pos',
    //         '$alamat',
    //         'new'                
    //         )
    //     ");
    //     if ($insuser) {
    //         $deltemp = mysqli_query($mysqli,"DELETE FROM order_temp WHERE id='$oid' AND id_session='$sesi' ");
    //     }
    // }

    // $mail_tagihan = strip_tags(htmlspecialchars($tagihan));
    // $mail_name = strip_tags(htmlspecialchars($nama));
    // $mail_email_address = strip_tags(htmlspecialchars($email));
    // $mail_phone = strip_tags(htmlspecialchars($hp));

    // $query2 = mysqli_query($mysqli,"SELECT * FROM pembelian WHERE no_tagihan='$tagihan' ");
    // $dtpem = mysqli_fetch_array ($query2);

    // // Create the email and send the message
    // $to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
    // $email_subject = "Tagihan Telah Dibuat";
    // $email_body = "Halo, $mail_name!\n\n";
    // $email_body .= "Email ini adalah pemberitahuan Tagihan Anda yang dibuat pada $dtpem[tanggal]\n\n";
    // $email_body .= "No.Tagihan: $tagihan\n\n";
    // $email_body .= "Items Tagihan: \n\n";
    // $query3 = mysqli_query($mysqli,"SELECT * FROM pembelian WHERE no_tagihan='$tagihan' ");
    // while ($mail = mysqli_fetch_array($query3)) {
    //     $mip = $mail['id_produk'];
    //     $mj = $mail['jumlah'];
    //     $mu = $mail['ukuran'];
    //     $mquery = mysqli_query($mysqli,"SELECT * FROM product WHERE id='$mip' ");
    //     while ($dquery = mysqli_fetch_array($mquery)) {
    //         $dqnp = $dquery['nama_product'];
    //         $dqh = $dquery['harga'];
    //         $dqb = $dquery['berat'];

    //         $ib = $mj*$dqb;
    //         $it = $mj*$dqh;
    //         $total += $it;
    //         $total_berat += $ib;

    //         $email_body .= "- $dqnp\n";
    //         $email_body .= "Ukuran: $mu\n";
    //         $email_body .= "Berat: ".$dqb."(gram) x ".$mj." = ".$ib."(gram)\n";
    //         $email_body .= "Harga: ".rupiah($dqh)." x ".$mj." = ".rupiah($it)."\n\n";

    //     }
    // }
    // $email_body .= "Total Berat: ".$total_berat."\n";
    // $email_body .= "Ongkir: ".rupiah($total)."\n";
    // $email_body .= "Total Tagihan: ".rupiah($total)."\n\n";
    // $email_body .= "----------------------------------------------------------------------\n\n";
    // $email_body .= "Anda dapat melakukan pembayaran ke rekening kami, sebagai berikut:\n";
    // $email_body .= "*Mohon sertakan No.Tagihan / Invoice Number, untuk konfirmasi pembayaran.\n\n";
    // $bankquery = mysqli_query($mysqli,"SELECT * FROM bank_transfer");
    // while ($b = mysqli_fetch_array($bankquery)) {
    //     $nama_bank = $b['nama_bank'];
    //     $no_rek = $b['no_rek'];
    //     $nama_pemilik = $b['nama_pemilik'];

    //     $email_body .= "- $nama_bank\n";
    //     $email_body .= "No Rekening: $no_rek\n";
    //     $email_body .= "a/n: $nama_pemilik\n\n";
    // }
    // $email_body .= "\n\n\n";
    // $email_body .= "Terima Kasih.\n";
    // $email_body .= "www.thefathiyyah.com";
    // $headers = "From: thefathiyyah@erolperkasamandiri.co.id\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
    // $headers .= "Reply-To: $mail_email_address";
    // mail($to,$email_subject,$email_body,$headers);
    // header('Location:../payment/');

}
