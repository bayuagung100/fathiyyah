<?php 
session_start();
include '../admin/config.php';
if ($_POST['aksi']=="login-home") {
	global $mysqli;
	$username = $_POST['usernamehome'];
	$password = md5($_POST['passwordhome']);

	$cekuser = $mysqli->query("SELECT * FROM user_shop WHERE username='$username' AND password='$password'");
	$jmluser = $cekuser->num_rows;
	$data = $cekuser->fetch_array();

	if ($jmluser > 0) {
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
	echo "
	<script>
	alert('Login Success'); 
	window.location = '".$_SERVER['HTTP_REFERER']."';
	</script>
	";
	} else {
	echo '
	<script>
	alert("Sorry! Username atau password salah."); 
	window.location = "'.$_SERVER['HTTP_REFERER'].'";
	</script>
	';
	}  
}elseif ($_POST['aksi']=="login") {
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
		
		echo '
        <script>
        window.location = "' . $set['url'] . '";
        </script>
        ';
        
        
    }else{
        echo '
        <script>
        window.location = "' . $set['url'] . 'login/?pesan=gagal";
        </script>
        ';
    }
}
?>

