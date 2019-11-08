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
						<input type="hidden" name="aksi" value="billing">
						<input type="hidden" name="no_tagihan" value="<?php echo $nt; ?>">
						<input type="hidden" name="id_user_shop" value="<?php echo isset($_SESSION['id']); ?>">
						
						<?php
							$total_berat=0;
							$temp = mysqli_query($mysqli, "SELECT * FROM order_temp WHERE id_session='$sesi' ");
								while ($dt = mysqli_fetch_array($temp)){
									$id = $dt['id'];
									$ip = $dt['id_produk'];
									$jp = $dt['jumlah'];
									$uk = $dt['ukuran'];
									$tp = mysqli_query($mysqli, "SELECT * FROM product WHERE id='$ip' ");
									while ($dp = mysqli_fetch_array($tp)){
										$np = $dp['nama_product'];
										$pic = "../media/source/".$dp['gambar'];
										$hp = $dp['harga'];
										$bp = $dp['berat'];
			
										$tb = $jp*$bp;
										$total_berat += $tb;
									}
								}
						?>
						<input type="hidden" name="berat" value="<?php echo $total_berat; ?>">
						<div class="row">
							<div class="col-md-2">
								<label for="fullname">Nama</label>
							</div>
							<div class="col-md-10">
								<input type="text" id="fullname" name="fullname" placeholder="Nama Lengkap" required value="<?php echo isset($_SESSION['nama']); ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<label for="email">Email</label>
							</div>
							<div class="col-md-10">
								<input type="text" id="email" name="email" placeholder="name@example.com" required value="<?php echo isset($_SESSION['email']); ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<label for="hp">No.HP</label>
							</div>
							<div class="col-md-10">
								<input type="text" id="hp" name="hp" placeholder="08xxxxxxxxxx" required value="<?php echo isset($_SESSION['hp']); ?>">
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
											"key: b9af4b97d056d2761d0e7d69f9ff475d"
										),
									));

									$response = curl_exec($curl);
									$err = curl_error($curl);

									$data = json_decode($response, true);
									for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {
										echo "<option value='" . $data['rajaongkir']['results'][$i]['province_id'] . "'>" . $data['rajaongkir']['results'][$i]['province'] . "</option>";
									}
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
								<input type="text" value="" name='kode_pos' id='kode_pos' required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-2">
								<label for="alamat">Alamat Pengiriman</label>
							</div>
							<div class="col-md-10">
								<textarea id="alamat" name="alamat" placeholder="Alamat Pengiriman" style="height:200px" required><?php echo isset($_SESSION['alamat']); ?></textarea>
							</div>
						</div>
						<br>
						<button type="submit" class="btn btn-cart">Next</button>
					</form>
				</div>
			</div>

			<!-- <?php
					echo '				
				<div class="col-md-4">
				<div class="card">
                <h3 class="text-center"><b>Summary Order</b></h3>
				<hr>
				<p>No.Tagihan: ' . $nt . '</p>
				<table class="table table-xs">
					<tr>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				';
					$total = 0;
					$temp = mysqli_query($mysqli, "SELECT * FROM order_temp WHERE id_session='$sesi' ");
					while ($dt = mysqli_fetch_array($temp)) {
						$id = $dt['id'];
						$ip = $dt['id_produk'];
						$jp = $dt['jumlah'];
						$tp = mysqli_query($mysqli, "SELECT * FROM product WHERE id='$ip' ");
						while ($dp = mysqli_fetch_array($tp)) {
							$np = $dp['nama_product'];
							$pic = "../media/source/" . $dp['gambar'];
							$hp = $dp['harga'];

							$it = $jp * $hp;
							$total += $it;
							echo '
					<tr class="item-row">
						<td><h5>' . $np . '</h5></td>
						<td class="text-right" title="Quantity">' . $jp . '</td>
						<td class="text-right" title="Items Total">' . rupiah($it) . '</td>
					</tr>
					';
						}
					}
					echo '
					<tr class="total-row info" style="background: #d9edf7;">
						<td class="text-right" colspan="2"><b>Total:</b></td>
						<td class="text-right">' . rupiah($total) . '</td>
						
					</tr>
				</table>
				</div>
				</div>
				';


					?> -->


		</div>

	</div>
	</div>
</section>
<?php
include '../website/footer.php';
?>