<?php
include "koneksi.php";

if(isset($_POST['submit'])) {
    $id_produk = htmlspecialchars($_POST['id_produk']);
    $nama_produk = htmlspecialchars($_POST['nama_produk']);
    $stok = htmlspecialchars($_POST['stok']);
    $tanggal = date("d F Y");
    $harga = htmlspecialchars($_POST['harga']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);

    $ubah = mysqli_query($conn, "UPDATE produk SET nama_produk='$nama_produk', stok='$stok', terakhir_direstok='$tanggal', harga='$harga', deskripsi='$deskripsi' WHERE id_produk='$id_produk'");

    if($ubah) {
        ?>
        <script>
            alert("Berhasil diubah");
            document.location="restock.php";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Gagal diubah");
            document.location="restock.php";
        </script>
        <?php

    }
}
?>