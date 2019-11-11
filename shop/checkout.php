<?php
session_start();
include '../admin/config.php';
include '../website/header.php';
?>

<section class="bg-light page-section">
	<div class="container">

		<div class="row" style="padding: 20px">
			<!-- <div class="col-md-12 text-center" style="padding: 20px">
				<ul class="breadcrumb">
					<li><a href="<?php echo $set["url"]; ?>">Home</a></li>
					<li class="active">Cart</li>
				</ul>
            </div> -->

			<div class="col-md-12" style="max-width: 700px;position: relative;margin: auto;">
				<?php
				$query = mysqli_query($mysqli, "SELECT * FROM order_temp WHERE id_session='$sesi' ");
				$data = mysqli_fetch_array($query);

				$nt = str_replace('-', '', $data['tanggal']) . $data['id'] . $data['id_produk'];
				?>
				<div class="card">
					<h3 class="text-center"><b>Billing Information</b></h3>
					<hr>
					<form method="post" action="<?php echo $set["url"]; ?>billing/">
						<!-- <form method="get" action="http://localhost/fathiyyah/shop/billing.php"> -->
						<input type="hidden" id="aksi" name="aksi" value="billing">
						<input type="hidden" id="no_tagihan" name="no_tagihan" value="<?php echo $nt; ?>">
						<input type="hidden" id="id_user_shop" name="id_user_shop" value="<?php if (isset($_SESSION['id'])) {echo $_SESSION['id'];} ?>">
						<?php
						$total_berat = 0;
						$temp = mysqli_query($mysqli, "SELECT * FROM order_temp WHERE id_session='$sesi' ");
						while ($dt = mysqli_fetch_array($temp)) {
							$id = $dt['id'];
							$ip = $dt['id_produk'];
							$jp = $dt['jumlah'];
							$uk = $dt['ukuran'];
							$tp = mysqli_query($mysqli, "SELECT * FROM product WHERE id='$ip' ");
							while ($dp = mysqli_fetch_array($tp)) {
								$np = $dp['nama_product'];
								$pic = "../media/source/" . $dp['gambar'];
								$hp = $dp['harga'];
								$bp = $dp['berat'];

								$tb = $jp * $bp;
								$total_berat += $tb;
							}
						}
						?>
						<input type="hidden" id="berat" name="berat" value="<?php echo $total_berat; ?>">
						<div class="row">
							<div class="col-md-2">
								<label for="fullname">Nama</label>
							</div>
							<div class="col-md-10">
								<input type="text" id="fullname" name="fullname" placeholder="Nama Lengkap" required value="<?php if (isset($_SESSION['nama'])) {echo $_SESSION['nama'];} ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<label for="email">Email</label>
							</div>
							<div class="col-md-10">
								<input type="text" id="email" name="email" placeholder="name@example.com" required value="<?php if (isset($_SESSION['email'])) {echo $_SESSION['email'];} ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<label for="hp">No.HP</label>
							</div>
							<div class="col-md-10">
								<input type="text" id="hp" name="hp" placeholder="08xxxxxxxxxx" required value="<?php if (isset($_SESSION['hp'])) {echo $_SESSION['hp'];} ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="provinsi">Provinsi</label>
								<select name='provinsi' id='provinsi' required>
									<option value="">Pilih Provinsi</option>
									<?php
									//Get Data Provinsi
									$curl = curl_init();

									curl_setopt_array($curl, array(
										CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
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

									$data = json_decode($response, true);
									for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {
										echo "<option prov_id='" . $data['rajaongkir']['results'][$i]['province_id'] . "' value='" . $data['rajaongkir']['results'][$i]['province'] ."'>" . $data['rajaongkir']['results'][$i]['province'] . "</option>";
									}
									echo $response;
									?>
								</select>
							</div>
							<div class="col-md-6">
								<label for="kabupaten">Kota/Kabupaten</label>
								<select name='kabupaten' id='kabupaten' required>
									<option value="">Pilih Kota/Kabupaten</option>
								</select>
							</div>
							<div class="col-md-6">
								<label for="kecamatan">Kecamatan</label>
								<select name='kecamatan' id='kecamatan'>
									<option value="">Pilih Kecamatan</option>
								</select>
							</div>
							<div class="col-md-6">
								<label for="kode_pos">Kode Pos</label>
								<input type="text" name='kode_pos' id='kode_pos' required value="<?php if (isset($_SESSION['pos'])) {echo $_SESSION['pos'];} ?>">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-2">
								<label for="alamat">Alamat Pengiriman</label>
							</div>
							<div class="col-md-10">
								<textarea id="alamat" name="alamat" placeholder="Alamat Pengiriman" style="height:200px" required><?php if (isset($_SESSION['alamat'])) {echo $_SESSION['alamat'];} ?></textarea>
							</div>
						</div>
						<hr>
						<h5>Opsi Pengiriman</h5>
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
						<br>
						<button type="submit" class="btn btn-cart">Buat Pesanan</button>
					</form>
				</div>
			</div>

			

		</div>

	</div>
	</div>
</section>
<?php
include '../website/footer.php';
?>