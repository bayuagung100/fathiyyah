<?php include 'header.php'; ?>
<!-- test push dari github -->



<!-- Portfolio Grid -->
<section class="bg-light page-section" id="portfolio">
  <div class="container">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php 
          $querysld = mysqli_query($mysqli,"SELECT * FROM product WHERE slide='Y' ORDER BY id DESC");
          $total = mysqli_num_rows($querysld);

          $i=0;
          for ($i; $i < $total; $i++) { 
        ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i;?>" class="<?php if($i == 0){echo 'active';}else{echo '';}?>"></li>
        <?php
          }
        ?>
      </ol>
      <div class="carousel-inner" >
        <?php 
          $no=0;
          while ($data = mysqli_fetch_array($querysld)) {
            $sip = $data['id'];
            $snp = $data['nama_product'];
            $sgp = $data['gambar'];
            $sdp = $data['deskripsi'];
            $shp = $data['harga'];

            if($sgp){
              $spic = "media/source/".$sgp;
            }else{
              $spic = "img/noimage.jpg";
            }
        ?>
        
              <div class="carousel-item <?php if($no == 0){echo 'active';}else{echo '';}?>" style="background-image: url('<?php echo $spic;?>')">
                <div class="carousel-caption" style="color: #a5758c">
                  <h2 class="display-4"><?php echo $snp;?></h2>
                  <p class="lead"><?php echo $sdp; ?></p>
                </div>
              </div>
        <?php
          $no++;}
        ?>
          

      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <br>

    <div class="row">
      <?php 
      $query = mysqli_query($mysqli,"SELECT * FROM product ORDER BY id DESC");
      while ($data = mysqli_fetch_array($query)) {
        $ip = $data['id'];
        $np = $data['nama_product'];
        $gp = $data['gambar'];
        $dp = $data['deskripsi'];
        $hp = $data['harga'];

        if($gp){
          $pic = "media/source/".$gp;
        }else{
          $pic = "img/noimage.jpg";
        }

        echo'
        <div class="col-md-4 col-sm-6 portfolio-item">
        <a class="portfolio-link"  href="product/'.$ip.'/detail/">
        <div class="portfolio-hover">
        <div class="portfolio-hover-content">
        <i class="fas fa-eye fa-3x"></i>
        </div>
        </div>
        <img class="img-product-home" src="'.$pic.'" alt="">
        </a>
        <div class="portfolio-caption">
        <h3>'.$np.'</h3>
        <h6>'.rupiah($hp).'</h6>
        <p class="text-muted">'.$dp.'</p>
        </div>
        </div>
        ';
      }
      ?>
    </div>

  </div>
</section>


<!-- Footer -->
<?php include 'footer.php';?>