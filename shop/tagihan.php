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
                        <th></th>
                        <th>No.Tagihan</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <!-- <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>Edinburgh</td>
                        <td>Edinburgh</td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>Tokyo</td>
                        <td>Tokyo</td>
                    </tr>
                    
                </tbody> -->
                <tfoot>
                    <tr>
                        <th></th>
                        <th>No.Tagihan</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
            </div>

		</div>
	</div>
</section>
<?php 	
include '../website/footer.php';
?>

