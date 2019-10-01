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
					<li><a href="<?php echo $set["url"];?>">Home</a></li>
					<li class="active">Cart</li>
				</ul>
            </div>
            
            <div class="col-md-7">
                <div class="card text-center">
                <h3><b>Payment Method</b></h3>
                <hr>
                <ul style="list-style: none;">
                    <li style="padding:10px">
                        <a href="" class="btn btn-cart"><img class="img-product-home" src="../img/bank-transfer.png"></a>         
                    </li>
                    <li style="padding:10px">
                        <a href="<?php echo $set["url"];?>shop/action.php?act=payment&method=whatsapp" class="btn btn-cart"><img class="img-product-home" src="../img/whatsapp.png"></a>         
                    </li>
                </ul>
                </div>
            </div>

			<?php 
			$query = mysqli_query($mysqli, "SELECT * FROM order_temp WHERE id_session='$sesi' ");
			$cek = mysqli_num_rows($query);
			
				echo '
				
				<div class="col-md-5">
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

