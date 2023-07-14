<?php
if(isset($_GET['id_transaksi'])) {
    $id_transaksi = $_GET['id_transaksi'];
}
?>

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
    <link rel="shortcut icon" href="assets/img/logo.ico" type="image/x-icon"/>
  </head>
  <body>

  <!-- untuk navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container">
    <a class="navbar-brand" onclick="history.back(-1)"><i class="bi bi-arrow-bar-left"></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="transaksi.php">Selesai</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="container mt-5">

    <form class="d-flex ms-auto mt-2 mb-4" action="" method="POST">
      <input class="form-control me-2" type="search" name="keyword" placeholder="Cari barang yang mau direstock" aria-label="Search" autofocus>
      <button class="btn btn-success" type="submit" name="cari"><i class="bi bi-search"></i></button>
    </form>

    <div class="row">   
<?php
include "koneksi.php";

$query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");
$no=0;
if(isset($_POST['cari'])) {
  $keyword = $_POST['keyword'];
  $query = mysqli_query($conn, "SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR harga LIKE '%$keyword%'  OR id_produk LIKE '%$keyword%' ORDER BY id_produk DESC");
}
while($data = mysqli_fetch_array($query)) {
$no++
?>
<div class="col-md-2">
    <a href="tambah_beli.php?id_transaksi=<?=$id_transaksi?>&id_produk=<?=$data['id_produk']?>">
    <div class="card shadow-sm mb-4">
        <img src="assets/produk/<?php  echo $data['foto'] ?>" class="card-img-top" alt="foto produk">
        <div>
            <p class="float-start fw-bold text-dark"><?php echo $data['nama_produk'] ?></p>
            <p class="text-danger float-end fw-bold">Rp. <?php echo number_format($data['harga']) ?></p>
        </div>
    </div>
    </a>
</div>
<?php } ?>
</div> <!-- akhiran row -->
</div> <!-- akhiran container -->

<?php
include "footer.php";
?>