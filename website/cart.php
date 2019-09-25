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

			<div class="col-sm-12" style="text-align:center;">
				<img class="img-product-home" src="../img/emptycart.png">
				<p><b>Your Cart Is Empty</b></p>
				<br>
				<a class="btn btn-primary" href="<?php echo $set["url"];?>product/" style="color:#a5758c;"><h3>Shop Now</h3></a>
			</div>

		</div>

		</div>
	</div>
</section>
<?php 	
include 'footer.php';
?>

