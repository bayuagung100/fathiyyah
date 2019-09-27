<?php include '../admin/config.php';
include '../website/header.php';
?>

<section class="bg-light page-section" id="category">
	<div class="container">

		<div class="row" style="padding: 20px">
			<div class="col-md-12 text-center" style="padding: 20px">
				<ul class="breadcrumb">
					<li><a href="<?php echo $set["url"];?>">Home</a></li>
					<li class="active">Cart</li>
				</ul>
            </div>
            
            <div class="col-md-8">
                <div class="card">
                <h3 class="text-center"><b>Billing Information</b></h3>
                <hr>
				<form method="get" action="<?php echo $set["url"];?>shop/action.php">
					<div class="row">
						<div class="col-md-2">
						<label for="fullname">Name</label>
						</div>
						<div class="col-md-10">
						<input type="text" id="fullname" name="fullname" placeholder="Full Name">
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
						<label for="email">Email</label>
						</div>
						<div class="col-md-10">
						<input type="email" id="email" name="email" placeholder="name@example.com">
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
						<label for="hp">Phone</label>
						</div>
						<div class="col-md-10">
						<input type="text" id="hp" name="hp" placeholder="08xxxxxxxxxx">
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
						<label for="city">City</label>
						</div>
						<div class="col-md-4">
						<input type="text" id="city" name="city" placeholder="Jakarta">
						</div>
						<div class="col-md-2">
						<label for="pos">Postal Code</label>
						</div>
						<div class="col-md-4">
						<input type="text" id="pos" name="pos" placeholder="15710">
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
						<label for="alamat">Shipping Address</label>
						</div>
						<div class="col-md-10">
						<textarea id="alamat" name="alamat" placeholder="Shipping Address" style="height:200px"></textarea>
						</div>
					</div>
					<button type="submit" class="btn btn-cart">Continue to Payment</button>
				</form>
                </div>
            </div>

			<?php 
			$query = mysqli_query($mysqli, "SELECT * FROM order_temp WHERE id_session='$sesi' ");
			$cek = mysqli_num_rows($query);
			
				echo '
				
				<div class="col-md-4">
				<div class="card">
                <h3 class="text-center"><b>Summary Order</b></h3>
                <hr>
				<table class="table table-xs">
					<tr>
						<th>ITEM NAME</th>
						<th class="text-right">QUANTITY</th>
						<th class="text-right">ITEMS TOTAL</th>
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
							$total += $it;
				echo'
					<tr class="item-row">
						<td><a href="'.$set["url"].'product/'.$ip.'/detail/"><h5>'.$np.'</h5></a><br><img class="img-product-home text-center lazy" style="max-width:100px;max-height:100px" data-original="'.$pic.'" src="../img/loader.gif"></td>
						<td class="text-right" title="Quantity">'.$jp.'</td>
						<td class="text-right" title="Items Total">'.rupiah($it).'</td>
					</tr>
					';
						}
					}
				echo'
					<tr class="total-row info" style="background: #d9edf7;">
						<td class="text-right" colspan="2"><b>Total:</b></td>
						<td class="text-right">'.rupiah($total).'</td>
						
					</tr>
				</table>
				</div>
				</div>
				';
				
			
			?>


		</div>

		</div>
	</div>
</section>
<?php 	
include '../website/footer.php';
?>

