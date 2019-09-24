<?php
if(!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=kasir";

switch($show){

	//Menampilkan data
	default:
		echo'
        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary" style="float: left!important;">Data Penjualan</h4>
              <a href="'.$link.'&show=form" class="btn btn-primary btn-icon-split" style="float: right!important;">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Data Penjualan</span>
                  </a>
            </div>
            ';

            buka_tabel(array("Kd Product","Nama Product", "Jumlah","Harga","Total"));
            global $mysqli;
            $query  = $mysqli->query( "select * from cat_product ORDER BY id ");
            while($data = $query->fetch_array()){
              $gambar = $data['icon'];
              if($gambar){
                $pic = "../media/source/".$gambar;
              }else{
                $pic = "../img/noimage.jpg";
              }
              isi_bp(array($data['nama_cp'],"<img src='".$pic."' width='150' style='margin-bottom: 10px'>"), $link, $data['id']);
            }
            tutup_tabel();

        echo'
        </div>';
    break;

    //Menampilkan form input dan edit data
    case "form":
      global $mysqli;
      if(isset($_GET['id'])){
        $query  = $mysqli->query ( "SELECT * FROM cat_product WHERE id='$_GET[id]'");
        $data= $query->fetch_array();
        $aksi   = "Edit";
      }else{
        $data = array("id"=>"", "nama_cp"=>"", "icon"=>"");
        $aksi   = "Tambah";
      }
      
      if($aksi=="Edit" and $_SESSION['level']!="admin" and $data['id']!=$_SESSION['id']){
        header('location:'.$link);
      }else{
        echo'
        <div class="card shadow mb-4">
          <div class="card-header py-3">
          <h3 class="page-header"><b>'.$aksi.' Category Product</b> </h3>
          </div>
          ';  
        buka_form($link, $data['id'], strtolower($aksi));
          buat_textbox("Nama Category", "nama_cp", $data['nama_cp'], 4);
          buat_imagepicker("Icon", "icon", $data['icon']);
        tutup_form($link);

        echo'
            </div>';
      }
    break;

    //Menyisipkan atau mengedit data di database
    case "action":
        $nama_cp   = ucwords(addslashes($_POST['nama_cp']));
        $icon   = $_POST[icon];
        
        if($_POST['aksi'] == "tambah"){

          $query  = $mysqli->query ( "INSERT INTO cat_product 
          (
          nama_cp,
          icon
          ) values
          (
          '$nama_cp',
          '$icon'
          )     
          ");
        }elseif($_POST['aksi'] == "edit"){
            $query  = $mysqli->query ( "UPDATE cat_product SET
            nama_cp    = '$nama_cp',
            icon    = '$icon'
            WHERE id='$_POST[id]'
            ");
        }
        header('location:'.$link);
    break;
    
    //Menghapus data di database
    case "delete":

      $query = $mysqli->query("DELETE FROM cat_product WHERE id='$_GET[id]'");

      header('location:'.$link);
    break;

}

?>