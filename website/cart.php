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
				<table class="text-center" style="overflow-x:auto;">
					<tr>
						<th>ITEM NAME</th>
						<th>QUANTITY</th>
						<th>PRICE</th>
						<th>ITEMS TOTAL</th>
					</tr>
				';	
				$total=0;
				$temp = mysqli_query($mysqli, "SELECT * FROM order_temp WHERE id_session='$sesi' ");
					while ($dt = mysqli_fetch_array($temp)){
						$id = $dt['id'];
						$ip = $dt['id_produk'];
						$jp = $dt['jumlah'];
						$tp = mysqli_query($mysqli, "SELECT * FROM product WHERE id='$ip' ");
						while ($dp = mysqli_fetch_array($tp)){
							$np = $dp['nama_product'];
							$pic = "../media/source/".$dp['gambar'];
							$hp = $dp['harga'];

							$it = $jp*$hp;
							$grandtotal = $total + $it;
				echo'
					<tr>
						<td><h5>'.$np.'</h5><br><img class="img-product-home text-center lazy" style="max-width:100px;max-height:100px" data-original="'.$pic.'" src="../img/loader.gif"></td>
						<td>'.$jp.'</td>
						<td>'.rupiah($hp).'</td>
						<td>'.rupiah($it).'</td>
						<td><a href="http://localhost/fathiyyah/action.php?id='.$id.'&act=delete"><i class="fas fa-trash"></i> Delete</a></td>
					</tr>
					';
						}
					}
				echo'
					<tr>
						<td></td>
						<td></td>
						<td><b>Total </b></td>
						<td>'.rupiah($grandtotal).'</td>
					</tr>
				</table>
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

