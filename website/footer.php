<!-- Footer -->
<footer class="footer">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-4">
        <span class="copyright">Copyright &copy; The Fathiyyah <?php echo date('Y'); ?></span>
      </div>
      <div class="col-md-4">
        <ul class="list-inline social-buttons">
          <li class="list-inline-item">
            <a href="mailto: <?php echo $set['email']; ?>" target="_blank">
              <i class="fas fa-at"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="<?php echo $set['ig']; ?>" target="_blank">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="https://api.whatsapp.com/send?phone=<?php echo $set['wa']; ?>&text=Hai, bagaimana cara memesan produk The Fathiyyah?" target="_blank">
              <i class="fab fa-whatsapp"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo $set["url"]; ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo $set["url"]; ?>js/jquery.lazyload.js"></script>
<script src="<?php echo $set["url"]; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="<?php echo $set["url"]; ?>vendor/jquery-easing/jquery.easing.min.js"></script>


<script type="text/javascript" src="<?php echo $set["url"]; ?>vendor/DataTables/datatables.min.js"></script>

<!-- Contact form JavaScript -->
<script src="<?php echo $set["url"]; ?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo $set["url"]; ?>js/contact_me.js"></script>



<!-- Custom scripts for this template -->
<script src="<?php echo $set["url"]; ?>js/agency.min.js"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
    $("img.lazy").lazyload({
      effect: "fadeIn"
    }); // untuk dipasang di <img src='xxxx'>

  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable({
      "order": [
        [2, "desc"]
      ]
    });
  });

  $(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {

    var limit = 9;
    var start = 0;
    var action = 'inactive';

    function load_country_data(limit, start) {
      $.ajax({
        url: "<?php echo $set['url']; ?>ajax/data/product-all.php",
        method: "POST",
        data: {
          limit: limit,
          start: start
        },
        cache: false,
        success: function(data) {
          $('#load_data').append(data);
          if (data == '') {
            $('#load_data_message').hide();
            action = 'active';
          } else {
            $('#load_data_message').html("<img src='../img/load.gif'>");
            action = "inactive";
          }
        }
      });
    }

    if (action == 'inactive') {
      action = 'active';
      load_country_data(limit, start);
    }
    $(window).scroll(function() {
      if ($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive') {
        action = 'active';
        start = start + limit;
        setTimeout(function() {
          load_country_data(limit, start);
        }, 1000);
      }
    });

  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#provinsi').change(function() {

      //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax 
      var prov = $('#provinsi').val();

      $.ajax({
        type: 'GET',
        url: '<?php echo $set['url']; ?>ongkir/cek-kabupaten.php',
        data: 'province_id=' + prov,
        success: function(data) {

          //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
          $("#kabupaten").html(data);
        }
      });
    });

    // $("#cek").click(function() {
    //   //Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax 
    //   var asal = $('#asal').val();
    //   var kab = $('#kabupaten').val();
    //   var kurir = $('#kurir').val();
    //   var berat = $('#berat').val();

    //   $.ajax({
    //     type: 'POST',
    //     url: '<?php echo $set['url']; ?>ongkir/cek-ongkir.php',
    //     data: {
    //       'kab_id': kab,
    //       'kurir': kurir,
    //       'asal': asal,
    //       'berat': berat
    //     },
    //     success: function(data) {

    //       //jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
    //       $("#ongkir").text(data);
    //     }
    //   });
    // });
  });
</script>
<script type="text/javascript">
  $('#ekspedisi_jne').click(function() {
    var kab = <?php echo $_POST['kabupaten']; ?>;
    var cour = $('#ekspedisi_jne').val();
    var berat = <?php echo $_POST['berat']; ?>;
    console.log("kab:", kab);
    console.log("cour:", cour);
    console.log("berat:", berat);
    $.ajax({
      type: 'POST',
      url: '<?php echo $set['url']; ?>ongkir/cek-ongkir.php',
      data: {
        'kab_id': kab,
        'cour': cour,
        'berat': berat
      },
      success: function(data) {

        //jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
        $("#ongkir").html(data);
      }
    });
  });
  $('#ekspedisi_pos').click(function() {
    var kab = <?php echo $_POST['kabupaten']; ?>;
    var cour = $('#ekspedisi_pos').val();
    var berat = <?php echo $_POST['berat']; ?>;
    console.log("kab:", kab);
    console.log("cour:", cour);
    console.log("berat:", berat);
    $.ajax({
      type: 'POST',
      url: '<?php echo $set['url']; ?>ongkir/cek-ongkir.php',
      data: {
        'kab_id': kab,
        'cour': cour,
        'berat': berat
      },
      success: function(data) {

        //jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
        $("#ongkir").html(data);
      }
    });
  });
  $('#ekspedisi_tiki').click(function() {
    var kab = <?php echo $_POST['kabupaten']; ?>;
    var cour = $('#ekspedisi_tiki').val();
    var berat = <?php echo $_POST['berat']; ?>;
    console.log("kab:", kab);
    console.log("cour:", cour);
    console.log("berat:", berat);
    $.ajax({
      type: 'POST',
      url: '<?php echo $set['url']; ?>ongkir/cek-ongkir.php',
      data: {
        'kab_id': kab,
        'cour': cour,
        'berat': berat
      },
      success: function(data) {

        //jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
        $("#ongkir").html(data);
      }
    });
  });
</script>
<script>
function myFunction() {
  alert("I am an alert box!");
}
</script>
</body>

</html>