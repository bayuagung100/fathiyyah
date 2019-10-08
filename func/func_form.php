<?php
function buka_form($link, $id, $aksi){
	echo'<form method="post" action="'.$link.'&show=action" class="form-horizontal" enctype="multipart/form-data" style="padding:10px">
			<input type="hidden" name="id" value="'.$id.'">
			<input type="hidden" name="aksi" value="'.$aksi.'">';
}
function buat_notag($label, $nilai, $lebar='4'){
	echo'<div class="form-group row">
			<label class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-'.$lebar.'">
				<b>'.$nilai.'</b>
			</div>
		 </div>
		 ';
}
function buat_tag($label, $nilai, $lebar='4'){
	echo'<div class="form-group">
			<label class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-'.$lebar.'">'.$nilai.'</div>
		 </div>
		 ';
}
function buat_rowtagbuka(){
    echo'
    <div class="form-group row">
    ';
}
function buat_label($label, $lebar){
    echo'
    <label class="col-sm-'.$lebar.'" control-label">'.$label.'</label>
    ';
}
function buat_col($nilai, $lebar){
    echo'
    <div class="col-sm-'.$lebar.'">'.$nilai.'</div>
    ';
}
function buat_rowtagtutup(){
    echo'
    </div>
    ';
}

function buat_textbox($label, $nama, $nilai, $lebar='4', $tipe="text"){
	echo'<div class="form-group row" id="'.$nama.'">
			<label for="'.$nama.'" class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-'.$lebar.'">
			  <input type="'.$tipe.'" class="form-control" name="'.$nama.'" value="'.$nilai.'">
			</div>
		 </div>
		 ';
}
function buat_rowtabsbuka(){
    echo'
    <div class="form-group row">
    ';
}
function buat_rowtabstutup(){
    echo'
    </div>
    ';
}
function buat_col2tabs($label){
    echo'
    <label class="col-sm-2 control-label">'.$label.'</label>
    ';
}

function buat_col10tabsbuka(){
    echo'
    <div class="col-sm-10">
    ';
}
function buat_col10tabstutup(){
    echo'
    </div>
    ';
}
function buat_tabs($label){
    echo'
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#gd'.$label.'">Google Drive</a></li>
        <li><a data-toggle="tab" href="#mc'.$label.'">MultCloud</a></li>
        <li><a data-toggle="tab" href="#yd'.$label.'">YouDrive</a></li>
    </ul>';
}
function buat_tabscontentbuka(){
    echo'
    <div class="tab-content">
    ';
}
function buat_tabscontenttutup(){
    echo'</div>';
}
function buat_tabscontentisibuka($id,$active="false"){
    echo'
    <div id="'.$id.'" class="tab-pane fade '.$active.'">
    ';
}
function buat_textboxtabs($label, $nama, $nilai, $lebar='4', $tipe="text"){
	echo'<div class="form-group row" id="'.$nama.'">
	        <div style="margin-top:5px">
			<label for="'.$nama.'" class="col-sm-1 control-label">'.$label.'</label>
			<div class="col-sm-'.$lebar.'">
			  <input type="'.$tipe.'" class="form-control" name="'.$nama.'" value="'.$nilai.'">
			</div>
			</div>
		 </div>
		 ';
}
function buat_tabscontentisitutup(){
    echo'</div>';
}

