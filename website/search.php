<?php include 'header.php';
$kata = htmlentities(htmlspecialchars($_REQUEST['kata']), ENT_QUOTES);
$arrkata = explode(" ", $kata);
?>

<section class="bg-light page-section" id="portfolio">
	<div class="container">

		<div class="row" style="padding: 20px">
			<div class="col-md-12 text-center" style="padding: 20px">
				<ul class="breadcrumb">
					<li><a href="<?php echo $set["url"];?>">Home</a></li>
					<li class="active">Search results for <b><?php echo $kata;?></b></li>
				</ul>
			</div>

			<?php 
			

			$query = mysqli_query($mysqli,"SELECT * FROM product WHERE nama_product LIKE '%$kata%'");
			while ($data = mysqli_fetch_array($query)) {
				$ip = $data['id'];
				$np = $data['nama_product'];
				$gp = $data['gambar'];
				$dp = $data['deskripsi'];
				$hp = $data['harga'];

				if($gp){
					$pic = "../media/source/".$gp;
				}else{
					$pic = "../img/noimage.jpg";
				}

				
				echo'
				<div class="col-md-4 col-sm-6 portfolio-item">
				<a class="portfolio-link"  href="'.$ip.'/detail/">
				<div class="portfolio-hover">
				<div class="portfolio-hover-content">
				<i class="fas fa-eye fa-3x"></i>
				</div>
				</div>
				<img class="img-product-home" src="'.$pic.'" alt="">
				</a>
				<div class="portfolio-caption">
				<h3>'.$np.'</h3>
				<h6>'.rupiah($hp).'</h6>
				<p class="text-muted">'.$dp.'</p>
				</div>
				</div>
				';
				
			}
			?>

		</div>
	</div>
</section>
<?php 	
include 'footer.php';
?>
