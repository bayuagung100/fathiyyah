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


<script src="<?php echo $set["url"];?>vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $set["url"];?>vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

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

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>

</html>