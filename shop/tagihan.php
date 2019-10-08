<?php 
session_start();
include '../admin/config.php';
include '../website/header.php';
?>

<section class="bg-light page-section" id="category">
	<div class="container">

		<div class="row" style="padding: 20px">
			<div class="col-md-12 text-center" style="padding: 20px">
				<ul class="breadcrumb">
					<li><a href="<?php echo $set["url"];?>">Home</a></li>
					<li class="active">Tagihan</li>
				</ul>
            </div>

            <div class="table-responsive">
            <table id="example" class="stripe" style="width:100%">
                <thead>
                    <tr>
                        <th>No.Tagihan</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?
                    $query = $mysqli->query("SELECT DISTINCT no_tagihan, nama, tanggal, payment FROM pembelian WHERE id_user_shop=$_SESSION[id] order by id DESC ");
                    while ($data=$query->fetch_array()) {
                        $nt = $data['no_tagihan'];
                        $nm = $data['nama'];
                        $tgl = $data['tanggal'];
                        $payment = $data['payment'];
                        if ($payment=="new") {
                            $status = "<span style='color:red'>Unpaid</span>";
                        }else {
                            $status = "<span style='color:green'>Paid</span>";
                        }
                        $aksi = "<a href='../print/?no_tagihan=".$nt."' target='_blank' class='btn btn-cart' >Print</a> <a href='../payment/' class='btn btn-cart' >Bayar</a>";

                        echo'
                        <tr>
                            <td>'.$nt.'</td>
                            <td>'.$nm.'</td>
                            <td>'.$tgl.'</td>
                            <td>'.$status.'</td>
                            <td>'.$aksi.'</td>
                        </tr>
                        ';
                    }
                    ?>
                    
                </tbody>
            </table>
            </div>

		</div>
	</div>
</section>
<?php 	
include '../website/footer.php';
?>

