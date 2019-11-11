<?php 
session_start();
include '../admin/config.php';
if(empty($_SESSION['user']) or empty($_SESSION['pass']) or $_SESSION['log']==0){

	include '../website/header.php';
?>

<section class="bg-light page-section" id="category">
	<div class="container">

		<div class="row" style="padding: 20px">
			<div class="col-md-2">
			</div>
            <div class="col-md-8">
				<?php 
					$query = mysqli_query($mysqli, "SELECT * FROM order_temp WHERE id_session='$sesi' ");
					$data = mysqli_fetch_array($query);
					
					$nt = str_replace('-', '', $data['tanggal']).$data['id'].$data['id_produk'];
				?>
                <div class="card">
                <h3 class="text-center"><b>Login to Checkout</b></h3>
                <hr>
				<?php if (isset($_GET['pesan'])) {
					if ($_GET['pesan']=="gagal") {
						echo'<div class="alert alert-danger" role="alert"><b>Sorry!</b> Username atau password salah.</div>';
					}
				}
				?>
				<!-- <form action="http://localhost/fathiyyah/aksi/" method="post"> -->
				<form action="<?php echo $set['url'];?>aksi/" method="post">
			    	<input type="hidden" name="aksi" value="login">
					<div class="row">
						<div class="col-md-2">
						<label for="fullname">Username</label>
						</div>
						<div class="col-md-10">
						<input type="text" id="username" name="username" placeholder="Username/Email" required>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
						<label for="password">Password</label>
						</div>
						<div class="col-md-10">
						<input type="password" id="password" name="password" placeholder="Password" required >
						</div>
					</div>
					<br>
					<button type="submit" class="btn btn-cart">Login</button>
                    <br>
                    <br>
                    <a href="../forgot-password/">Forgot Password?</a>
                    |
                    <a href="../regist/">Create an Account!</a>
				</form>
                </div>
			</div>
			<div class="col-md-2">
			</div>

		</div>

	</div>
</section>
<?php 	
include '../website/footer.php';
}else{
	header('Location:../checkout/');
}
?>

