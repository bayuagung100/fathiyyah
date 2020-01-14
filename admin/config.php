
 <?php
//server hosting
// $servername = "localhost";
// $username = "u328098603_fathi";
// $password = "lalaLand123";
// $database = "u328098603_fathi"; 

//local-server
// $servername = "sql261.main-hosting.eu";
// $username = "u328098603_fathi";
// $password = "lalaLand123";
// $database = "u328098603_fathi";

//localpc
$servername = "localhost";  
$username = "root";
$password = "";
$database = "fathiyyah";
 
// Create connection
$mysqli = new mysqli($servername, $username, $password, $database);


//Menentukan timezone //
date_default_timezone_set('Asia/Jakarta'); 

//Membuat variabel yang menyimpan nilai waktu //
$nama_hari 	= array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari		= date("w");
$hari_ini 	= $nama_hari[$hari];

$tgl_sekarang = date("d");
$bln_sekarang = date("m");
$thn_sekarang = date("Y");

$tanggal 	= date("Y-m-d");  
$jam 		= date("H:i:s");

$query = mysqli_query($mysqli,"SELECT * FROM setting ");
$set = mysqli_fetch_array($query); 

function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}

function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit)).' ...';
}	
function convert_seo($kata) {
    $simbol = array ('-','/','\\',',','.','#',':',';','\',','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
	
	//Menghilangkan simbol pada array $simbol
    $kata = str_replace($simbol, '', $kata); 
    
	//Ubah ke huruf kecil dan mengganti spasi dengan (-)
    $kata = strtolower(str_replace(' ', '-', $kata)); 
    
	return $kata;
}

function metaheader()
{
    global $mysqli;
    $content = (isset($_GET['content'])) ? $_GET['content'] : "home";
    $home = $mysqli->query("SELECT * FROM setting");
    $h = $home->fetch_array();
    if($content=="home"){
    echo'
    <title>'.$h["judul_website"].'</title>
    <meta name="description" content="'.$h["deskripsi"].'" />
    <link rel="canonical" href="'.$h["url"].'" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="'.$h["judul_website"].'" />
    <meta property="og:description" content="'.$h["deskripsi"].'" />
    <meta property="og:url" content="'.$h["url"].'" />
    <meta property="og:site_name" content="'.$h["judul_website"].'" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="'.$h["judul_website"].'" />
    <meta name="twitter:description" content="'.$h["deskripsi"].'" />
    ';
    }elseif($content=="product"){
    $product = $mysqli->query("SELECT * FROM product WHERE id=$_GET[id]");
    $p = $product->fetch_array();
    echo'
    <title>'.$p["nama_product"].' | '.$h["judul_website"].'</title>
    <meta name="description" content="'.str_replace('"',"",$p["deskripsi"]).'" />
    <link rel="canonical" href="'.$h["url"].'product/'.$p["id"].'/detail/" />
    <meta property="og:type" content="product" />
    <meta property="og:title" content="'.$p["nama_product"].' | '.$h["judul_website"].'" />
    <meta property="og:image" content="'.$h["url"].'media/source/'.$p["gambar"].'">
    <meta property="og:description" content="'.str_replace('"',"",$p["deskripsi"]).'" />
    <meta property="og:url" content="'.$h["url"].'product/'.$p["id"].'/detail/" />
    <meta property="og:site_name" content="'.$h["judul_website"].'" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="'.$p["nama_product"].' | '.$h["judul_website"].'" />
    <meta name="twitter:image" content="'.$h["url"].'media/source/'.$p["gambar"].'" />
    <meta name="twitter:description" content="'.str_replace('"',"",$p["deskripsi"]).'" />
    ';
    }elseif($content=="product-all"){
    echo'
    <title>Jual Baju dan Perlengkapan Syar'."'".'i Wanita | '.$h["judul_website"].'</title>
    <meta name="description" content="Beli perlengkapan syar'."'".'i wanita dan baju muslim wanita & remaja wanita modern model terbaru di '.$h["judul_website"].'" />
    <link rel="canonical" href="'.$h["url"].'product/" />
    <meta property="og:type" content="product.group" />
    <meta property="og:title" content="Jual Baju dan Perlengkapan Syar'."'".'i Wanita | '.$h["judul_website"].'" />
    <meta property="og:description" content="Beli perlengkapan syar'."'".'i wanita dan baju muslim wanita & remaja wanita modern model terbaru di '.$h["judul_website"].'" />
    <meta property="og:url" content="'.$h["url"].'product/" />
    <meta property="og:site_name" content="'.$h["judul_website"].'" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Jual Baju dan Perlengkapan Syar'."'".'i Wanita | '.$h["judul_website"].'" />
    <meta name="twitter:description" content="Beli perlengkapan syar'."'".'i wanita dan baju muslim wanita & remaja wanita modern model terbaru di '.$h["judul_website"].'" />
    ';
    }elseif($content=="category-all"){
    echo'
    <title>Jual Baju, Hijab, Cadar dan Perlengkapan Syar'."'".'i Wanita | '.$h["judul_website"].'</title>
    <meta name="description" content="Beli perlengkapan syar'."'".'i wanita dan baju muslim wanita & remaja wanita modern model terbaru di '.$h["judul_website"].'" />
    <link rel="canonical" href="'.$h["url"].'category/" />
    <meta property="og:type" content="object" />
    <meta property="og:title" content="Jual Baju, Hijab, Cadar dan Perlengkapan Syar'."'".'i Wanita | '.$h["judul_website"].'" />
    <meta property="og:description" content="Beli perlengkapan syar'."'".'i wanita dan baju muslim wanita & remaja wanita modern model terbaru di '.$h["judul_website"].'" />
    <meta property="og:url" content="'.$h["url"].'category/" />
    <meta property="og:site_name" content="'.$h["judul_website"].'" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Jual Baju, Hijab, Cadar dan Perlengkapan Syar'."'".'i Wanita | '.$h["judul_website"].'" />
    <meta name="twitter:description" content="Beli perlengkapan syar'."'".'i wanita dan baju muslim wanita & remaja wanita modern model terbaru di '.$h["judul_website"].'" />
    ';
    }elseif($content=="category"){
    $category = $mysqli->query("SELECT * FROM cat_product WHERE id=$_GET[id]");
    $c = $category->fetch_array();
    echo'
    <title>'.$c["nama_cp"].' | '.$h["judul_website"].'</title>
    <meta name="description" content="Beli perlengkapan syar'."'".'i wanita dan baju muslim wanita & remaja wanita modern model terbaru di '.$h["judul_website"].'" />
    <link rel="canonical" href="'.$h["url"].'category/'.$c["id"].'/'.strtolower(str_replace(array(' ','/'), '-',$c["nama_cp"])).'" />
    <meta property="og:type" content="product.group" />
    <meta property="og:title" content="'.$c["nama_cp"].' | '.$h["judul_website"].'" />
    <meta property="og:description" content="Beli perlengkapan syar'."'".'i wanita dan baju muslim wanita & remaja wanita modern model terbaru di '.$h["judul_website"].'" />
    <meta property="og:url" content="'.$h["url"].'category/'.$c["id"].'/'.strtolower(str_replace(array(' ','/'), '-',$c["nama_cp"])).'" />
    <meta property="og:site_name" content="'.$h["judul_website"].'" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="'.$c["nama_cp"].' | '.$h["judul_website"].'" />
    <meta name="twitter:description" content="Beli perlengkapan syar'."'".'i wanita dan baju muslim wanita & remaja wanita modern model terbaru di '.$h["judul_website"].'" />
    ';
    } elseif ($content=="cart") {
    echo'
    <title>Keranjang Belanja | '.$h["judul_website"].'</title>
    <meta name="description" content="'.$h["deskripsi"].'" />
    <link rel="canonical" href="'.$h["url"].'cart/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Keranjang Belanja | '.$h["judul_website"].'" />
    <meta property="og:description" content="'.$h["deskripsi"].'" />
    <meta property="og:url" content="'.$h["url"].'cart/" />
    <meta property="og:site_name" content="'.$h["judul_website"].'" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Keranjang Belanja | '.$h["judul_website"].'" />
    <meta name="twitter:description" content="'.$h["deskripsi"].'" />
    ';
    }
}




?> 
