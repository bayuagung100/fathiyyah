<?php
function buka_tabel($judul){
	echo'
	<div class="card-body">
		<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
			<tr>
			<th style="width: 10px">No</th>';
	foreach($judul as $jdl){
		echo '<th>'.$jdl.'</th>';
	}
				
		echo '<th style="width: 90px">Aksi</th>
			</tr>
		</thead>
		<tbody>';
}

function buka_tabel_orderan($judul){
	echo'
	<div class="card-body">
		<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
			<tr>
			<th style="width: 10px">No</th>';
	foreach($judul as $jdl){
		echo '<th>'.$jdl.'</th>';
	}
				
		echo '	<th style="width: 90px">Aksi</th>
			</tr>
		</thead>
		<tbody>';
}
function isi_orderan($no, $data, $link, $id, $edit=true){
	echo'<tr>
			<td valign="top">'.$no.'</td>';
	foreach($data as $dt){
		echo'<td valign="top">'.$dt.'</td>';
	}
	echo'<td valign="top">';
	if($edit){
		echo'<a href="'.$link.'&show=form&id='.$id.'" class="btn btn-success btn-sm">
				<i class="fas fa-eye"></i> Detail
			</a> ';
	}
	echo'</td>
		</tr>';
}


function isi_bp($no, $data, $link, $id, $edit=true, $hapus=true){
	echo'
		<tr>
		<td valign="top">'.$no.'</td>';
	foreach($data as $dt){
		echo'<td>'.$dt.'</td>';
	}
	echo'<td>';
	if($edit){
		echo'<a href="'.$link.'&show=form&id='.$id.'" class="btn btn-primary btn-sm">
				<i class="fas fa-pencil-alt"></i>
			</a> ';
	}
	if($hapus){
		echo'<a href="'.$link.'&show=delete&id='.$id.'" class="btn btn-danger btn-sm">
				<i class="fas fa-trash"></i>
			</a>';
	}
	echo'</td>
		</tr>';
}
function isi_contact($data, $link, $id, $hapus=true){
	echo'
		<tr>';
	foreach($data as $dt){
		echo'<td>'.$dt.'</td>';
	}
	echo'<td>';
	if($hapus){
		echo'<a href="'.$link.'&show=delete&id='.$id.'" class="btn btn-danger btn-sm">
				<i class="fas fa-trash"></i>
			</a>';
	}
	echo'</td>
		</tr>';
}

function tutup_tabel(){
	echo'		</tbody>	
			</table>
		</div>
	</div>';
}
?>
