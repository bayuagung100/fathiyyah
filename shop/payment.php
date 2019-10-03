<?php
session_start();
include '../admin/config.php';
include '../website/header.php';
?>

<section class="bg-light page-section" id="category">
	<div class="container">

		<div class="row" style="padding: 20px">
			<div class="col-md-12 text-center" style="padding: 20px">
				<ul class="breadcrumb">
					<li><a href="<?php echo $set["url"]; ?>">Home</a></li>
					<li class="active">Cart</li>
				</ul>
			</div>

			<div class="col-md-12">
				<div class="card">
					<h3 class="text-center"><b>Pembayaran melalui Transfer Bank</b></h3>
					<hr>
					<p>Kami menerima pembayaran Transfer Bank di Indonesia dengan berbagai cara,
						diantaranya adalah melalui Internet Banking, Transfer ATM, m-Banking, SMS Banking,
						Setoran Tunai maupun Phone Banking.
						Semua pembayaran produk dan layanan dapat dilakukan melalui rekening bank berikut ini:</p>
					<ul style="list-style: none;">
						<li style="padding:10px">
							<p>
								<b>Mandiri</b>
								<br>
								No Rekening: 1510002481999
								<br>
								a.n: SELLY PATRICIA AROR
							</p>
							<!-- <a href="" class="btn btn-cart"><img class="img-product-home" src="../img/bank-transfer.png"></a> -->
						</li>
						<!-- <li style="padding:10px">
							<a href="<?php echo $set["url"]; ?>shop/action.php?act=payment&method=whatsapp" class="btn btn-cart"><img class="img-product-home" src="../img/whatsapp.png"></a>
						</li> -->
					</ul>
					<p>Setelah melakukan pembayaran, mohon melakukan konfirmasi pembayaran Anda melalui form di bawah ini dengan detail pembayaran yang benar.</p>
					<p><b>Anda wajib menyertakan bukti pembayaran berupa lampiran / attachment: Bukti Pembayaran dari ATM, Internet Banking, SMS Banking atau BANK.</b></p>
					<p>Kami akan segera memproses order Anda maksimal 1x24 jam di jam kerja kami.</p>
					<p>Catatan:</p>
					<ul>
						<li>
							<p>Mohon sertakan No.Tagihan / Invoice Number pada diskripsi pembayaran Anda di kolom Catatan.</p>
						</li>
						<li>
							<p>Mohon hubungi kami di Whatsapp <?php echo "+" . $set['wa']; ?>, jika ingin konfirmasi pembayaran via Whatsapp.</p>
						</li>
					</ul>

					<form method="post" action="" class="container">
						<label for="bank_tujuan"><b>Bank Tujuan</b></label>
						<select id="bank_tujuan" name="bank_tujuan" required>
							<option value="">Pilih Bank Tujuan</option>
						</select>
						<br>
						<label for="bank_pengirim"><b>Bank Pengirim</b></label>
						<input type="text" id="bank_pengirim" name="bank_pengirim" placeholder="misal: Bank BCA" required>
						<br>
						<label for="no_rek_pengirim"><b>Nomor Rekening Pengirim</b></label>
						<input type="text" id="no_rek_pengirim" name="no_rek_pengirim" placeholder="123123123123 atau no resi transfer Bank" required>
						<br>
						<label for="nama_pengirim"><b>Nama Pengirim</b></label>
						<input type="text" id="nama_pengirim" name="nama_pengirim" placeholder="misal: John doe" required>
						<br>
						<label for="tgl_transfer"><b>Tanggal Transfer</b></label>
						<input type="date" id="tgl_transfer" min="<?php echo date('Y-m-d',strtotime("-1 month"));?>" max="<?php echo date('Y-m-d');?>" value="<?php echo date('Y-m-d');?>" required>
						<br>
						<label for="bukti_pembayaran"><b>Upload Bukti Pembayaran</b></label>
						<input type="file" id="bukti_pembayaran" name="bukti_pembayaran" required>
						<span>File didukung: .jpeg, .jpg dan .png</span>
						<br>
						<label for="catatan"><b>Catatan</b></label>
						<textarea id="catatan" name="catatan" style="height:200px" placeholder="misal: No.Tagihan: 123123123" required></textarea>
						<br>
						<br>
						<button type="submit" name="payment" class="btn btn-cart">Kirim</button>
						<br>
						<br>
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