<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo $set["judul_website"];?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo $set["url"];?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?php echo $set["url"];?>vendor/DataTables/datatables.min.css"/>
  

  <!-- Custom fonts for this template -->
  <link href="<?php echo $set["url"];?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="<?php echo $set["url"];?>css/agency.min.css" rel="stylesheet">
  
  <script>
    // Get the modal
    var modal = document.getElementById('id01');
    var modal2 = document.getElementById('id02');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      } else if (event.target == modal2) {
        modal.style.display = "none";
      }
    }
  </script>
  
</head>

<body id="page-top">





  <!-- Scroll to Top Button-->
  <a class="scroll-to-top js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i> Menu
      </button>
      <a class="navbar-brand js-scroll-trigger" href="#page-top">The Fathiyyah
        <!-- <img src="img/logo-epm.png" style="max-width: 150px"> --></a>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <!-- <li class="nav-item">
            <form action="<?php echo $set['url']; ?>search/" method="post"style="padding: 15px">
              <input type="text" placeholder="Search Product..." name="kata">
              <button type="submit" style="border-radius: 5px;font-size:18px;color:#a5758c;"><i class="fa fa-search"></i></button>
            </form>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $set["url"]; ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo $set["url"]; ?>product/">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo $set["url"]; ?>category/">Category</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#offer">Offer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#team">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li> -->
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
            <button class="btn btn-primary" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><i class="fas fa-user-circle" style="font-size:24px"></i> <span>Sign In</span></button>
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

    <form class="modal-content animate" action="" method="post">
      <div class="container">
        <?php
        if (isset($_POST['loginhome'])) {
          $username = $_POST['usernamehome'];
          $password = md5($_POST['passwordhome']);

          $cekuser = $mysqli->query("SELECT * FROM user_shop WHERE username='$username' AND password='$password'");
          $jmluser = $cekuser->num_rows;
          $data = $cekuser->fetch_array();

          if ($jmluser > 0) {
            $_SESSION['id']       = $data['id'];
            $_SESSION['user']     = $data['username'];
            $_SESSION['pass']  = $data['password'];
            $_SESSION['nama']     = $data['nama'];
            $_SESSION['email']       = $data['email'];
            $_SESSION['hp']    = $data['hp'];
            $_SESSION['city']    = $data['city'];
            $_SESSION['pos']    = $data['pos'];
            $_SESSION['alamat']    = $data['alamat'];


            $_SESSION['log'] = 1;
            echo "
            <script>
            alert('Login Success'); 
            window.location = '".$_SERVER['HTTP_REFERER']."';
            </script>
            ";
          } else {
            echo '
            <br>
            <div class="alert alert-danger" role="alert"><b>Sorry!</b> Username atau password salah.</div>
            <script>
            alert("Sorry! Username atau password salah."); 
            </script>
            ';
          }
        }
        ?>

        <label for="usernamehome"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="usernamehome" required>

        <label for="passwordhome"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="passwordhome" required>
        <br>
        <br>
        <button type="submit" name="loginhome" class="btn btn-cart">Login</button>
        <button class="btn btn-cart" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
        <br>
        <br>
      </div>

    </form>
  </div>
  <div id="id02" class="modal">
    <div class=" modal-content animate" style="width: 35%;right: 20px;float: right;top: -24px;">
      <a class="nav-link" href="#"><i class="fas fa-user"></i> Profile</a>
      <?php
        $tagihan = mysqli_query($mysqli, "SELECT count(DISTINCT no_tagihan) as total from pembelian WHERE id_user_shop='$_SESSION[id]' AND payment='new' ");
        $tag = mysqli_fetch_assoc($tagihan);
      ?>
      <a class="nav-link" href="<?php echo $set["url"]; ?>tagihan/"><i class="fas fa-archive"></i> Tagihan <span><sup><?php echo $tag['total'];?></sup></span></a>
      <a class="nav-link" href="<?php echo $set["url"];?>shop/logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
      <span onclick="document.getElementById('id02').style.display='none'" class="nav-link" title="Close">&times; Close</span>
    </div>
  </div>




    <!-- Header -->
    <!--<header class="masthead">
    <div class="container">
      <div class="intro-text">-->
    <!-- <div class="intro-lead-in">Welcome To Our Company!</div> -->
    <!-- <div class="intro-heading text-uppercase">It's Nice To Meet You</div> -->
    <!-- <a class="btn btn-primary text-uppercase js-scroll-trigger" href="#about">See More <i class="fas fas fa-angle-double-down"></i></a> -->

    <!--  </div>
    </div>
  </header>-->