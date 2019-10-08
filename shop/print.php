<?php 
session_start();
include "../admin/config.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Invoce #<?php echo $_GET['no_tagihan'];?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
      .invoice {
    position: relative;
    background: #fff;
    border: 1px solid #f4f4f4;
    padding: 20px;
    margin: 10px 25px;
}
  .page-header{
    margin: 10px 0 20px 0;
    font-size: 22px;
  }
  .page-header>small {
    color: #666;
    display: block;
    margin-top: 5px;
}
address {
    margin-bottom: 20px;
    font-style: normal;
    line-height: 1.42857143;
}
  </style>
</head>
<body>
<?php
    $tagquery = $mysqli->query("SELECT * FROM pembelian WHERE no_tagihan='$_GET[no_tagihan]'");
    $tag = $tagquery->fetch_array();
?>
<section class="invoice">
    <div class="row">
        <div class="col-xs-12">
                <h2 class="page-header">
                <i class="fa fa-globe"></i> TheFathiyyah.com
                </h2>
        </div>
    </div>
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
            <?php 
                $setquery = $mysqli->query("SELECT * FROM setting");
                $set = $setquery->fetch_array();
            ?>
          <strong>TheFathiyyah.com</strong><br>
          <?php echo $set['alamat'];?><br>
          Phone: +<?php echo $set['wa'];?><br>
          Email: <?php echo $set['email'];?>
        </address>
      </div>
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong><?php echo $_SESSION['nama'];?></strong><br>
          <?php echo $_SESSION['alamat'];?><br>
          Phone: <?php echo $_SESSION['hp'];?><br>
          Email: <?php echo $_SESSION['email'];?>
        </address>
      </div>
      <div class="col-sm-4 invoice-col">
        <b>No. Tagihan:</b> <?php echo $tag['no_tagihan']?><br>
        <b>Tagihan dibuat:</b> <?php echo $tag['tanggal']?><br>
        <b>Oleh:</b> <?php echo $tag['nama']?>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>ITEM NAME</th>
            <th>SIZE</th>
            <th>QUANTITY</th>
            <th>PRICE</th>
            <th>SUBTOTAL</th>
          </tr>
          </thead>
          <tbody>
            <?php 
                $total=0;
                $pemquery = $mysqli->query("SELECT * FROM pembelian WHERE no_tagihan='$_GET[no_tagihan]'");
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
                                <td>'.$size.'</td>
                                <td>'.$qty.'</td>
                                <td>'.rupiah($harga).'</td>
                                <td>'.rupiah($sub).'</td>
                            </tr>
                            ';
                        }
                }
                
            ?>
            <tr>    
                <td></td>
                <td></td>
                <td></td>
                <td><b>Total:</b></td>
                <td><?php echo rupiah($total);?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
</section>
  

</body>
</html>
