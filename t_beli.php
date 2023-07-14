<?php
include "koneksi.php";

if(isset($_POST['submit'])) {
    $id_produk = htmlspecialchars($_POST['id_produk']);
    $nama_produk = htmlspecialchars($_POST['nama_produk']);
    $hargaPCS = htmlspecialchars($_POST['hargaPCS']);
    $jumlah = htmlspecialchars($_POST['jumlah']);
    $stok = $_POST['stok'];

    if($jumlah > $stok) {
        ?>
        <script>
            alert("Barang yang dipesan lebih banyak dari stok yang tersedia");
            document.location="home.php";
        </script>
        <?php
    } else {

    $total = $hargaPCS * $jumlah;

    
    $tanggal = date ("Y-m-d, H:i a");

    $input = mysqli_query($conn, "INSERT INTO transaksi (id_produk, nama_produk, hargaPCS, jumlah, total, tanggal) VALUES ('$id_produk','$nama_produk','$hargaPCS','$jumlah','$total','$tanggal')");

    if($input) {
        
        $stok = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id_produk'");
        $ambil_stok = mysqli_fetch_array($stok);
        $stok_barang = $ambil_stok['stok'];

        $new_stok = $stok_barang - $jumlah;

        $upload_stok = mysqli_query($conn, "UPDATE produk SET stok='$new_stok' WHERE id_produk='$id_produk'");

        if($upload_stok) {
            ?>
            <script>
                document.location="transaksi.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Gagal");
                document.location="transaksi.php";
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("Gagall");
            document.location="transaksi.php";
        </script>
        <?php
    }
}
}
?>