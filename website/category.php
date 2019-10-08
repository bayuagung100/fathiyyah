<?php include 'header.php';
$query = mysqli_query($mysqli,"SELECT * FROM cat_product WHERE id='$_GET[id]'");
$kat = mysqli_fetch_array($query); 

?>

<section class="bg-light page-section" id="portfolio">
	<div class="container">
		<div class="row" style="padding: 20px">
			<div class="col-md-12 text-center" style="padding: 20px">
				<ul class="breadcrumb">
					<li><a href="<?php echo $set["url"];?>">Home</a></li>
					<li><a href="<?php echo $set["url"];?>category/">Category</a></li>
					<li class="active"><?php echo $kat['nama_cp'];?></li>
				</ul>
			</div>

			<?php

			$query2 = mysqli_query($mysqli,"SELECT * FROM product WHERE category=$kat[id] ");
			while ( $produk = mysqli_fetch_array($query2)) {
				$ip = $produk['id'];
				$np = $produk['nama_product'];
				$gp = $produk['gambar'];
				$dp = $produk['deskripsi'];
				$hp = $produk['harga'];
				if ($produk['gambar']) {
					$pic = "../../../media/source/".$produk['gambar'];
				}else{
					$pic = "../../../img/noimage.jpg";
				}
				echo'
				<div class="col-md-4 col-sm-6 portfolio-item">
				<a class="portfolio-link"  href="'.$set["url"].'product/'.$ip.'/detail/">
				<div class="portfolio-hover">
				<div class="portfolio-hover-content">
				<i class="fas fa-eye fa-3x"></i>
				</div>
				</div>
				<img class="img-product-home" src="'.$pic.'" alt="">
				</a>
				<div class="portfolio-caption">
				<a href="'.$set["url"].'product/'.$ip.'/detail/"><h3>'.$np.'</h3></a>
				<h6>'.rupiah($hp).'</h6>
				<p class="text-muted">'.limit_words($dp, 10).'</p>
				</div>
				</div>
				';
			}?>
		</div>
	</div>
</section>
<?php  	
include 'footer.php';
?>

