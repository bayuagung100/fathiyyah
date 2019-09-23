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
if ($produk['gambar2']) {
	$pic2 = "../../../media/source/".$produk['gambar2'];
}else{
	$pic2 = "../../../img/noimage.jpg";
}
if ($produk['gambar3']) {
	$pic3 = "../../../media/source/".$produk['gambar3'];
}else{
	$pic3 = "../../../img/noimage.jpg";
}
if ($produk['gambar4']) {
	$pic4 = "../../../media/source/".$produk['gambar4'];
}else{
	$pic4 = "../../../img/noimage.jpg";
}
if ($produk['gambar5']) {
	$pic5 = "../../../media/source/".$produk['gambar5'];
}else{
	$pic5 = "../../../img/noimage.jpg";
}
if ($produk['gambar6']) {
	$pic6 = "../../../media/source/".$produk['gambar6'];
}else{
	$pic6 = "../../../img/noimage.jpg";
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

			<div class="col-md-6" style="padding: 20px">
				<div class="list-content" id="gambar">
					<img class="text-center detail-pic" src="<?php echo $pic;?>">
				</div>
				<div class="list-content" id="gambar2">
					<img class="text-center detail-pic" src="<?php echo $pic2;?>">
				</div>
				<div class="list-content" id="gambar3">
					<img class="text-center detail-pic" src="<?php echo $pic3;?>">
				</div>
				<div class="list-content" id="gambar4">
					<img class="text-center detail-pic" src="<?php echo $pic4;?>">
				</div>
				<div class="list-content" id="gambar5">
					<img class="text-center detail-pic" src="<?php echo $pic5;?>">
				</div>
				<div class="list-content" id="gambar6">
					<img class="text-center detail-pic" src="<?php echo $pic6;?>">
				</div>

				<ul class="list-inline" style="padding: 20px">
					<li class="list-link" style="display: inline-block;padding-top: 5px" onclick="openImage(event, 'gambar')" id="defaultOpen">
						<img style="max-height: 50px;width: 50px" src="<?php echo $pic;?>">
					</li>
					<li class="list-link" style="display: inline-block;padding-top: 5px" onclick="openImage(event, 'gambar2')">
						<img style="max-height: 50px;width: 50px" src="<?php echo $pic2;?>">
					</li>
					<li class="list-link" style="display: inline-block;padding-top: 5px" onclick="openImage(event, 'gambar3')">
						<img style="max-height: 50px;width: 50px" src="<?php echo $pic3;?>">
					</li>
					<li class="list-link" style="display: inline-block;padding-top: 5px" onclick="openImage(event, 'gambar4')">
						<img style="max-height: 50px;width: 50px" src="<?php echo $pic4;?>">
					</li>
					<li class="list-link" style="display: inline-block;padding-top: 5px" onclick="openImage(event, 'gambar5')">
						<img style="max-height: 50px;width: 50px" src="<?php echo $pic5;?>">
					</li>
					<li class="list-link" style="display: inline-block;padding-top: 5px" onclick="openImage(event, 'gambar6')">
						<img style="max-height: 50px;width: 50px" src="<?php echo $pic6;?>">
					</li>
				</ul>
			</div>

			<script>
			function openImage(evt, cityName) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("list-content");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("list-link");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			document.getElementById(cityName).style.display = "block";
			evt.currentTarget.className += " active";

			}
			// Get the element with id="defaultOpen" and click on it
			document.getElementById("defaultOpen").click();
			</script>

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

