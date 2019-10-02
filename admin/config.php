
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
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "fathiyyah";
 
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

function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}

function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit)).' ...';
}	


$query = mysqli_query($mysqli,"SELECT * FROM setting ");
$set = mysqli_fetch_array($query); 

?> 
