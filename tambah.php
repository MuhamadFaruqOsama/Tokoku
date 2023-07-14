<?php
include "koneksi.php";
include "header3.php";
?>

<div class="container mt-5">
    <h3>Tambah Produk : </h3>
    <form action="t_tambah.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="nama_produk" placeholder="Masukan Nama Produk" class="form-control mt-1" autofocus>
        <input type="text" name="harga" placeholder="Masukan Harga Produk" class="form-control mt-1">
        <input type="text" name="stok" placeholder="Masukan Stock Produk" class="form-control mt-1">
        <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control mt-1">Deskripsi</textarea>
        <input type="file" name="foto" id="" class="mt-1">
        <div class="d-grid gap-2 mt-1">
        <input type="submit" name="submit" class="btn btn-success mt-1" value="Tambah">
        </div>
    </form>
</div>

<?php
include "footer.php";
?>