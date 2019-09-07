<?php
if(!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=about";

switch($show){

	//Menampilkan data
	default:
  echo'
  <div class="card shadow mb-4">
  <div class="card-header py-3">
  <h4 class="m-0 font-weight-bold text-primary" style="float: left!important;">Informasi Website</h4>
  
  </div>
  ';

  global $mysqli;
  $query  = $mysqli->query("SELECT * FROM setting ");
  $data = $query->fetch_array();

  buka_form($link, $data['id'], "setting");
  buat_textbox("Judul Website", "judul",$data['judul_website']);
  buat_textbox("URL Website", "url",$data['url']);
  buat_textarea("Deskirpsi Website", "deskripsi", $data['deskripsi']);
  buat_imagepicker("Icon Website (50x50)", "icon", $data['icon']);
  buat_textbox("Email", "email",$data['email']);
  buat_textbox("Instagram", "ig",$data['ig']);
  buat_textbox("WhatsApp", "wa",$data['wa']);
  tutup_form($link);

  echo'
  </div>';
  break;

  

    //Menyisipkan atau mengedit data di database
  case "action":
  $judul   = ucwords(addslashes($_POST['judul']));
  $url   = addslashes($_POST['url']);
  $deskripsi  = addslashes($_POST['deskripsi']);
  $icon  = $_POST[icon];
  $email  = addslashes($_POST['email']);
  $ig  = addslashes($_POST['ig']);
  $wa  = $_POST[wa];
  


    $query  = $mysqli->query ( "UPDATE setting SET       
      judul_website = '$judul',
      url = '$url',
      icon          = '$icon',
      deskripsi     = '$deskripsi',
      email = '$email',
      ig = '$ig',
      wa = '$wa'

      WHERE id='$_POST[id]'
      ");
  
  header('location:'.$link);
  break;

}

?>