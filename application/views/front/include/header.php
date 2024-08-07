<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="keywords"
    content="Medick Responsive web template, Bootstrap Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <title>Dompet Lauwba</title>
  
  <link href="//fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!-- Template CSS -->

  <link rel="stylesheet" href="<?= base_url('assets/front/') ?>css/style-starter.css">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('./assets/images/logo/logo.png') ?>" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .custom-btn-primary {
      width: 100%;
      display: block;
      background-color: #0d6efd;
      color: white;
      border-radius: 5px;
      padding: 8px;
      border: none;
    }

    .custom-btn-primary:hover {
      background-color: #0a58ca;
    }

    .custom-btn-primary:active {
      background-color: #0a58ca;
    }

    .custom-btn-outline-primary.group {
      background-color: white;
      color: #0d6efd;
      border-radius: 5px;
      padding: 3px 10px;
      border: 1px solid #0d6efd;
      border-top-left-radius: 0px;
      border-bottom-left-radius: 0px;
    }

    .custom-btn-outline-primary.group:hover {
      background-color: #0a58ca;
      color: white;
    }

    .custom-input {
      border: 1px solid #ced4da;
      border-radius: 5px;
      padding: 8px 12px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
    }
  </style>
</head>

<body>
  <div class="header-w3l">
    <!--header-->

    <header id="site-header" class="header-w3l fixed-top">
      <div class="container">
        <nav class="navbar navbar-expand-lg stroke">

          <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
            data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
            <span class="navbar-toggler-icon fa icon-close fa-times"></span>
            </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mx-lg-auto">

              <li class="nav-item <?= ($active == "home") ? "active" : "" ?>">
                <a class="nav-link" href="<?= base_url('Front') ?>">Home</a>
              </li>


              <li class="nav-item <?= ($active == "program") ? "active" : "" ?> ">
                <a class="nav-link" href="<?= base_url('Front/program') ?>">Program</a>
              </li>

              <li class="nav-item <?= ($active == "donasi") ? "active" : "" ?> ">
                <a class="nav-link" href="<?= base_url('Front/donasi') ?>">Donasi</a>
              </li>

              <li class="nav-item <?= ($active == "berita") ? "active" : "" ?> ">
                <a class="nav-link" href="<?= base_url('Front/all_berita') ?>">Berita</a>
              </li>

              <li class="nav-item <?= ($active == "about") ? "active" : "" ?> ">
                <a class="nav-link" href="<?= base_url('Front/about') ?>">About</a>
              </li>

              <li class="nav-item <?= ($active == "contact") ? "active" : "" ?> ">
                <a class="nav-link" href="<?= base_url('Front/contact') ?>">Contact</a>
              </li>

            </ul>

          </div>
          <!-- toggle switch for light and dark theme -->
          <div class="mobile-position">
            <nav class="navigation">
              <div class="theme-switch-wrapper">
                <label class="theme-switch" for="checkbox">
                  <input type="checkbox" id="checkbox">
                  <div class="mode-container">
                    <i class="gg-sun"></i>
                    <i class="gg-moon"></i>
                  </div>
                </label>
              </div>
            </nav>
          </div>
          <!-- //toggle switch for light and dark theme -->
        </nav>
      </div>
    </header>
  </div>
  <!-- //header -->