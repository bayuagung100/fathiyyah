<?php
if(!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=konfirmasi-pembayaran";

switch($show){

	//Menampilkan data
	default:
		echo'
        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary" style="float: left!important;">Konfirmasi Pembayaran</h4>
              
            </div>
            ';

            buka_tabel_orderan(array("Nama Pengirim","Bank Pengirim", "Bank Tujuan ","Tanggal Transfer","Bukti Transfer", "Catatan", "Status"));
            $no = 1;
            global $mysqli;
            $query  = $mysqli->query( "SELECT * FROM konfirmasi_pembayaran WHERE konfirmasi='n' ORDER BY id DESC");
            while($data = $query->fetch_array()){
                $konfirmasi = $data['konfirmasi'];
              $bankquery = $mysqli->query( "SELECT * FROM bank_transfer WHERE nama_bank='$data[bank_tujuan]'");
              $bank = $bankquery->fetch_array();
              $BT = $bank['nama_bank']." (".$bank['no_rek'].") a/n ".$bank['nama_pemilik'];

              if ($konfirmasi=="n") {
                  $status= "Belum Dikonfirmasi";
              }
              isi_orderan($no, array($data['nama_pengirim'], $data['bank_pengirim']." - ".$data['no_rek_pengirim'], $BT, $data['tgl_transfer'], $data['bukti_pembayaran'], $data['catatan'], $status), $link, $data['id']);
              $no++;
            }
            tutup_tabel();

        echo'
        </div>';
    break;

    //Menampilkan form input dan edit data
    case "form":
      global $mysqli;
      if(isset($_GET['id'])){
        $query  = $mysqli->query ( "SELECT * FROM konfirmasi_pembayaran WHERE id='$_GET[id]'");
        $data= $query->fetch_array();
        $aksi   = "Detail";
      }
      
      
        echo'
        <div class="card shadow mb-4">
          <div class="card-header py-3">
          <h3 class="page-header"><b>'.$aksi.' Konfirmasi</b> </h3>
          </div>
          ';  
        buka_form($link, $data['id'], strtolower($aksi));
          buat_rowtabsbuka();
            buat_label("Nama Pengirim :",2);
            buat_col($data['nama_pengirim'],4);
            buat_label("Tanggal Transfer:",2);
            buat_col($data['tgl_transfer'],4);
          buat_rowtabstutup();
          buat_rowtabsbuka();
            buat_label("Bank Pengirim :",2);
            buat_col($data['bank_pengirim'],4);
            buat_label("No Rek Pengirim :",2);
            buat_col($data['no_rek_pengirim'],4);
          buat_rowtabstutup();
          
          buat_tag("Catatan :", $data['catatan']);
          buat_tag("Bukti Transfer :", '<img id="myImg" src="../img/bukti_tf/'.$data['bukti_pembayaran'].'" alt="Bukti Transfer" style="width:100%;max-width:300px">');
          echo "<hr>";
          echo'<div id="myModal" class="modal">
          <span class="close">&times;</span>
          <img class="modal-content" id="img01">
          <div id="caption"></div>
        </div>';
        echo'
        <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
      modal.style.display = "none";
    }
    </script>
        ';

            $bank = $mysqli->query( "SELECT * FROM bank_transfer WHERE nama_bank='$data[bank_tujuan]'");
            $bk = $bank->fetch_array();
            $tujuan = $bk['nama_bank']." (".$bk['no_rek'].") a/n ".$bk['nama_pemilik'];
          buat_tag("Bank Tujuan :", $tujuan,6);

            $list = array();
            $list[] = array('val'=>'n', 'cap'=>'Belum Dikonfirmasi');
            $list[] = array('val'=>'y', 'cap'=>'Konfirmasi');
          buat_combobox("Edit Status","status",$list, $data['konfirmasi']);
        tutup_form($link);
        
        echo'
            </div>';
      
    break;

    //Menyisipkan atau mengedit data di database
    case "action":
      $status	= $_POST[status];
  
  
      $query  = $mysqli->query ( "UPDATE konfirmasi_pembayaran SET
      konfirmasi    = '$status'
      WHERE id='$_POST[id]'
      ");
      
      header('location:'.$link);
    break;
    
    //Menghapus data di database
    case "delete":

      $query = $mysqli->query("DELETE FROM konfirmasi_pembayaran WHERE id='$_GET[id]'");

      header('location:'.$link);
    break;

}

?>