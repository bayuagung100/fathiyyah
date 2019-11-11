<?php
$id_kabupaten = isset($_POST['city_id']);
$kabupaten = $_POST['city_name'];
$kurir = $_POST['cour'];
$berat = $_POST['berat'];
include '../admin/config.php';

if (!empty($id_kabupaten)) {
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "origin=153&destination=" . $id_kabupaten . "&weight=" . $berat . "&courier=" . $kurir . "",
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
		$data = json_decode($response, true); //decode response dari raja ongkir, json ke array
		$code = $data['rajaongkir']['results'][0]['code'];
		$kurir = $data['rajaongkir']['results'][0]['name'];
		$costs = $data['rajaongkir']['results'][0]['costs'];

		echo '
		<p>Pilih layanan:<br>
		Jakarta Selatan ke '.$kabupaten.' @'.$berat.' gram
		</p>';

		for ($i = 0; $i < count($costs); $i++) {
			$service = $data['rajaongkir']['results'][0]['costs'][$i]['service'];
			$desc = $data['rajaongkir']['results'][0]['costs'][$i]['description'];
			$value = $data['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['value'];
			$etd = str_replace("HARI", "", $data['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['etd']);



			echo '
			<label>
				<input type="radio" name="service" value="' . $service . '-'.$value.'" required">
				<div class="list-ekspedisi"">
					<div class="row">
						<div class="col-md-4 col-sm-12" style="text-transform:uppercase">
						<h5>' . $code . '</h5>
						</div>
						<div class="col-md-4 col-sm-12">
						<span>
						<b>' . $service . '</b> (Sampai dalam ' . $etd . ' hari)
						</span>
						<br>
						<span class="hidden-sm">
						' . $desc . '
						</span>
						</div>
						<div class="col-md-4">
						<p class="pull-right" style="color:red">' . rupiah($value) . '</p>
						</div>
					</div>
				</div>
			</label>				
				';
		}
		echo '<input type="hidden" id="price">';
	}
} else {
	echo "Silahkan lengkapi Provinsi, Kota/Kabupaten, Kecamatan terlebih dahulu.";
}
?>