<?php 
session_start();
if(empty($_SESSION['user']) or empty($_SESSION['pass']) or $_SESSION['log']==0){
include '../admin/config.php';
include '../website/header.php';
?>

<section class="bg-light page-section" id="category">
	<div class="container">

		<div class="row" style="padding: 20px">
            
            <div class="col-md-8">
				<?php 
					$query = mysqli_query($mysqli, "SELECT * FROM order_temp WHERE id_session='$sesi' ");
					$data = mysqli_fetch_array($query);
					
					$nt = str_replace('-', '', $data['tanggal']).$data['id'].$data['id_produk'];
				?>
                <div class="card">
                <h3 class="text-center"><b>Login to Checkout</b></h3>
                <hr>
                <?php
                if(isset($_POST['login'])){
                $username = $_POST['username'];
                $password = md5($_POST['password']);

                $cekuser = $mysqli->query("SELECT * FROM user_shop WHERE username='$username' AND password='$password'");
                $jmluser = $cekuser->num_rows;
                $data = $cekuser->fetch_array();

                if ($jmluser> 0){
                    $_SESSION['id']       = $data['id'];
                    $_SESSION['user']     = $data['username'];
                    $_SESSION['pass']  = $data['password'];
                    $_SESSION['nama']     = $data['nama'];
                    $_SESSION['email']       = $data['email'];
                    $_SESSION['hp']    = $data['hp'];
                    $_SESSION['city']    = $data['city'];
                    $_SESSION['pos']    = $data['pos'];
                    $_SESSION['alamat']    = $data['alamat'];
                    
                   
                    $_SESSION['log'] = 1;
                    
                    // header('Location:../checkout/');
                }else{
                    echo'<div class="alert alert-danger" role="alert"><b>Sorry!</b> Username atau password salah.</div>';
                }
                }
                ?>
				
				<form method="post" action="">
					<div class="row">
						<div class="col-md-2">
						<label for="fullname">Username</label>
						</div>
						<div class="col-md-10">
						<input type="text" id="username" name="username" placeholder="Username/Email/Phone" required>
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
					<button type="submit" name="login" class="btn btn-cart">Login</button>
                    <br>
                    <br>
                    <a href="">Forgot Password?</a>
                    |
                    <a href="../regist/">Create an Account!</a>
				</form>
                </div>
            </div>

			<?php 
				echo '				
				<div class="col-md-4">
				<div class="card">
                <h3 class="text-center"><b>Summary Order</b></h3>
				<hr>
				<p>No.Tagihan: '.$nt.'</p>
				<table class="table table-xs">
					<tr>
						<th></th>
						<th></th>
						<th></th>
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
						<td><h5>'.$np.'</h5></td>
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
}else{
	header('Location:../checkout/');
}
?>

