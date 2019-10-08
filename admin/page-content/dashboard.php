        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        	<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

        	<!-- Earnings (Monthly) Card Example -->
        	<div class="col-xl-3 col-md-6 mb-4">
        		<a href="?content=product">
        			<div class="card border-left-primary shadow h-100 py-2">
        				<div class="card-body">
        					<div class="row no-gutters align-items-center">
        						<div class="col mr-2">
        							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Product</div>
        							<?php 
        								$query = mysqli_query($mysqli,"SELECT * FROM product");
        								$dp = mysqli_num_rows($query);
        							?>
        							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $dp; ?></div>
        						</div>
        						<div class="col-auto">
        							<i class="fas fa-camera-retro fa-2x text-gray-300"></i>
        						</div>
        					</div>
        				</div>
        			</div>
        		</a>
        	</div>

        	<!-- Earnings (Monthly) Card Example -->
        	<div class="col-xl-3 col-md-6 mb-4">
        		<a href="?content=cat_product">
        			<div class="card border-left-success shadow h-100 py-2">
        				<div class="card-body">
        					<div class="row no-gutters align-items-center">
        						<div class="col mr-2">
        							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Category Product</div>
        							<?php 
        								$query2 = mysqli_query($mysqli,"SELECT * FROM cat_product");
        								$dcp = mysqli_num_rows($query2);
        							?>
        							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $dcp; ?></div>
        						</div>
        						<div class="col-auto">
        							<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
        						</div>
        					</div>
        				</div>
        			</div>
        		</a>
        	</div>

        	<div class="col-sm-12">
        		<div class="card shadow mb-4">
        			<!-- Card Header - Dropdown -->
        			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        				<h6 class="m-0 font-weight-bold text-primary">Informasi Website</h6>
        				<a href="?content=about" class="btn btn-primary btn-sm">
        					<i class="fas fa-pencil-alt"></i> Edit
        				</a>
        			</div>
        			<!-- Card Body -->
        			<div class="card-body">
        				<div class="table-responsive">
        					<table class="table table-striped" >
        						<?php 
        						global $mysqli;
        						$query  = $mysqli->query( "select * from setting");
        						while($data = $query->fetch_array()){
        							$judul_website 	= $data["judul_website"];
        							$icon			= $data["icon"];
        							$deskripsi 		= $data["deskripsi"];
        							$alamat 		= $data["alamat"];
        							$email 	= $data["email"];
        							$ig 	= $data["ig"];
        							$url 	= $data["url"];
        							$wa 	= $data["wa"];
        						}
        						?>
        						<tr>
        							<td>Judul Website</td>
        							<td>: <?php echo $judul_website;?></td>
        						</tr>
        						<tr>
        							<td>Deskirpsi Website</td>
        							<td>: <?php echo $deskripsi;?></td>
        						</tr>
        						<tr>
        							<td>Url Website</td>
        							<td>: <?php echo $url;?></td>
        						</tr>
        						<tr>
        							<td>Icon Website</td>
        							<td>: <img src="../media/source/"<?php echo $icon;?> width="60"></td>
        						</tr>
        						<tr>
        							<td>Email Contact</td>
        							<td>: <?php echo $email;?></td>
        						</tr>
        						<tr>
        							<td>Alamat</td>
        							<td>: <?php echo $alamat;?></td>
        						</tr>
        						<tr>
        							<td>Instagram</td>
        							<td>: <?php echo $ig;?></td>
        						</tr>
        						<tr>
        							<td>WhatsApp</td>
        							<td>: <?php echo $wa;?></td>
        						</tr>

        					</table>
        				</div>
        			</div>
        		</div>
        	</div>

        </div>

        



