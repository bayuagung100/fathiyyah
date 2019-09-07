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
            <a href="https://api.whatsapp.com/send?phone=<?php echo $set['wa'];?>&text=Halo" target="_blank">
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
<script src="<?php echo $set["url"];?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="<?php echo $set["url"];?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Contact form JavaScript -->
<script src="<?php echo $set["url"];?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo $set["url"];?>js/contact_me.js"></script>

<!-- Custom scripts for this template -->
<script src="<?php echo $set["url"];?>js/agency.min.js"></script>

</body>

</html>