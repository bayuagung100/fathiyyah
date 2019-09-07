<?php
function buka_tabel($judul){
	echo'
	<div class="card-body">
		<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
			<tr>';
	foreach($judul as $jdl){
		echo '<th>'.$jdl.'</th>';
	}
				
		echo '<th style="width: 90px">Aksi</th>
			</tr>
		</thead>
		<tbody>';
}

function isi_bp($data, $link, $id, $edit=true, $hapus=true){
	echo'
		<tr>';
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
