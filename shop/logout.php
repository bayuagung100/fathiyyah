<?php
  include "../admin/config.php";
  session_start();
  session_destroy();
  // echo "<script>
	// 	alert('Anda telah logout'); 
	// 	window.location = 'http://localhost/fathiyyah/';
	// 	</script>";
  echo "<script>
		alert('Anda telah logout'); 
		window.location = '".$set['url']."';
		</script>";
?>