<!DOCTYPE html>
<!-- = ROOT ?/zenblog/ -->

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?= ucfirst(App::$pageName) ?> - <?= APP_NAME ?></title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="<?= ROOT ?>/zenblog/assets/img/favicon.png" rel="icon">
  <link href="<?= ROOT ?>/zenblog/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= ROOT ?>/zenblog/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= ROOT ?>/zenblog/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= ROOT ?>/zenblog/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= ROOT ?>/zenblog/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?= ROOT ?>/zenblog/assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="<?= ROOT ?>/zenblog/assets/img/logo.png" alt="">
        <h1 class="sitename"><?= APP_NAME ?></h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?= ROOT ?>/zenblog/index.html" class="active">Home</a></li>
          <li><a href="<?= ROOT ?>/zenblog/about.html">About</a></li>        
          <li><a href="<?= ROOT ?>/zenblog/single-post.html">Single Post</a></li>
          
          </li>
          <li><a href="<?=ROOT?>/about">About</a></li>
          <li><a href="<?=ROOT?>/contact">Contact</a></li>
          <?php if (!Auth::logged_in()): 
           ?>
            <li><a href="<?= ROOT ?>/login">Login</a></li>
            <li><a href="<?= ROOT ?>/signup">Signup</a></li>
          <?php else: ?>
            <li class="dropdown"><a href="#"><span>"Hi," <?= Auth::getfirstname()?></span></i><i class="bi bi-person toggle-dropdown"></i>
            </a>
            <ul>
             <li><a href="<?= ROOT ?>/admin">dashboard</a></li>
              <li><a href="<?= ROOT ?>/admin">Profile</a></li>
              <li><a href="<?= ROOT ?>/admin">settings</a></li>
              <li><a href="<?= ROOT ?>/logout">Logout</a></li>

            </ul>
            <?php endif; ?>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
          
      <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>

    </div>
  </header>