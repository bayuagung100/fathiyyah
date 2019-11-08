<?php
session_start();
$sesi = session_id();
include "../admin/config.php";
include "../func/func_date.php";

$aksi = $_POST['aksi'];
$tagihan = $_POST['no_tagihan'];
$id_user_shop = $_POST['id_user_shop'];
$nama = $_POST['fullname'];
$email = $_POST['email'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];
$provinsi = $_POST['provinsi'];
$kabupaten = $_POST['kabupaten'];
$kecamatan = $_POST['kecamatan'];
$kode_pos = $_POST['kode_pos'];

if ($aksi == 'billing') {
    include '../website/header.php';
    echo '
    <section class="bg-light page-section">
        <div class="container">
            <div class="col-md-12" style="max-width: 700px;position: relative;margin: auto;">
                <div class="card">
                    <h3 class="text-center"><b>Opsi Pengiriman</b></h3>
                    <hr>
                    <p><b>No.Tagihan</b>: ' . $tagihan . '</p>
                    <p><b>Nama</b>: ' . $nama . '</p>
                    <p><b>Email</b>: ' . $email . '</p>
                    <p><b>No.HP</b>: ' . $hp . '</p>';
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=$provinsi",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HTTPHEADER => array(
                            "key: 772b99fdc5a62231d8a83772580ae8fa"
                        ),
                    ));

                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err) {
                        echo "cURL Error #:" . $err;
                    } else {
                        $data = json_decode($response, true);
                        $province_id = $data['rajaongkir']['results']['province_id'];
                        $province = $data['rajaongkir']['results']['province'];
                        echo $response;
                    }


                    $curl2 = curl_init();

                    curl_setopt_array($curl2, array(
                        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=$kabupaten&province=$province_id",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HTTPHEADER => array(
                            "key: 772b99fdc5a62231d8a83772580ae8fa"
                        ),
                    ));

                    $response2 = curl_exec($curl2);
                    $err2 = curl_error($curl2);

                    curl_close($curl2);

                    if ($err2) {
                        echo "cURL Error #:" . $err2;
                    } else {
                        $data2 = json_decode($response2, true);
                        $city_id = $data2['rajaongkir']['results']['city_id'];
                        $type = $data2['rajaongkir']['results']['type'];
                        $city_name = $data2['rajaongkir']['results']['city_name'];
                    }

    echo '                    
                    <p><b>Alamat Pengiriman</b>: ' . $alamat . ', ' . $kecamatan . ' - ' . $city_name . '('.$type.'), ' . $province . ' '.$kode_pos.'</p>
                    <hr>
                    <h4>Pilih Ekspedisi</h4>
                    <div class="row text-center">
                        <div class="col-md-4">
                        <label>
                            <input type="radio" id="ekspedisi_jne" name="cour" value="jne" required>
                            <img src="https://4.bp.blogspot.com/-fFDLpgZ1Phc/WmodcSFG05I/AAAAAAAAAU0/uYmDnAgjIFkukgg1KsMxoHmocJY-BmENgCLcBGAs/s1600/jne.jpg">
                            <p>JNE</p>
                        </label>
                        </div>
                        <div class="col-md-4">
                        <label>
                            <input type="radio" id="ekspedisi_pos" name="cour" value="pos" required>
                            <img src="https://4.bp.blogspot.com/-pDkLCuqPJy4/WmoddcsTDbI/AAAAAAAAAVA/zjQfPv-jthUpgPxuxqiPKDSdP5f43xu8gCLcBGAs/s1600/pos.jpg">
                            <p>POS</p>
                        </label>
                        </div>
                        <div class="col-md-4">
                        <label>
                            <input type="radio" id="ekspedisi_tiki" name="cour" value="tiki" required>
                            <img src="https://2.bp.blogspot.com/-UGUohE6I-1M/Wmoddl7IecI/AAAAAAAAAVI/HuGEyMIU6Yg17jPfGflEtfnb7gHd2-zmACLcBGAs/s1600/tiki.jpg">
                            <p>TIKI</p>
                        </label>
                        </div>
                    </div>
                    <div id="ongkir">
                    </div>
                    ';
    echo '       
                </div>
            </div>
        </div>
    </section>
    ';

    include '../website/footer.php';
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
