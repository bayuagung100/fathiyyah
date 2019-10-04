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

  echo'
        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary" style="float: left!important;">Rekening Bank</h4>
              <a href="'.$link.'&show=form" class="btn btn-primary btn-icon-split" style="float: right!important;">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
                  </a>
            </div>
            ';

            buka_tabel(array("Nama Bank","No Rekening","Nama Pemilik"));
            global $mysqli;
            $query  = $mysqli->query( "select * from bank_transfer ORDER BY id ");
            while($data = $query->fetch_array()){
              isi_bp(array($data['nama_bank'], $data['no_rek'], $data['nama_pemilik']), $link, $data['id']);
            }
            tutup_tabel();

        echo'
        </div>';
  break;

  //Menampilkan form input dan edit data
  case "form":
    global $mysqli;
    if(isset($_GET['id'])){
      $query  = $mysqli->query ( "SELECT * FROM bank_transfer WHERE id='$_GET[id]'");
      $data= $query->fetch_array();
      $aksi   = "Edit";
    }else{
      $data = array("id"=>"", "nama_bank"=>"", "no_rek"=>"", "nama_pemilik"=>"");
      $aksi   = "Tambah";
    }
    
    if($aksi=="Edit" and $_SESSION['level']!="admin" and $data['id']!=$_SESSION['id']){
      header('location:'.$link);
    }else{
      echo'
      <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h3 class="page-header"><b>'.$aksi.' Rekening Bank</b> </h3>
        </div>
        ';  
      buka_form($link, $data['id'], strtolower($aksi));
        buat_textbox("Nama Bank", "nama_bank", $data['nama_bank'], 4);
        buat_textbox("No Rekening", "no_rek", $data['no_rek'], 4);
        buat_textbox("Nama Pemilik", "nama_pemilik", $data['nama_pemilik'], 4);
      tutup_form($link);

      echo'
      </div>';
    }
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
  $nama_bank   = strtoupper(addslashes($_POST['nama_bank']));
  $no_rek  = addslashes($_POST['no_rek']);
  $nama_pemilik   = strtoupper(addslashes($_POST['nama_pemilik']));
  
  
  if($_POST['aksi'] == "setting"){
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
  }elseif($_POST['aksi'] == "tambah"){

    $query  = $mysqli->query ( "INSERT INTO bank_transfer 
    (
      nama_bank,
      no_rek,
      nama_pemilik
    ) values
    (
      '$nama_bank',
      '$no_rek',
      '$nama_pemilik'
    )     
    ");
  }elseif($_POST['aksi'] == "edit"){
      $query  = $mysqli->query ( "UPDATE bank_transfer SET
        nama_bank    = '$nama_bank',
        no_rek   = '$no_rek',
        nama_pemilik     ='$nama_pemilik'
        
      WHERE id='$_POST[id]'
      ");
  }
  header('location:'.$link);
  break;

  //Menghapus data di database
  case "delete":

    $query = $mysqli->query("DELETE FROM bank_transfer WHERE id='$_GET[id]'");

    header('location:'.$link);
  break;

}
?>