<?php
session_start();
$sesi = session_id();
include "../admin/config.php";
include "../func/func_date.php";

$id = $_GET['id'];
$act = $_GET['act'];
$pm = $_GET['method'];

if ($act=='login') {
  if(isset($_GET['login'])){
    $username = $_GET['username'];
    $password = md5($_GET['password']);

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
        
        header('Location:../checkout/');
    }else{
      $notif = '<div class="alert alert-danger" role="alert"><b>Sorry!</b> Username atau password salah.</div>';
    }
    }
}

if ($act=='delete') {
    $qdel = mysqli_query($mysqli,"DELETE FROM order_temp WHERE id='$id' AND id_session='$sesi' ");
    header('Location:'.$_SERVER['HTTP_REFERER']);
}
if ($act=='checkout') {
    if(empty($_SESSION['user']) or empty($_SESSION['pass']) or $_SESSION['log']==0){
        header('location: ../login/');
      }else{
        header('Location:../checkout/');
      }
}
if ($act=='payment' AND $pm=='whatsapp') {
    header('Location:https://api.whatsapp.com/send?phone='.$set['wa'].'&text=Assalamualaikum :)%0ASaya sudah order via web The Fathiyyah, berikut data orderan saya:%0A%0A*No.Tagihan: *%0A*Nama: *%0A*Email: *%0A*No.Hp: *%0A*Alamat: *
    ');
}


?>