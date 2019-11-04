<?php include 'header.php';?>

<section class="bg-light page-section" id="category">
	<div class="container">

		<div class="row" style="padding: 20px">
			<div class="col-md-12 text-center" style="padding: 20px">
				<ul class="breadcrumb">
					<li><a href="<?php echo $set["url"];?>">Home</a></li>
					<li class="active">Category</li>
				</ul>
			</div>

			<?php 
			$query = mysqli_query($mysqli,"SELECT * FROM cat_product ORDER BY nama_cp");
			while ($data = mysqli_fetch_array($query)) {
				$ip = $data['id'];
				$np = $data['nama_cp'];
				$npK = strtolower(str_replace(array(' ','/'), '-', $np));
				$gp = $data['icon'];

				if($gp){
					$pic = "../media/source/".$gp;
				}else{
					$pic = "../img/noimage.jpg";
				}

				echo'
				<div class="col-md-4 col-sm-6 text-center">
					<a href="'.$ip.'/'.$npK.'/">
						<img src="'.$pic.'" alt="'.$np.'" style="width:100%;height:250px">
					</a>
					<p>'.$np.'</p>
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

