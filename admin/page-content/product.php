<script type="text/javascript" src="vendor/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce_config.js"></script>
<?php
if(!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=product";

switch($show){

	//Menampilkan data
	default:
	echo'
	<!-- DataTales -->
	<div class="card shadow mb-4">
	<div class="card-header py-3">
	<h4 class="m-0 font-weight-bold text-primary" style="float: left!important;">Product</h4>
	<a href="'.$link.'&show=form" class="btn btn-primary btn-icon-split" style="float: right!important;">
	<span class="icon text-white-50">
	<i class="fas fa-plus"></i>
	</span>
	<span class="text">Tambah</span>
	</a>
	</div>
	';

	buka_tabel(array("Nama Product","Gambar", "Deskripsi", "Harga","Category","Slide"));
	global $mysqli;
	$query  = $mysqli->query( "select * from product ORDER BY id ");
	while($data = $query->fetch_array()){
		$kategori = $mysqli->query( "SELECT * FROM cat_product where id='$data[category]'");
		$kat = $kategori->fetch_array();

		$gambar = $data['gambar'];
		if($gambar){
			$pic = "../media/thumbs/".$gambar;
		}else{
			$pic = "../img/noimage.jpg";
		}

		if($data['slide']=='Y') $slide = '<a href="'.$link.'&show=deactivate&id='.$data['id'].'" style="color: green"><i class="fas fa-check-circle"></i></a>';
		else $slide = '<a href="'.$link.'&show=activate&id='.$data['id'].'" style="color: red"><i class="fas fa-times-circle"></i></a>';

		isi_bp(array($data['nama_product'],"<img src='".$pic."' width='150' style='margin-bottom: 10px'>",$data['deskripsi'],$data['harga'],$kat['nama_cp'], $slide), $link, $data['id']);
	}
	tutup_tabel();

	echo'
	</div>';
	break;

    //Menampilkan form input dan edit data
	case "form":
	global $mysqli;
	if(isset($_GET['id'])){
		$query 	= $mysqli->query ( "SELECT * FROM product WHERE id='$_GET[id]'");
		$data= $query->fetch_array();
		$aksi 	= "Edit";
	}else{
		$data = array("id"=>"", "kd_product"=>"", "nama_product"=>"", "gambar"=>"", "gambar2"=>"", "gambar3"=>"", "gambar4"=>"", "gambar5"=>"", "gambar6"=>"", "deskripsi"=>"","harga"=>"","category"=>"");
		$aksi 	= "Tambah";
	}

	if($aksi=="Edit" and $_SESSION['level']!="admin" and $data['id']!=$_SESSION['id']){
		header('location:'.$link);
	}else{
		echo'
		<div class="card shadow mb-4">
		<div class="card-header py-3">
		<h3 class="page-header"><b>'.$aksi.' Product</b> </h3>
		</div>
		';	
		buka_form($link, $data['id'], strtolower($aksi));
		buat_textbox("Nama Product", "nama_product", $data['nama_product'], 5);
		buat_textbox("Kode Product", "kd_product", $data['kd_product'], 4);
		buat_textbox("Harga", "harga", $data['harga'], 4);
		buat_imagepicker("Gambar 1", "gambar", $data['gambar']);
		buat_imagepicker("Gambar 2", "gambar2", $data['gambar2']);
		buat_imagepicker("Gambar 3", "gambar3", $data['gambar3']);
		buat_imagepicker("Gambar 4", "gambar4", $data['gambar4']);
		buat_imagepicker("Gambar 5", "gambar5", $data['gambar5']);
		buat_imagepicker("Gambar 6", "gambar6", $data['gambar6']);

		$kategori = $mysqli->query ("SELECT * FROM cat_product");
		$list = array();
		$list[] = array('val'=>'0', 'cap'=>'Tidak Ada');
		while($k = $kategori->fetch_array()){
			$list[] = array('val'=>$k['id'], 'cap'=>$k['nama_cp']);
		}
		buat_combobox("Category", "category", $list, $data['category']);

		buat_textarea("Deskripsi", "deskripsi", $data['deskripsi'], 'richtext');
		
		tutup_form($link);

		echo'
		</div>';
	}
	break;

	//Menyisipkan atau mengedit data di database
	case "action":
	$nama_product	= ucwords(addslashes($_POST['nama_product']));
	$kd_product		= addslashes($_POST['kd_product']);
	$gambar 	= $_POST[gambar];
	$gambar2 	= $_POST[gambar2];
	$gambar3	= $_POST[gambar3];
	$gambar4 	= $_POST[gambar4];
	$gambar5 	= $_POST[gambar5];
	$gambar6 	= $_POST[gambar6];
	$deskripsi		= addslashes($_POST['deskripsi']);
	$harga		= addslashes($_POST['harga']);
	$category	= addslashes($_POST['category']);


	if($_POST['aksi'] == "tambah"){

		$query 	= $mysqli->query ( "INSERT INTO product 
			(
			nama_product,
			kd_product,
			gambar,
			gambar2,
			gambar3,
			gambar4,
			gambar5,
			gambar6,
			deskripsi,
			harga,
			category
			) values
			(
			'$nama_product',
			'$kd_product',
			'$gambar',
			'$gambar2',
			'$gambar3',
			'$gambar4',
			'$gambar5',
			'$gambar6',
			'$deskripsi',
			'$harga',
			'$category'
			)			
			");
	}elseif($_POST['aksi'] == "edit"){
		$query 	= $mysqli->query ( "UPDATE product SET
			nama_product 		= '$nama_product',
			kd_product 		= '$kd_product',
			gambar 	= '$gambar',
			gambar2 	= '$gambar2',
			gambar3 	= '$gambar3',
			gambar4 	= '$gambar4',
			gambar5 	= '$gambar5',
			gambar6 	= '$gambar6',
			deskripsi     ='$deskripsi',
			harga     ='$harga',
			category     ='$category'

			WHERE id='$_POST[id]'
			");
	}
	header('location:'.$link);
	break;
	
	//Menghapus data di database
	case "delete":

	$query = $mysqli->query("DELETE FROM product WHERE id='$_GET[id]'");

	header('location:'.$link);
	break;

	case "activate":
		$mysqli->query("UPDATE product SET slide='Y' WHERE id='$_GET[id]'");
		header('location:'.$link);
	break;
	
	case "deactivate":
		$mysqli->query("UPDATE product SET slide='N' WHERE id='$_GET[id]'");
		header('location:'.$link);
	break;
}

?>