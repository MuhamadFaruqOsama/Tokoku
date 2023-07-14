<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- untuk font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aboreto&family=Concert+One&family=Dancing+Script&family=Fredoka&family=Handlee&family=Lobster&family=PT+Serif&family=Patrick+Hand&family=Peralta&family=Playfair+Display&family=Reggae+One&family=Righteous&family=Roboto+Slab:wght@300&family=Source+Serif+Pro:ital,wght@0,300;1,200&family=Ultra&display=swap" rel="stylesheet">

    <!-- untuk icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- untuk link css -->
    <link rel="stylesheet" href="assets/style/style.css">

    <title>TOKOKU</title>
    <link rel="shortcut icon" href="assets/img/logo.ico" type="image/x-icon" />
  </head>
  <body>
  <nav class="navbar navbar-light bg-light">
  <div class="container">
    <div class="navbar-brand">
    <img src="assets/img/logo.png" alt="" width="65" height="40" class="d-inline-block align-text-top">
    </div>
    <form class="d-flex ms-auto" action="home.php" method="POST">
      <input class="form-control me-2" type="search" name="keyword" placeholder="Cari sesuatu" aria-label="Search" autofocus>
      <button class="btn btn-success" type="submit" name="cari"><i class="bi bi-search"></i></button>
    </form>
  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow">
  <div class="container">
    <a class="navbar-brand" href="#">
      <b><i class="bi bi-shop"></i> TOKOKU</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="transaksi.php">Transaksi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="restock.php">Restock</a>
        </li>
      </ul>
    </div>
  </div>
</nav>