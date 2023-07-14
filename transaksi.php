<?php
include "koneksi.php";
include "header2.php";
?>

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-7">
            <form class="d-flex mb-3" action="" method="POST">
            <input class="form-control me-2" type="search" name="keyword" placeholder="Cari nota pembayaran berdasarkan tanggal, nama produk dan id produk" aria-label="Search" autofocus>
            <button class="btn btn-success" type="submit" name="cari"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>

    <div class="row justify-content-center">

    <?php
    $query = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY id_transaksi DESC");
    $no=0;
    if(isset($_POST['cari'])) {
        $keyword =  $_POST['keyword'];

        $query = mysqli_query($conn, "SELECT * FROM transaksi WHERE tanggal LIKE '%$keyword%' OR id_produk LIKE '%$keyword%' OR nama_produk LIKE '%$keyword%'");
    }
    while($data=mysqli_fetch_array($query)) {
        $no++
    ?>
        <div class="col-md-7 mt-2">
            <div class="card mb-3">
                <div class="card-header bg-success text-light text-center">
                    <h4>TOKOKU</h4>
                </div>
                <div class="card-body">
                    <p><b>ID transaksi : </b><?php echo $data['id_transaksi'] ?></p>
                    <p><b>Tanggal pembelian : </b><?php echo $data['tanggal'] ?></p>
                    <p><b>Nama produk : </b>
                        <ul>
                            <li><?php echo $data['nama_produk'] ?> (<?php echo $data['jumlah'] ?> pcs)</li>
                            <?php
                            $query2 = mysqli_query($conn, "SELECT * FROM barang WHERE id_transaksi='$data[id_transaksi]'");
                            while($data2 = mysqli_fetch_array($query2)) {
                            ?>
                            <li><?php echo $data2['nama_produk'] ?> (<?php echo $data2['jumlah'] ?> pcs)</li>
                            <?php } ?>
                        </ul>
                    </p>
                    <p><b>Jumlah barang : </b>
                        <?php
                        $jum_1 = mysqli_query($conn, "SELECT SUM(jumlah) AS jumlah1 FROM transaksi WHERE id_transaksi='$data[id_transaksi]'");
                        $jum_1 = mysqli_fetch_array($jum_1);
                        $jum_2 = mysqli_query($conn, "SELECT SUM(jumlah) AS jumlah2 FROM barang WHERE id_transaksi='$data[id_transaksi]'");
                        $jum_2 = mysqli_fetch_array($jum_2);

                        $total_jumlah = $jum_1['jumlah1'] + $jum_2['jumlah2'];
                        ?> <?php echo $total_jumlah . " pcs"?>
                    </p>
                    <p><b>Harga /pcs : </b>
                    <ul>
                            <li><?php echo $data['nama_produk'] ?> Rp. <?php echo number_format($data['hargaPCS']) ?> /pcs</li>
                            <?php
                            $query2 = mysqli_query($conn, "SELECT * FROM barang WHERE id_transaksi='$data[id_transaksi]'");
                            while($data2 = mysqli_fetch_array($query2)) {
                            ?>
                            <li><?php echo $data2['nama_produk'] ?> Rp. <?php echo number_format($data2['hargaPCS']) ?> /pcs</li>
                            <?php } ?>
                        </ul>
                    </p>
                    <p class="fs-4"><b>Total harga : </b>
                        <?php

                        $total_harga1 = mysqli_query($conn, "SELECT SUM(total) AS total_harga1 FROM transaksi WHERE id_transaksi='$data[id_transaksi]'");
                        $final1 = mysqli_fetch_array($total_harga1);

                        $total_harga2 = mysqli_query($conn, "SELECT SUM(total) AS total_harga2 FROM barang WHERE id_transaksi='$data[id_transaksi]'");
                        $final2 = mysqli_fetch_array($total_harga2);

                        $total_harga_kes = $final1['total_harga1'] + $final2['total_harga2'];

                        ?> Rp. <?php echo number_format($total_harga_kes) ?>
                    </p>
                    <hr>
                    <?php
                    if($data['uang_cash'] == 0) {
                        ?>
                        <div class="d-grid gap-2 mt-1">
                            <a href="Tambah_produk.php?id_transaksi=<?php echo $data['id_transaksi']?>" class="btn btn-success">Tambah Produk</a>
                            <a href="bayar.php?id_transaksi=<?php echo $data['id_transaksi']?>" class="btn btn-danger">Bayar</a>
                        </div>
                    <?php
                    } else {
                        ?>
                        <p class="text-success fs-4 float-start" style="text-decoration:underline;"><b>Total bayar : </b>Rp. <?php echo number_format($data['uang_cash']) ?></p>
                        <p class="text-danger fs-4 float-end" style="text-decoration:underline;"><b>Kembalian : </b>Rp. <?php echo number_format($data['kembalian']) ?></p>
                        <?php
                    }
                    ?>
                </div>
                <div class="card-footer bg-success pb-0">
                    <p class="float-end"><a href="print.php?id_transaksi=<?php echo $data['id_transaksi']?>" class="btn btn-primary btn-sm"><i class="bi bi-printer-fill"></i></a> <a href="edit_transaksi.php?id_transaksi=<?php echo $data['id_transaksi']?>" class="btn btn-warning btn-sm"><i class="bi bi-gear"></i></a> <a href="hapus_transaksi.php?id_transaksi=<?php echo $data['id_transaksi']?>" onclick="alert('PERINGATAN!! jika transaksi belum dibayar maka stok produk tidak akan dikembalikan seperti semula, Anda bisa mengembalikannya secara manual di halaman Restock atau hapus dulu semua produk yang sudah dilist secara manual di pengaturan edit transaksi'); return confirm('apakah Anda tetap ingin menghapus transaksi ini? ');" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div> <!-- div row -->
</div> <!-- div container -->

<?php
include "footer.php";
?>