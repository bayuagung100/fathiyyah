<?php
session_start();
include '../admin/config.php';
include '../website/header.php';
?>

<section class="bg-light page-section">
    <div class="container">

        <div class="row" style="padding: 20px">
            <div class="col-md-12 text-center" style="padding: 20px">
                <ul class="breadcrumb">
                    <li><a href="<?php echo $set["url"]; ?>">Home</a></li>
                    <li class="active">Cek Ongkir</li>
                </ul>
            </div>
            <div class="container">
                <p>Semua barang dikirim dari Toko Kami(Jakarta Selatan)</p>
                <div class="text-center">
                    <img src="https://4.bp.blogspot.com/-fFDLpgZ1Phc/WmodcSFG05I/AAAAAAAAAU0/uYmDnAgjIFkukgg1KsMxoHmocJY-BmENgCLcBGAs/s1600/jne.jpg">
                    <img src="https://4.bp.blogspot.com/-pDkLCuqPJy4/WmoddcsTDbI/AAAAAAAAAVA/zjQfPv-jthUpgPxuxqiPKDSdP5f43xu8gCLcBGAs/s1600/pos.jpg">
                    <img src="https://2.bp.blogspot.com/-UGUohE6I-1M/Wmoddl7IecI/AAAAAAAAAVI/HuGEyMIU6Yg17jPfGflEtfnb7gHd2-zmACLcBGAs/s1600/tiki.jpg">
                </div>
                <form action="" method="get" style="margin-bottom:10px">
                    <div class="row">
                        <?php
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                            CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
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

                        $listKota = array(); //bikin array untuk nampung list kota

                        if ($err) {
                            echo "cURL Error #:" . $err;
                        } else {
                            $arrayResponse = json_decode($response, true); //decode response dari raja ongkir, json ke array

                            $tempListKota = $arrayResponse['rajaongkir']['results']; // ambil array yang dibutuhin aja, disini resultnya aja

                            //looping array temporary untuk masukin object yang kita butuhin
                            foreach ($tempListKota as $value) {
                                //bikin object baru
                                $kota = new stdClass();
                                $kota->id = $value['city_id']; //id kotanya
                                $kota->nama = $value['city_name']; //nama kotanya
                                $kota->type = $value['type']; //nama type
                                $kota->pos = $value['postal_code']; //nama kotanya

                                array_push($listKota, $kota); //push object kota yang kita bikin ke array yang nampung list kota

                            }

                            //$listKota : udah berisi list kota yang kita butuhin
                            echo '
                        <div class="col-md-4">
                            <label for="city">Kota/Kabupaten Tujuan</label>
                            <select id="city" name="tujuan" required>
                            <option value="">Pilih Tujuan</option>
                        ';
                            //ini untuk ngecek aja isi $list kota udah bener apa belum
                            foreach ($listKota as $kota) {

                                echo '
                            
                            <option value="' . $kota->id . '">' . $kota->nama . ' ('.$kota->type.')</option>

                        ';
                            }
                            echo '</select>
                        </div>
                        ';
                        }

                        
                        ?>
                        
                        <div class="col-md-4">
                            <label for="berat">Berat kiriman (*gram):</label>
                            <input type="number" name="berat" placeholder="10" min="1" required>
                        </div>
                        <div class="col-md-4">
                            <label for="ekspedisi">Ekspedisi</label>
                            <select id="ekspedisi" name="ekspedisi" required>
                                <option value="">Pilih Ekspedisi</option>
                                <option value="jne">JNE</option>
                                <option value="tiki">Tiki</option>
                                <option value="pos">POS</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-cart">Cek Ongkir</button>
                </form>

                <?php
                if (isset($_GET['tujuan']) and isset($_GET['berat']) and isset($_GET['ekspedisi'])) {
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS => "origin=153&destination=" . $_GET['tujuan'] . "&weight=" . $_GET['berat'] . "&courier=" . $_GET['ekspedisi'] . "",
                        CURLOPT_HTTPHEADER => array(
                            "content-type: application/x-www-form-urlencoded",
                            "key: 772b99fdc5a62231d8a83772580ae8fa"
                        ),
                    ));

                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err) {
                        echo "cURL Error #:" . $err;
                    } else {
                        echo '
                        <div class="table-responsive"> 
                        <table class="table">
                            <thead>
                                <th>Ekspedisi</th>
                                <th>Jenis Layanan</th>
                                <th>Estimasi(*hari)</th>
                                <th>Harga</th>
                            </thead>
                            <tbody>';

                        $data = json_decode($response, true); //decode response dari raja ongkir, json ke array
                        $kurir = $data['rajaongkir']['results'][0]['name'];
                        $costs = $data['rajaongkir']['results'][0]['costs'];
                        for ($i = 0; $i < count($costs); $i++) {
                            $service = $data['rajaongkir']['results'][0]['costs'][$i]['service'];
                            $desc = $data['rajaongkir']['results'][0]['costs'][$i]['description'];
                            $value = $data['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['value'];
                            $etd = $data['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['etd'];

                            echo '
                                <tr>
                                    <td>
                                        <b>' . $kurir . '</b>
                                    </td>
                                    <td>
                                        <b>' . $service . '</b><br>
                                        ' . $desc . '
                                    </td>
                                    <td>
                                        ' . $etd . '
                                    </td>
                                    <td>
                                        <b>' . rupiah($value) . '</b>
                                    </td>
                                </tr>
                                ';
                        }

                        echo '
                            </tbody>
                        </table>
                        </div>
                        ';
                    }
                }
                ?>

            </div>
        </div>
    </div>
</section>
<?php
include '../website/footer.php';
?>