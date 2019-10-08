<?php
if(!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=orderan";

switch($show){

	//Menampilkan data
	default:
		echo'
        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary" style="float: left!important;">Data Penjualan</h4>
              
            </div>
            ';

            buka_tabel_orderan(array("No Tagihan","Tanggal", "Nama","Email","Hp", "Status"));
            $no = 1;
            global $mysqli;
            $query  = $mysqli->query( "SELECT DISTINCT no_tagihan, tanggal, nama, email, hp, payment from pembelian ORDER BY id DESC");
            while($data = $query->fetch_array()){
              $payment = $data['payment'];
              if ($payment=="new") {
                $status = "Unpaid";
              }else {
                $status = "Paid";
              }
              isi_orderan($no, array($data['no_tagihan'], $data['tanggal'], $data['nama'], $data['email'], $data['hp'], $status), $link, $data['no_tagihan']);
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
        $query  = $mysqli->query ( "SELECT * FROM pembelian WHERE no_tagihan='$_GET[id]'");
        $data= $query->fetch_array();
        $aksi   = "Detail";
      }
      
      
        echo'
        <div class="card shadow mb-4">
          <div class="card-header py-3">
          <h3 class="page-header"><b>'.$aksi.' Orderan</b> </h3>
          </div>
          ';  
        buka_form($link, $data['no_tagihan'], strtolower($aksi));
          buat_notag("No.Tagihan :", $data['no_tagihan'], 4);
          buat_rowtabsbuka();
            buat_label("Nama :",2);
            buat_col($data['nama'],4);
            buat_label("Tanggal :",2);
            buat_col($data['tanggal'],4);
          buat_rowtabstutup();
          buat_rowtabsbuka();
            buat_label("Email :",2);
            buat_col($data['email'],4);
            buat_label("Hp :",2);
            buat_col($data['hp'],4);
          buat_rowtabstutup();
          buat_rowtabsbuka();
            buat_label("Kota :",2);
            buat_col($data['kota'],4);
            buat_label("Kode Pos :",2);
            buat_col($data['pos'],4);
          buat_rowtabstutup();
          buat_tag("Alamat :", $data['alamat']);
          echo "<hr>";

          $list = array();
				  $list[] = array('val'=>'new', 'cap'=>'Unpaid');
				  $list[] = array('val'=>'done', 'cap'=>'Paid');
          buat_combobox("Edit Status","status",$list, $data['payment']);
        tutup_form($link);
        
        echo'
        <table class="table table-striped">
        <thead>
          <tr>
            <th>Product</th>
            <th class="text-center">Ukuran</th>
            <th class="text-center">Qty</th>
            <th class="text-right">Price</th>
            <th class="text-right">Total</th>
          </tr>
        </thead>
        <tbody>';
          
          $total=0;
          $pemquery = $mysqli->query("SELECT * FROM pembelian WHERE no_tagihan='$_GET[id]'");
                while ($dpem = $pemquery->fetch_array()) {
                    $ip = $dpem['id_produk'];
                    $size = $dpem['ukuran'];
                    $qty = $dpem['jumlah'];

                  $pquery = $mysqli->query("SELECT * FROM product WHERE id='$ip' ");
                    while ($data = $pquery->fetch_array()) {
                        $np = $data['nama_product'];
                        $harga = $data['harga'];
                        
                        $sub = $qty*$harga;
                      $total += $sub;
                      echo'
                          <tr>
                            <td>'.$np.'</td>
                            <td align="center">'.$size.'</td>
                            <td align="right">'.$qty.'</td>
                            <td align="right">'.rupiah($harga).'</td>
                            <td align="right">'.rupiah($sub).'</td>
                          </tr>
                      ';
                    }
                }
        echo'
          <tr>
            <td colspan="3"></td>
            <td align="right"><b>Total</b></td>
            <td align="right"><b>'.rupiah($total).'</b></td>
          </tr>
        </tbody>
        </table>
        ';
        echo'
            </div>';
      
    break;

    //Menyisipkan atau mengedit data di database
    case "action":
      $status	= $_POST[status];
  
  
      $query  = $mysqli->query ( "UPDATE pembelian SET
      payment    = '$status'
      WHERE no_tagihan='$_POST[id]'
      ");
      
      header('location:'.$link);
    break;
    
    //Menghapus data di database
    case "delete":

      $query = $mysqli->query("DELETE FROM pembelian WHERE no_tagihan='$_GET[id]'");

      header('location:'.$link);
    break;

}

?>