<?php include 'header.php';?>

<section class="bg-light page-section" id="category">
	<div class="container">

		<div class="row" style="padding: 20px">
			<div class="col-md-12 text-center" style="padding: 20px">
				<ul class="breadcrumb">
					<li><a href="<?php echo $set["url"];?>">Home</a></li>
					<li class="active">Cart</li>
				</ul>
			</div>

			<?php 
			$query = mysqli_query($mysqli, "SELECT * FROM order_temp WHERE id_session='$sesi' ");
			$cek = mysqli_num_rows($query);
			if ($cek > 0) {
				echo '
				<div class="col-md-12">
				<table class="table table-xs">
					<tr>
						<th>Nama Produk</th>
						<th class="text-right">Ukuran</th>
						<th class="text-right">Qty</th>
						<th class="text-right">Berat</th>
						<th class="text-right">Harga</th>
						<th class="text-right">Total Harga</th>
						<th class="text-right">Total Berat</th>
						<th></th>
					</tr>
				';	
				$total=0;
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

							$it = $jp*$hp;
							$total += $it;
							$total_berat += $tb;
				echo'
					<tr class="item-row">
						<td><a href="'.$set["url"].'product/'.$ip.'/detail/"><h5>'.$np.'</h5></a><br><img class="img-product-home text-center" style="max-width:100px;max-height:100px" src="'.$pic.'"></td>
						<td class="text-right" title="Ukuran">'.$uk.'</td>
						<td class="text-right" title="Qty">'.$jp.'</td>
						<td class="text-right" title="Berat">'.$bp.' (gram)</td>
						<td class="text-right" title="Harga">'.rupiah($hp).'</td>
						<td class="text-right" title="Total Harga">'.rupiah($it).'</td>
						<td class="text-right" title="Total Berat">'.$tb.' (gram)</td>
						<td><a href="'.$set["url"].'shop/action.php?id='.$id.'&act=delete"><i class="fas fa-trash"></i> Delete</a></td>
					</tr>
					';
						}
					}
				echo'
					<tr class="total-row info" style="background: #d9edf7;">
						<td class="text-right" colspan="5"><b>Total:</b></td>
						<td class="text-right" style="border-right: 1px solid black;">'.rupiah($total).'</td>
						<td class="text-right">'.$total_berat.' (gram)</td>
						<td></td>
					</tr>
				</table>
				</div>
				';
				echo'
				<div class="col-md-12" style="text-align:center;">
					<a class="btn btn-primary" href="'.$set["url"].'shop/action.php?act=checkout" style="color:#a5758c;"><h3><i class="fas fa-credit-card"></i> CheckOut</h3></a>
				</div>
				';
			}else{
				echo'
				<div class="col-md-12" style="text-align:center;">
					<img class="img-product-home" src="../img/emptycart.png" style="max-width:300px;max-height:300px">
					<p><b>Your Cart Is Empty</b></p>
					<br>
					<a class="btn btn-primary" href="'.$set["url"].'product/" style="color:#a5758c;"><h3>Shop Now</h3></a>
				</div>
				';
			}
			?>


		</div>

		</div>
	</div>
</section>
<?php 	
include 'footer.php';
?>

