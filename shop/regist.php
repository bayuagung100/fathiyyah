<?php
session_start();
include '../admin/config.php';

if (empty($_SESSION['user']) or empty($_SESSION['pass']) or $_SESSION['log'] == 0) {
	include '../website/header.php';
	?>

	<section class="bg-light page-section" id="category">
		<div class="container">

			<div class="row" style="padding: 20px">
				<div class="col-md-2">
				</div>
				<div class="col-md-8">
					<div class="card">
						<h3 class="text-center"><b>Register</b></h3>
						<hr>
						<?php
							if (isset($_POST['regist'])) {
								$username = strtolower($_POST['username']);
								$password = $_POST['password'];
								$rptpassword = $_POST['rpt-password'];
								$passwordmd5 = md5($_POST['password']);
								$name = $_POST['fullname'];
								$email = $_POST['email'];
								$hp = $_POST['hp'];

								$cek_mail = $mysqli->query("SELECT * FROM user_shop WHERE email='$email' ");
								$cm = $cek->num_rows;

								if ($rptpassword != $password) {
									echo '<div class="alert alert-danger" role="alert"><b>Sorry!</b> Password tidak sama.</div>';
								} elseif ($cm > 0) {
									echo '<div class="alert alert-danger" role="alert"><b>Sorry!</b> Email yang Anda masukkan sudah terdaftar.</div>';
								} else {
									$insuser = mysqli_query($mysqli, "INSERT INTO user_shop
										(
											username,
											password,
											nama,
											email,
											hp
										)
										VALUES
										(
											'$username',
											'$passwordmd5',
											'$name',
											'$email',
											'$hp'
										)
									");
												echo "<script>window.alert('Registration Successful');
									window.location=('../login/')</script>";
											}
							}
							?>
						<form method="post" action="">
							<div class="row">
								<div class="col-md-2">
									<label for="username">Username</label>
								</div>
								<div class="col-md-10">
									<input type="text" id="username" name="username" placeholder="Username" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<label for="password">Password</label>
								</div>
								<div class="col-md-10">
									<input type="password" id="password" name="password" placeholder="Password" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<label for="rpt-password">Repeat Password</label>
								</div>
								<div class="col-md-10">
									<input type="password" id="rpt-password" name="rpt-password" placeholder="Repeat-Password" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<label for="fullname">Name</label>
								</div>
								<div class="col-md-10">
									<input type="text" id="fullname" name="fullname" placeholder="Full Name" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<label for="email">Email</label>
								</div>
								<div class="col-md-10">
									<input type="text" id="email" name="email" placeholder="name@example.com" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<label for="hp">Phone</label>
								</div>
								<div class="col-md-10">
									<input type="text" id="hp" name="hp" placeholder="08xxxxxxxxxx" required>
								</div>
							</div>
							<br>
							<button type="submit" name="regist" class="btn btn-cart">Register</button>
							<br>
							<br>
							<a href="../login/">Already have an account? Login! </a>
						</form>

					</div>
				</div>
				<div class="col-md-2">
				</div>
			</div>

		</div>
		</div>
	</section>
<?php
	include '../website/footer.php';
} else {
	header('location: ' . $set['url']);
}
?>