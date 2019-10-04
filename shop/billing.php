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
        // if ($insuser) {
        //     $deltemp = mysqli_query($mysqli,"DELETE FROM order_temp WHERE id='$oid' AND id_session='$sesi' ");
        // }
    }

    $mail_tagihan = strip_tags(htmlspecialchars($tagihan));
    $mail_name = strip_tags(htmlspecialchars($nama));
    $mail_email_address = strip_tags(htmlspecialchars($email));
    $mail_phone = strip_tags(htmlspecialchars($hp));

    $query2 = mysqli_query($mysqli,"SELECT * FROM pembelian WHERE no_tagihan='$tagihan' ");
    $dtpem = mysqli_fetch_array ($query2);

    // Create the email and send the message
    $to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
    $email_subject = "Tagihan Telah Dibuat";
    $email_body = "Halo, $mail_name!\n\n";
    $email_body .= "Email ini adalah pemberitahuan Tagihan Anda yang dibuat pada $dtpem[tanggal]\n\n";
    $email_body .= "No.Tagihan: $tagihan\n\n";
    $email_body .= "Items Tagihan: \n\n";
    // $query3 = mysqli_query($mysqli,"SELECT * FROM pembelian WHERE no_tagihan='$tagihan' ");
    while ($mail = mysqli_fetch_array($query2)) {
        $mip = $mail['id_produk'];
        $mj = $mail['jumlah'];
        $mu = $mail['ukuran'];
        $mquery = mysqli_query($mysqli,"SELECT * FROM product WHERE id='$mip' ");
        while ($dquery = mysqli_fetch_array($mquery)) {
            $dqnp = $dquery['nama_product'];
            $dqh = $dquery['harga'];

            $it = $mj*$dqh;
            $total += $it;
            $email_body .= "- $dqnp\nUkuran: $mu\nHarga: ".rupiah($dqh)." x ".$mj." = ".rupiah($it)."\n\n";
           
        }
    }
    $email_body .= "Total Tagihan: ".rupiah($total)."\n\n";
    $email_body .= "----------------------------------------------------------------------\n\n";
    $email_body .= "Anda dapat melakukan pembayaran ke rekening kami, sebagai berikut:\n";
    $email_body .= "*Mohon sertakan No.Tagihan / Invoice Number, untuk konfirmasi pembayaran.\n\n";
    $email_body .= "- MANDIRI\n";
    $email_body .= "No Rekening: \n";
    $email_body .= "a/n: \n";
    $email_body .= "\n\n\n\n";
    $email_body .= "Terima Kasih.";
    $headers = "From: thefathiyyah@erolperkasamandiri.co.id\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
    $headers .= "Reply-To: $mail_email_address";
    mail($to,$email_subject,$email_body,$headers);
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