function buat_inlinebuka(){
    echo'<div class="form-group row">';
}
function buat_inlinetutup(){
    echo'</div>';
}
function buat_row($label, $nama, $nilai, $lebar='3', $tipe="text"){
    echo'
            <label for="'.$nama.'" class="col-sm-2 control-label">'.$label.'</label>
            <div class="col-sm-'.$lebar.'">
			  <input type="'.$tipe.'" class="form-control" name="'.$nama.'" value="'.$nilai.'">
			</div>
        
    ';
}
function buat_textarea($label, $nama, $nilai, $class=''){
	echo'<div class="form-group" id="'.$nama.'">
			<label for="'.$nama.'" class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-10">
			  <textarea class="form-control '.$class.'" rows="8" name="'.$nama.'">'.$nilai.'</textarea>
			</div>
		 </div>';
}
function buat_comborow($label, $nama, $list, $nilai, $lebar='3'){
	echo'
			<label for="'.$nama.'" class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-'.$lebar.'">
			  <select class="form-control" name="'.$nama.'">';
		foreach($list as $ls){
			$select = $ls['val']==$nilai ? 'selected' : '';
			echo'<option value='.$ls['val'].' '.$select.'>'.$ls['cap'].'</option>';
		}
	echo'	  </select>
			</div>
		';
}
function buat_combobox($label, $nama, $list, $nilai, $lebar='4'){
	echo'<div class="form-group" id="'.$nama.'">
			<label for="'.$nama.'" class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-'.$lebar.'">
			  <select class="form-control" name="'.$nama.'">';
		foreach($list as $ls){
			$select = $ls['val']==$nilai ? 'selected' : '';
			echo'<option value='.$ls['val'].' '.$select.'>'.$ls['cap'].'</option>';
		}
	echo'	  </select>
			</div>
		 </div>';
}

function buat_checkbox($label, $nama, $list){
	echo'<div class="form-group" id="'.$nama.'">
			<label class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-10">';
		foreach($list as $ls){
			echo' <input type="checkbox" name="'.$nama.'[]" value="'.$ls['val'].'" '.$ls['check'].'> '.$ls['cap'];
		}
	echo'	</div>
		</div>';
}

function buat_radio($label, $nama, $list){
	echo'<div class="form-group" id="'.$nama.'">
			<label class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-10">';
		foreach($list as $ls){
			echo'<label  for="'.$nama.$ls['val'].'" id="label_'.$nama.$ls['val'].'"> 
					<input type="radio" name="'.$nama.'" id="'.$nama.$ls['val'].'" value="'.$ls['val'].'" '.$ls['check'].'> '.$ls['cap'].' 
				</label>';
		}
	echo'	</div>
		</div>';
}

function buat_imagepicker($label, $nama, $nilai, $lebar='4'){
?>
	<script type="text/javascript">
		$(function(){
			$('#modal-<?php echo $nama; ?>').on('hidden.bs.modal', function (e) {
				var url = $('#<?php echo $nama; ?>').val();
				if(url != "") $('.tampil-<?php echo $nama; ?>').html('<img src="../media/thumbs/'+url+'" width="150" style="margin-bottom: 10px">');
			})
		});
	</script>
<?php
	echo'<div class="form-group imagepicker">
			<label for="'.$nama.'" class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-'.$lebar.'">
			<div class="tampil-'.$nama.'">';
		if($nilai != "") echo'<img src="../media/thumbs/'.$nilai.'" width="150" style="margin-bottom: 10px">';
	echo'	</div>
			<div class="input-group">
			  <input type="text" class="form-control input-'.$nama.'" id="'.$nama.'" name="'.$nama.'" value="'.$nilai.'" readonly>
			  <a data-toggle="modal" data-target="#modal-'.$nama.'" class="input-group-addon btn btn-success pilih-'.$nama.'">...</a>
			</div>
			</div>
			<div class="modal fade" id="modal-'.$nama.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">File Manager</h4>
						</div>
						<div class="modal-body">
							<iframe src="../vendor/filemanager/dialog.php?type=1&field_id='.$nama.'&relative_url=1" width="100%" height="500" style="border: 0"></iframe>
						</div>
					</div>
				</div>
			</div>
		 </div>';
}

function tutup_form($link){
	echo'<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary">
					<i class="glyphicon glyphicon-floppy-disk"></i> Simpan 
				</button>
				<a class="btn btn-warning" href="'.$link.'">
					<i class="glyphicon glyphicon-arrow-left"></i> Batal 
				</a>
			</div>
		</div>
	</form>';
}
?>
