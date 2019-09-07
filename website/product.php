<?php include 'header.php';

$query = mysqli_query($mysqli,"SELECT * FROM product WHERE id='$_GET[id]'");
$produk = mysqli_fetch_array($query); 
$query2 = mysqli_query($mysqli,"SELECT * FROM cat_product WHERE id=$produk[category] ");
$kat = mysqli_fetch_array($query2); 
$np = $kat['nama_cp'];
$npK = strtolower(str_replace(' ', '-', $np));
if ($produk['gambar']) {
	$pic = "../../../media/source/".$produk['gambar'];
}else{
	$pic = "../../../img/noimage.jpg";
}
?>
<section class="bg-light page-section" id="portfolio">
	<div class="container">
		<div class="row" style="padding: 20px">
			<div class="col-md-12 text-center" style="padding: 20px">
				<ul class="breadcrumb">
					<li><a href="<?php echo $set["url"];?>">Home</a></li>
					<li><a href="<?php echo $set["url"];?>product/">Product</a></li>
					<?php 
					if ($produk['category']!=0) {
					?>
					<li><a href="<?php echo $set["url"];?>category/<?php echo $kat['id'];?>/<?php echo $npK;?>/"><?php echo $np;?></a></li>
					<li class="active"><?php echo $produk['nama_product'];?></li>
					<?php }else{ ?>
					<li class="active"><?php echo $produk['nama_product'];?></li>
					<?php }?>
				</ul>
			</div>

			<div class="col-md-6 text-center" style="padding: 20px">
				<img style="max-height: 400px;width: 100%" src="<?php echo $pic;?>">
			</div>
			<div class="col-md-6" style="padding: 20px">
				<h3><?php echo $produk['nama_product'];?></h3>
				<p>Category: <a href="<?php echo $set["url"].'category/'.$kat['id'].'/'.$npK.'/';?>"><?php echo $kat['nama_cp'];?></a></p>
				<p>Price: <?php echo rupiah($produk['harga']);?></p>
				<p>Deskripsi: <br><?php echo $produk['deskripsi'];?></p>
				<br>
				<br>
				<br>
				<a href="https://api.whatsapp.com/send?phone=<?php echo $set['wa'];?>&text=Halo, saya tertarik dengan produk *<?php echo $produk['nama_product'];?>* yang anda jual." target="_blank" class="btn" style='background-color:#a5758c;color:white'><h3><img src="<?php echo $set["url"];?>img/wa.png" style="width: 34px;height: 34px"> Order Now</h3></a>
			</div>
		</div>
	</div>
</section>
<?php  	
include 'footer.php';
?>

