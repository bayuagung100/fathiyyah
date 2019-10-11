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
                <div class="card">
                <h3 class="text-center"><b>Register</b></h3>
                <hr>
				<?php
                if(isset($_POST['regist'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $rptpassword = $_POST['rpt-password'];
                $passwordmd5 = md5($_POST['password']);
                $name = $_POST['fullname'];
                $email = $_POST['email'];
                $hp = $_POST['hp'];
                $city = $_POST['city'];
                $pos = $_POST['pos'];
                $alamat = $_POST['alamat'];
                    
                    if ($rptpassword != $password) {
                        echo'<div class="alert alert-danger" role="alert"><b>Sorry!</b> Password tidak sama.</div>';
                    }else {
                        $insuser = mysqli_query($mysqli, "INSERT INTO user_shop
                            (
                                username,
                                password,
                                nama,
                                email,
                                hp,
                                city,
                                pos,
                                alamat
                            )
                            VALUES
                            (
                                '$username',
                                '$passwordmd5',
                                '$name',
                                '$email',
                                '$hp',
                                '$city',
                                '$pos',
                                '$alamat'
                            )
                        ");
                        echo"<script>window.alert('Registration Successful');
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
						<input type="password" id="password" name="password" placeholder="Password" required >
						</div>
                    </div>
                    <div class="row">
						<div class="col-md-2">
						<label for="rpt-password">Repeat Password</label>
						</div>
						<div class="col-md-10">
						<input type="password" id="rpt-password" name="rpt-password" placeholder="Repeat-Password" required >
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
					<div class="row">
						<div class="col-md-2">
						<label for="city">City</label>
						</div>
						
                    <?php
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "key: b9af4b97d056d2761d0e7d69f9ff475d"
                    ),
                    ));

                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);

                    $listKota = array(); //bikin array untuk nampung list kota

                    if ($err) {
                    echo "cURL Error #:" . $err;
                    } else {
                        $arrayResponse = json_decode($response, true); //decode response dari raja ongkir, json ke array
                        
                        $tempListKota = $arrayResponse['rajaongkir']['results']; // ambil array yang dibutuhin aja, disini resultnya aja

                        //looping array temporary untuk masukin object yang kita butuhin
                        foreach ($tempListKota as $value) {
                            //bikin object baru
                            $kota = new stdClass();
                            $kota->id = $value['city_id']; //id kotanya
                            $kota->nama = $value['city_name']; //nama kotanya

                            array_push($listKota, $kota); //push object kota yang kita bikin ke array yang nampung list kota

                        }

                        //$listKota : udah berisi list kota yang kita butuhin
                        echo '
                        <div class="col-md-4">
                            <select id="city" name="city" required>
                            <option value="">Pilih Kota</option>
                        ';
                        //ini untuk ngecek aja isi $list kota udah bener apa belum
                        foreach ($listKota as $kota) {
                        
                        echo '
                            
                            <option value="'.$kota->nama.'">'.$kota->nama.'</option>

                        ';

                        }
                        echo '</select>
                        </div>
                        ';

                    } 
                ?>

						
						
						<div class="col-md-2">
						<label for="pos">Postal Code</label>
						</div>
						<div class="col-md-4">
						<input type="text" id="pos" name="pos" placeholder="15710" required>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
						<label for="alamat">Shipping Address</label>
						</div>
						<div class="col-md-10">
						<textarea id="alamat" name="alamat" placeholder="Shipping Address" style="height:200px" required></textarea>
						</div>
					</div>
					<br>
					<button type="submit" name="regist" class="btn btn-cart">Register</button>
                    <br>
                    <br>
                    <a href="../login/" >Already have an account? Login! </a>
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
}else{
	header('location: '.$set['url']);
}
?>

