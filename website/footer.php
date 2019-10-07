<!-- Footer -->
<footer class="footer">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-4">
        <span class="copyright">Copyright &copy; The Fathiyyah <?php echo date('Y');?></span>
      </div>
      <div class="col-md-4">
        <ul class="list-inline social-buttons">
          <li class="list-inline-item">
            <a href="mailto: <?php echo $set['email'];?>" target="_blank">
              <i class="fas fa-at"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="<?php echo $set['ig'];?>" target="_blank">
              <i class="fab fa-instagram"></i>
            </a>
          </li><li class="list-inline-item">
            <a href="https://api.whatsapp.com/send?phone=<?php echo $set['wa'];?>&text=Hai, bagaimana cara memesan produk The Fathiyyah?" target="_blank">
              <i class="fab fa-whatsapp"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo $set["url"];?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo $set["url"];?>js/jquery.lazyload.js"></script>
<script src="<?php echo $set["url"];?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="<?php echo $set["url"];?>vendor/jquery-easing/jquery.easing.min.js"></script>


<script type="text/javascript" src="<?php echo $set["url"];?>vendor/DataTables/datatables.min.js"></script>

<!-- Contact form JavaScript -->
<script src="<?php echo $set["url"];?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo $set["url"];?>js/contact_me.js"></script>



<!-- Custom scripts for this template -->
<script src="<?php echo $set["url"];?>js/agency.min.js"></script>
<script type="text/javascript" charset="utf-8">
      $(function() {
      $("img.lazy").lazyload({effect : "fadeIn"});// untuk dipasang di <img src='xxxx'>
      
      });
      </script>

<script type="text/javascript">
    /* Formatting function for row details - modify as you need */
  function format ( d ) {
      var produk = d.nama_produk;
      var tmp = '<p>'+produk+'</p>';

      
      return produk;
      // return'<table class="table table-striped">'+
      //   '<thead>'+
      //   '<tr>'+
      //     '<th>Product</th>'+
      //   '</tr>'+
      //   '</thead>'+
      //   '<tbody>'+
      //   '<tr>'+produk+'</tr>'+
      //   '</tbody>'+
      // '</table>';
  }
  
  $(document).ready(function() {
      var table = $('#example').DataTable( {
          "ajax": "../ajax/data/tagihan.php",
          "deferRender": true,
          "columns": [
              {
                  "className":      'details-control',
                  "orderable":      false,
                  "data":           null,
                  "defaultContent": ''
              },
              { "data": "no_tagihan" },
              { "data": "nama" },
              { "data": "tanggal" },
              // { "data": "status" },
              { "render": function ( data, type, row ) { 
                  var html = ""
                  if(row.status == "new"){ 
                    html = 'UNPAID' 
                  }else{
                    html = 'PAID'
                  }
                  return html; 
                }
              },
              { "render": function ( data, type, row ) { // Tampilkan kolom aksi 
                  var html  = "<a href=''>EDIT</a> | "                        
                  html += "<a href=''>DELETE</a>"                        
                  return html                    
                }                
              },
          ],
          "order": [[3, 'desc']]
      } );
      
      // Add event listener for opening and closing details
      $('#example tbody').on('click', 'td.details-control', function () {
          var tr = $(this).closest('tr');
          var row = table.row( tr );
  
          if ( row.child.isShown() ) {
              // This row is already open - close it
              row.child.hide();
              tr.removeClass('shown');
          }
          else {
              // Open this row
              row.child( format(row.data()) ).show();
              tr.addClass('shown');
          }
      } );
  } );
  </script>
</body>

</html>