<!DOCTYPE html>
<html lang="en-US" prefix=
    "og: http://ogp.me/ns# 
     fb: http://ogp.me/ns/fb# 
     product: http://ogp.me/ns/product#">
<head profile="//gmpg.org/xfn/11">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php metaheader();?>
  
  <link href="<?php echo $set["url"];?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" type="text/css" href="<?php echo $set["url"];?>vendor/DataTables/datatables.min.css"/>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Sacramento&display=swap" rel="stylesheet">
  <link href="<?php echo $set["url"];?>css/agency.min.css" rel="stylesheet">
  
  <script>
    var modal = document.getElementById('id01');
    var modal2 = document.getElementById('id02');
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      } else if (event.target == modal2) {
        modal.style.display = "none";
      }
    }
  </script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109063463-9"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-109063463-9');
  </script>
</head>
<body id="page-top">
  <a class="scroll-to-top js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <a class="navbar-brand js-scroll-trigger" style="font-size:30px;margin: 0px 0px 0px 5px;" href="<?php echo $set["url"]; ?>">The Fathiyyah</a>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $set["url"]; ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo $set["url"]; ?>product/">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo $set["url"]; ?>category/">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo $set["url"]; ?>cek-ongkir/">Cek Ongkir</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo $set["url"]; ?>payment/">Konfirmasi Pembayaran</a>
          </li>
        </ul>
      </div>
      <ul class="navbar-nav text-uppercase">
        <li>
          <?php
          $sesi = session_id();
          $query = mysqli_query($mysqli, "SELECT count(*) as total from order_temp WHERE id_session='$sesi' ");
          $count = mysqli_fetch_assoc($query);
          ?>
          <a class="btn btn-primary" href="<?php echo $set["url"]; ?>cart/"><i class='fas fa-shopping-bag'></i> <span><?php echo $count['total']; ?></span></a>
        </li>
      </ul>
      <?php
      if (empty($_SESSION['user']) or empty($_SESSION['pass']) or $_SESSION['log'] == 0) {
        ?>
        <ul class="navbar-nav text-uppercase">
          <li>
            <button class="btn btn-primary" onclick="document.getElementById('id01').style.display='block'" style="width: auto;padding: 0;"><i class="fas fa-user-circle" style="font-size:24px;width: 100%;position: relative;top: 5px;"></i> <span style="font-size: 11px;bottom: 5px;position: relative;">Sign In</span></button>
          </li>
        </ul>
      <?php
      } else {
        ?>
        <ul class="navbar-nav text-uppercase">
          <li>
            <button class="btn btn-primary" onclick="document.getElementById('id02').style.display='block'" style="width:auto;"><i class="fas fa-user-circle" style="font-size:24px"></i></button>
          </li>
        </ul>
      <?php
      }
      ?>


    </div>
  </nav>

  <div id="id01" class="modal">

    <form class="modal-content animate" action="<?php echo $set['url'];?>aksi/" method="post">
    <!-- <form class="modal-content animate" action="http://localhost/fathiyyah/aksi/" method="post"> -->
      <input type="hidden" name="aksi" value="login-home">
      <div class="container">
        <label for="usernamehome"><b>Username</b></label>
        <input type="text" placeholder="Enter Username/Email" name="usernamehome" required>

        <label for="passwordhome"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="passwordhome" required>
        <br>
        <br>
        <button type="submit" class="btn btn-cart">Login</button>
        <button class="btn btn-cart" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
        <br>
        <br>
        <a href="<?php echo $set['url'];?>forgot-password/">Forgot Password?</a>
        |
        <a href="<?php echo $set['url'];?>regist/">Create an Account!</a>
        <br>
        <br>
      </div>

    </form>
  </div>
  <?php
    if(!empty($_SESSION['id'])){
  ?>
  <div id="id02" class="modal">
    <div class=" modal-content animate" style="width: 40%;right: 20px;float: right;top: -24px;">
      <a class="nav-link" href="<?php echo $set["url"]; ?>profile/"><i class="fas fa-user"></i> Profile</a>
      <?php
        $tagihan = mysqli_query($mysqli, "SELECT count(DISTINCT no_tagihan) as total from pembelian WHERE id_user_shop='$_SESSION[id]' AND payment='new' ");
        $tag = mysqli_fetch_assoc($tagihan);
      ?>
      <a class="nav-link" href="<?php echo $set["url"]; ?>tagihan/"><i class="fas fa-archive"></i> Tagihan <span><sup><?php echo $tag['total'];?></sup></span></a>
      <a class="nav-link" href="<?php echo $set["url"];?>shop/logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
      <span onclick="document.getElementById('id02').style.display='none'" class="nav-link" title="Close">&times; Close</span>
    </div>
  </div>
    <?php }else {
      
    }?>