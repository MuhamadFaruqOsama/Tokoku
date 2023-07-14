<?php
include "koneksi.php";

if(isset($_POST['submit'])) {
    $id_transaksi = htmlspecialchars($_POST['id_transaksi']);
    $id_produk = htmlspecialchars($_POST['id_produk']);
    $nama_produk = htmlspecialchars($_POST['nama_produk']);
    $hargaPCS = htmlspecialchars($_POST['hargaPCS']);
    $jumlah = htmlspecialchars($_POST['jumlah']);
    $stok = $_POST['stok'];

    if($jumlah > $stok) {
        ?>
        <script>
            alert("Barang yang dipesan lebih banyak dari stok yang tersedia");
            document.location="tambah_produk.php?id_transaksi=<?=$id_transaksi?>";
        </script>
        <?php
    } else {

        // query
        $cek = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi' AND id_produk='$id_produk'");
        $c = mysqli_query($conn, "SELECT * FROM barang WHERE id_transaksi='$id_transaksi' AND id_produk='$id_produk'");
        
        // hitung hasil query dan dideklarasikan menjadi array
        $cek_1 = mysqli_num_rows($cek);
        $cek_2 = mysqli_num_rows($c);
        $cekk = mysqli_fetch_array($cek);
        $cekkk = mysqli_fetch_array($c);

        if($cek_1 > 0) {

            $total_awal = $cekk['total'];
            $jumlah_awal = $cekk['jumlah'];

            $new_jumlah = $jumlah + $jumlah_awal;
            $t = $jumlah * $hargaPCS;

            // hitung total akhir
            $final_total = $t + $total_awal;

            $update = mysqli_query($conn, "UPDATE transaksi SET jumlah='$new_jumlah', total='$final_total' WHERE id_transaksi='$id_transaksi'");

                if($update) {
                    $stok = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id_produk'");
                    $ambil_stok = mysqli_fetch_array($stok);
                    $stok_barang = $ambil_stok['stok'];

                    $new_stok = $stok_barang - $jumlah;

                    $upload_stok = mysqli_query($conn, "UPDATE produk SET stok='$new_stok' WHERE id_produk='$id_produk'");
                    ?>
                    <script>
                        document.location="tambah_produk.php?id_transaksi=<?=$id_transaksi?>";
                    </script>
                    <?php
                } else {
                    echo "gagal";
                }
                
        } else if ($cek_2 > 0) {

            $total_a = $cekkk['total'];
            $jumlah_a = $cekkk['jumlah'];

            $new_j = $jumlah + $jumlah_a;
            $to = $jumlah * $hargaPCS;

            // hitung total akhir
            $final_total_1 = $to + $total_a;

            $u = mysqli_query($conn, "UPDATE barang SET jumlah='$new_j', total='$final_total_1' WHERE id_transaksi='$id_transaksi' AND id_produk='$id_produk'");

                if($u) {
                    $stok = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id_produk'");
                    $ambil_stok = mysqli_fetch_array($stok);
                    $stok_barang = $ambil_stok['stok'];

                    $new_stok = $stok_barang - $jumlah;

                    $upload_stok = mysqli_query($conn, "UPDATE produk SET stok='$new_stok' WHERE id_produk='$id_produk'");
                    ?>
                    <script>
                        document.location="tambah_produk.php?id_transaksi=<?=$id_transaksi?>";
                    </script>
                    <?php
                } else {
                    echo "gagal";
                } 
        } else {

            $total = $hargaPCS * $jumlah;

            $tanggal = date ("Y-m-d, H:i a");

            $input = mysqli_query($conn, "INSERT INTO barang (id_transaksi, id_produk, nama_produk, jumlah, hargaPCS,  total, tanggal) VALUES ('$id_transaksi','$id_produk','$nama_produk','$jumlah','$hargaPCS','$total','$tanggal')");

                if($input) {
                
                $stok = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id_produk'");
                $ambil_stok = mysqli_fetch_array($stok);
                $stok_barang = $ambil_stok['stok'];

                $new_stok = $stok_barang - $jumlah;

                $upload_stok = mysqli_query($conn, "UPDATE produk SET stok='$new_stok' WHERE id_produk='$id_produk'");

                    if($upload_stok) {
                        ?>
                        <script>
                            document.location="tambah_produk.php?id_transaksi=<?=$id_transaksi?>";
                        </script>
                        <?php
                    } else {
                        ?>
                        <script>
                            alert("Gagal");
                            document.location="tambah_produk.php";
                        </script>
                        <?php
                    }
                } else {
                    ?>
                    <script>
                        alert("Gagall");
                        document.location="tambah_produk.php";
                    </script>
                    <?php
                }
        }
    }
}
?>