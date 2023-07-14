<?php
include "koneksi.php";

if(isset($_GET['id_transaksi'])) {
    $id_transaksi = $_GET['id_transaksi'];
    $id = $_GET['id_produk'];

    // untuk mengambil stok pada transaksi dan tanya apakah sudah dibayar atau belum
    $q = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'");
    $d = mysqli_fetch_array($q);

    $bayar = $d['uang_cash'];

    if($bayar > 0) {
        ?>
        <script>
            alert("Barang tidak bisa dihapus karena sudah dibayar!");
            document.location="edit_transaksi.php?id_transaksi=<?=$id_transaksi?>";
        </script>
        <?php
    } else {
    
    // menghitung apakah ini barang terakhir apa bukan, kalau iya maka transaksi akan otomatis dihapus
    $c = mysqli_query($conn, "SELECT * FROM barang WHERE id_transaksi='$id_transaksi'");
    $h = mysqli_num_rows($c);

    if($h == 0) {

        // mengambil stok barang yang diambil di transaksi
       $stk = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'");
       $st = mysqli_fetch_array($stk);

       $jum = $st['jumlah'];

       // mengambil stok barang dari tabel produk
       $que = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id'");
       $dat = mysqli_fetch_array($que);   

       $st_aw = $dat['stok'];

    //    menjumlahkan stok yang diambil dengan stok yang tersedia agar memperoleh stok awal
       $final = $jum + $st_aw;

       $insert_stok = mysqli_query($conn, "UPDATE produk SET stok='$final' WHERE id_produk='$id'");

       $hap = mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'");

       if($hap) {
        ?>
            <script>
                alert('Barang telah dihapus semua, transaksi otomatis akan dihapus');
                document.location="transaksi.php";
            </script>
        <?php
       } else {
        echo "gagal";
       }
    } else {

    $stok_pertama = $d['jumlah'];

    // untuk mengambil stok awal
    $qu = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id'");
    $da = mysqli_fetch_array($qu);

    $stok_awal = $da['stok'];

    // untuk mengembalikan barang yang tidak jadi dibeli
    $new_stok = $stok_pertama + $stok_awal;

    $update_stok = mysqli_query($conn, "UPDATE produk SET stok='$new_stok' WHERE id_produk='$id'");

    if(!$update_stok) {
        echo "Gagal disini";
    } else {

    // untuk mengambil barang yang akan menggantikan barang yang dihapus dari tabel transaksi
    $query = mysqli_query($conn, "SELECT * FROM barang WHERE id_transaksi = '$id_transaksi'");
    $data = mysqli_fetch_array($query);

    $id_produk = $data['id_produk'];
    $nama_produk = $data['nama_produk'];
    $jumlah = $data['jumlah'];
    $hargaPCS = $data['hargaPCS'];
    $total = $data['total'];

    $update = mysqli_query($conn, "UPDATE transaksi SET id_produk='$id_produk', nama_produk='$nama_produk',jumlah='$jumlah',hargaPCS='$hargaPCS',total='$total' WHERE id_transaksi='$id_transaksi'");

    if($update) {
        
        $hapus = mysqli_query($conn, "DELETE FROM barang WHERE id_transaksi='$id_transaksi' AND id_produk='$id_produk'");
        
        if($hapus) {
            ?>
            <script>
                document.location="edit_transaksi.php?id_transaksi=<?=$id_transaksi?>";
            </script>
            <?php
        } else {
            echo "$id_produk";
        }

    } else {
        echo "Gagal";
    }
    }
}
}
}
?>