<?php
include "koneksi.php";
include "header.php";

if(isset($_GET['id_transaksi'])) {
    $id_transaksi = $_GET['id_transaksi'];

    $query = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'");
    $data = mysqli_fetch_array($query);

    $id_produk = $data['id_produk'];
}
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
            <div class="col-9">

                <!-- untuk mengambil stok barang -->
                <?php
                $ambil = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id_produk'");
                $tangkap = mysqli_fetch_array($ambil);
                ?>
                <!-- akhiran mengambil stok barang -->

                <!-- untuk mengambil dari transaksi -->
                <div class="barang card p-3 mb-3">
                    <div class="">
                    <a href="hapus_list1.php?id_transaksi=<?=$id_transaksi?>&id_produk=<?=$id_produk?>" class="float-end fs-3 text-dark"><b><i class="bi bi-x"></i></b></a>
                    </div>
                <div class="row">
                <div class="col-md-4">
                    <img src="assets/produk/<?php echo $tangkap['foto'] ?>" alt="" style="height:280px; width:230px;">
                </div>
                    <div class="col-md-8">
                <p><b>ID produk : </b><?php echo $data['id_produk'] ?></p>
                <p><b>Nama produk : </b><?php echo $data['nama_produk'] ?></p>
                <p><b>Tanggal pembelian : </b><?php echo $data['tanggal'] ?></p>
                <p><b>Harga /pcs : </b>Rp. <?php echo number_format($data['hargaPCS']) ?></p>
                <p><b>Jumlah barang : </b><?php echo $data['jumlah']?></p>
                <p><b>Total harga : </b>Rp. <?php echo number_format($data['total']) ?></p>
                </div>
                </div>
                </div>

                <!-- jika barang lebih dari 1 maka juga akan mengambil dari table barang -->
                <?php
                $q = mysqli_query($conn, "SELECT * FROM barang WHERE id_transaksi='$id_transaksi'");
                while($d = mysqli_fetch_array($q)) {

                    $f = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$d[id_produk]'");
                    $ft = mysqli_fetch_array($f);
                ?>
                <div class="barang card p-3 mb-3">
                    <div class="">
                    <a href="hapus_list2.php?id_transaksi=<?=$id_transaksi?>&id_produk=<?=$d['id_produk']?>" class="float-end fs-3 text-dark"><b><i class="bi bi-x"></i></b></a>
                    </div>
                <div class="row">
                <div class="col-md-4">
                    <img src="assets/produk/<?php echo $ft['foto'] ?>" alt="" style="height:280px; width:230px;">
                </div>
                    <div class="col-md-8">
                <p><b>ID produk : </b><?php echo $d['id_produk'] ?></p>
                <p><b>Nama produk : </b><?php echo $d['nama_produk'] ?></p>
                <p><b>Tanggal pembelian : </b><?php echo $d['tanggal'] ?></p>
                <p><b>Harga /pcs : </b>Rp. <?php echo number_format($d['hargaPCS']) ?></p>
                <p><b>Jumlah barang : </b><?php echo $d['jumlah']?></p>
                <p><b>Total harga : </b>Rp. <?php echo number_format($d['total']) ?></p>
                </div>
                </div>
                </div>
                <?php } ?>

                <p class="fs-4"><b>Total harga keseluruhan : </b>
                        <?php

                        $total_harga1 = mysqli_query($conn, "SELECT SUM(total) AS total_harga1 FROM transaksi WHERE id_transaksi='$data[id_transaksi]'");
                        $final1 = mysqli_fetch_array($total_harga1);

                        $total_harga2 = mysqli_query($conn, "SELECT SUM(total) AS total_harga2 FROM barang WHERE id_transaksi='$data[id_transaksi]'");
                        $final2 = mysqli_fetch_array($total_harga2);

                        $total_harga_kes = $final1['total_harga1'] + $final2['total_harga2'];

                        ?> Rp. <?php echo number_format($total_harga_kes) ?>
                    </p>
                    <hr>
                <p class="text-success fs-4 float-start" style="text-decoration:underline;"><b>Total bayar (awal) : </b>Rp. <?php echo number_format($data['uang_cash']) ?></p>
                <p class="text-danger fs-4 float-end" style="text-decoration:underline;"><b>Kembalian (awal) : </b>Rp. <?php echo number_format($data['kembalian']) ?></p>

                <div class="clear" style="clear:both;"></div>
                <hr>
                            <form action="t_ubah.php" method="POST">
                            <p><input type="hidden" name="id_transaksi" value="<?php echo $data['id_transaksi'] ?>"></p> 
                            <p><input type="hidden" name="total_kes" value="<?php echo $total_harga_kes ?>"></p>
                            <p><input type="text" name="uang_cash" placeholder="Masukan jumlah uang cash jika ingin diubah" class="form-control outline-success" required></p> 
                            <div class="d-grid gap-2 mt-1">
                            <input type="submit" name="submit" class="btn btn-danger" value="Ubah Cash">
                            <a href="transaksi.php" class="btn btn-success">Selesai</a>
                            </form>
                    </div>
                
            </div>
    </div> <!-- div untuk row -->
</div> <!-- div container -->

<?php
include "footer.php";
?>