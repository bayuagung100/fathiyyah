<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <?php 
  $query = mysqli_query($mysqli,"SELECT * FROM setting ");
  $set = mysqli_fetch_array($query); 
  ?>
  <title><?php echo $set["judul_website"];?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo $set["url"];?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?php echo $set["url"];?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="<?php echo $set["url"];?>css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top">





  <!-- Scroll to Top Button-->
  <a class="scroll-to-top js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">The Fathiyyah<!-- <img src="img/logo-epm.png" style="max-width: 150px"> --></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <!-- <li class="nav-item">
            <form action="<?php echo $set['url'];?>search/" method="post"style="padding: 15px">
              <input type="text" placeholder="Search Product..." name="kata">
              <button type="submit" style="border-radius: 5px;font-size:18px;color:#a5758c;"><i class="fa fa-search"></i></button>
            </form>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $set["url"];?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo $set["url"];?>product/">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo $set["url"];?>category/">Category</a>
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
          <li >
            <a class="btn btn-primary" href="<?php echo $set["url"];?>cart/"><i class='fas fa-shopping-bag'></i> <span>0</span></a>
          </li>
      </ul>
    </div>
  </nav>
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