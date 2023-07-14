<?php
include "koneksi.php";
include "header2.php";
?>

<div class="container mt-5">

    <!-- untuk  form pencarian -->
    <div class="row mb-4 justify-content-center">
        <div class="col-md-9">
            <form class="d-flex ms-auto" action="" method="POST">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Cari barang" aria-label="Search" autofocus>
                <button class="btn btn-success" type="submit" name="cari"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <div class="col-md-1">
            <!-- untuk awalan tombol help -->

    <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" class="tombol-tanya text-warning fs-4" style="cursor:pointer;"><i class="bi bi-question-circle-fill"></i></a>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Bantuan <i class="bi bi-question-circle"></i></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <h5 class="text-center">Peringatan!</h5>
        <p>Secara default, tabel akan diurutkan berdasarkan stok barang <b>paling sedikit</b>. Hal ini ditujukan agar Anda (pemilik toko) tahu mana barang yang sudah mau habis dan <b>perlu direstok</b></p>
        <p>Tapi Anda juga bisa mengubah urutan tabel pada tulisan <b>"Urutkan berdasarkan"</b> diatas tabel, namun hanya sementara.</p>
        <hr>
        <h5 class="text-center">Indikator Tanda Panah</h5>
        <hr>
        <p><i class="bi bi-arrow-up-circle-fill text-success"></i> = Sangat Bagus</p>
        <p><i class="bi bi-arrow-up-left-circle-fill text-success"></i> = Bagus</p>
        <p><i class="bi bi-arrow-left-circle-fill text-warning"></i> = Lumayan</p>
        <p><i class="bi bi-arrow-down-left-circle-fill text-danger"></i> = Kurang memuaskan</p>
        <p><i class="bi bi-arrow-down-circle-fill text-danger"></i> = Kurang</p>
        <hr>
        <h5 class="text-center mt-3">Indikator Stok Barang</h5>
        <hr>
        <p><i class="bi bi-arrow-up-circle-fill text-success"></i> = Lebih dari 100 pcs</p>
        <p><i class="bi bi-arrow-up-left-circle-fill text-success"></i> = Lebih dari 75 pcs</p>
        <p><i class="bi bi-arrow-left-circle-fill text-warning"></i> = Lebih dari 50 pcs</p>
        <p><i class="bi bi-arrow-down-left-circle-fill text-danger"></i> =Lebih dari 25 pcs</p>
        <p><i class="bi bi-arrow-down-circle-fill text-danger"></i> = Kurang dari 25 pcs</p>
        <hr>
        <h5 class="text-center mt-3">Indikator Barang Terjual</h5>
        <hr>
        <p><i class="bi bi-arrow-up-circle-fill text-success"></i> = Lebih dari 50 pcs</p>
        <p><i class="bi bi-arrow-up-left-circle-fill text-success"></i> = Lebih dari 40 pcs</p>
        <p><i class="bi bi-arrow-left-circle-fill text-warning"></i> = Lebih dari 30 pcs</p>
        <p><i class="bi bi-arrow-down-left-circle-fill text-danger"></i> =Lebih dari 20 pcs</p>
        <p><i class="bi bi-arrow-down-circle-fill text-danger"></i> = Kurang dari 20 pcs</p>
        <hr>
        <h5 class="text-center mt-3">Indikator Pemasukan</h5>
        <hr>
        <p><i class="bi bi-arrow-up-circle-fill text-success"></i> = Lebih dari Rp. 80,000</p>
        <p><i class="bi bi-arrow-up-left-circle-fill text-success"></i> = Lebih dari Rp. 60,000</p>
        <p><i class="bi bi-arrow-left-circle-fill text-warning"></i> = Lebih dari Rp. 40,000</p>
        <p><i class="bi bi-arrow-down-left-circle-fill text-danger"></i> =Lebih dari Rp. 20,000</p>
        <p><i class="bi bi-arrow-down-circle-fill text-danger"></i> = Kurang dari Rp. 20,000</p>
    </div>
</div>

<!-- untuk akhiran tombol help -->

        </div> 
        <div class="col-md-2">
            <?php
            $tanggal = date("d F Y");
            ?>
            <div class="card">
                <div class="card-header bg-danger"></div>
                <div class="card-body text-center">
                    <div class=""><?php echo $tanggal ?></div>
                </div>
            </div>
        </div>
    </div> <!-- akhiran row pada form pencarian -->
    
    <!-- untuk membuat detail dalam melakukan pencarian -->
    <div class="container mt-2 mb-2">
        <details>
            <summary>Urutkan berdasarkan</summary>
            <div class="detail">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post">
                            <input type="submit" value="Barang yang masih banyak" name="stok_banyak" class="btn btn-sm btn-success">
                            <input type="submit" value="Barang yang sudah mau habis" name="stok_sedikit" class="btn btn-sm btn-danger me-3">
                            <input type="submit" value="Paling pertama direstock" name="pertama_direstok" class="btn btn-sm btn-success">
                            <input type="submit" value="Paling terakhir direstock" name="terakhir_direstok" class="btn btn-sm btn-danger me-3">
                            <input type="submit" value="Paling laku" name="banyak_terjual" class="btn btn-sm btn-success">
                            <input type="submit" value="Paling tidak laku" name="sedikit_terjual" class="btn btn-sm btn-danger me-3">
                            <input type="submit" value="Barang baru" name="barang_baru" class="btn btn-sm btn-success">
                            <input type="submit" value="Barang lama" name="barang_lama" class="btn btn-sm btn-danger">
                        </form>
                    </div>
                </div>
            </div>
        </details>
    </div>
    <!-- akhiran detail -->

    
    <!-- percobaan membuat tabel -->
    <div class="container">
        <table class="table text-center table-striped table-hover">
            <thead class="bg-success text-light">
                <tr>
                    <td>NO</td>
                    <td>ID Produk</td>
                    <td>Nama Produk</td>
                    <td>Harga /PCS</td>
                    <td>Stok Tersedia</td>
                    <td>Terakhir direstock</td>
                    <td>Barang Terjual</td>
                    <td>Pemasukan</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY stok ASC");
                $no = 0;

                if(isset($_POST['cari'])) {
                    $keyword = $_POST['keyword'];

                    $query = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk LIKE '%$keyword%' OR nama_produk LIKE '%$keyword%' ORDER BY id_produk DESC");

                } else if (isset($_POST['stok_banyak'])) {
                    $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY stok DESC");
                } else if (isset($_POST['stok_sedikit'])) {
                    $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY stok ASC");
                } else if (isset($_POST['pertama_direstok'])) {
                    $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY terakhir_direstok DESC");
                } else if (isset($_POST['terakhir_direstok'])) {
                    $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY terakhir_direstok ASC");
                } else if (isset($_POST['banyak_terjual'])) {
                    $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY barang_terjual DESC");
                } else if (isset($_POST['sedikit_terjual'])) {
                    $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY barang_terjual ASC");
                } else if (isset($_POST['barang_baru'])) {
                    $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");
                } else if (isset($_POST['barang_lama'])) {
                    $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk ASC");
                }

                while($data=mysqli_fetch_array($query)) {

                     // menghitung keseluruhan stok
                     $jum = mysqli_query($conn, "SELECT SUM(stok) AS stok FROM produk");
                     $tot = mysqli_fetch_array($jum);
                     $kes = $tot['stok'];
                     // akhiran menghitung keseeluruhan stok
                    
                    // untuk menghitung jumlah barang keluar
                    $id_produk = $data['id_produk'];
                    $jumlah_tr = mysqli_query($conn, "SELECT SUM(jumlah) AS jumlah_tr FROM transaksi WHERE id_produk='$id_produk'");
                    $total_tr = mysqli_fetch_array($jumlah_tr);
                    $jumlah_br = mysqli_query($conn, "SELECT SUM(jumlah) AS jumlah_br FROM barang WHERE id_produk='$id_produk'");
                    $total_br = mysqli_fetch_array($jumlah_br);

                    $total_br = $total_br['jumlah_br'];
                    $total_tr = $total_tr['jumlah_tr'];

                    $final = $total_br + $total_tr;

                    // menghitung jumlah keseluruhan barang yang keluar
                    $jumlah_total = mysqli_query($conn, "SELECT SUM(jumlah) AS jumlah_total1 FROM transaksi");
                    $total_keseluruhan_a = mysqli_fetch_array($jumlah_total);
                    $jumlah_total = mysqli_query($conn, "SELECT SUM(jumlah) AS jumlah_total2 FROM barang");
                    $total_keseluruhan_b = mysqli_fetch_array($jumlah_total);

                    $final_ks = $total_keseluruhan_a['jumlah_total1'] + $total_keseluruhan_b['jumlah_total2'];
                    // akhiran menghitung jumlah barang keluar

                    // untuk menghitung pemasukan
                    $jumlah2 = mysqli_query($conn, "SELECT SUM(total) AS total FROM transaksi WHERE id_produk='$id_produk'");
                    $jumlah3 = mysqli_query($conn, "SELECT SUM(total) AS totall FROM barang WHERE id_produk='$id_produk'");
                    $total2 = mysqli_fetch_array($jumlah2);
                    $total3 = mysqli_fetch_array($jumlah3);

                    $total_akhir = $total2['total'] + $total3['totall'];

                    // menghitung jumlah keseluruhan pemasukan
                    $jumlah_total2 = mysqli_query($conn, "SELECT SUM(total_kes) AS pemasukan FROM transaksi");
                    $total_keseluruhan2 = mysqli_fetch_array($jumlah_total2);
                    $keseluruhan2 = $total_keseluruhan2['pemasukan'];
                    // akhiran menghitung pemasukan

                    $no++
                ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data['id_produk'] ?></td>
                    <td><?php echo $data['nama_produk'] ?></td>
                    <td>Rp. <?php echo number_format($data['harga']) ?></td>
                    <td><?php echo $data['stok'] ?> pcs
                    <?php
                    if($data['stok'] >= 100) {
                        ?> <a href="#" class="text-success"><i class="bi bi-arrow-up-circle-fill"></i></a> <?php
                    } else if ($data['stok'] >= 75) {
                        ?> <a href="#" class="text-success"><i class="bi bi-arrow-up-left-circle-fill"></i></a> <?php
                    } else if ($data['stok'] >= 50) {
                        ?> <a href="#" class="text-warning"><i class="bi bi-arrow-left-circle-fill"></i></a> <?php
                    } else if ($data['stok'] >= 25) {
                        ?> <a href="#" class="text-danger"><i class="bi bi-arrow-down-left-circle-fill"></i></a> <?php
                    } else {
                        ?> <a href="#" class="text-danger"><i class="bi bi-arrow-down-circle-fill"></i></a> <?php
                    }
                    ?>
                    </td>
                    <td><?php echo $data['terakhir_direstok'] ?></td>
                    <td><?php echo $final ?> pcs 
                    <?php
                    include "koneksi.php";
                    $update = mysqli_query($conn, "UPDATE produk SET barang_terjual='$final' WHERE id_produk='$id_produk'");
                    if($final >= 50) {
                        ?> <a href="#" class="text-success"><i class="bi bi-arrow-up-circle-fill"></i></a> <?php
                    } else if ($final >= 40) {
                        ?> <a href="#" class="text-success"><i class="bi bi-arrow-up-left-circle-fill"></i></a> <?php
                    } else if ($final >= 30) {
                        ?> <a href="#" class="text-warning"><i class="bi bi-arrow-left-circle-fill"></i></a> <?php
                    } else if ($final >= 20) {
                        ?> <a href="#" class="text-danger"><i class="bi bi-arrow-down-left-circle-fill"></i></a> <?php
                    }else {
                        ?> <a href="#" class="text-danger"><i class="bi bi-arrow-down-circle-fill"></i></a> <?php
                    }
                    ?>
                    </td>
                    <td>Rp. <?php echo number_format($total_akhir) ?> 
                    <?php
                     if($total_akhir >= 80000) {
                        ?> <a href="#" class="text-success"><i class="bi bi-arrow-up-circle-fill"></i></a> <?php
                    } else if ($total_akhir >= 60000) {
                        ?> <a href="#" class="text-success"><i class="bi bi-arrow-up-left-circle-fill"></i></a> <?php
                    } else if ($total_akhir >= 40000) {
                        ?> <a href="#" class="text-warning"><i class="bi bi-arrow-left-circle-fill"></i></a> <?php
                    } else if ($total_akhir >= 20000) {
                        ?> <a href="#" class="text-danger"><i class="bi bi-arrow-down-left-circle-fill"></i></a> <?php
                    } else {
                        ?> <a href="#" class="text-danger"><i class="bi bi-arrow-down-circle-fill"></i></a> <?php
                    }
                    ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot class="table-striped-columns">
                <tr>
                    <td colspan="4" class="bg-success text-light">Jumlah Keseluruhan</td>
                    <td><?php echo $kes ?> pcs
                    <?php
                    if($kes >= 300) {
                        ?> <a href="#" class="text-success"><i class="bi bi-arrow-up-circle-fill"></i></a> <?php
                    } else if ($kes >= 200) {
                        ?> <a href="#" class="text-success"><i class="bi bi-arrow-up-left-circle-fill"></i></a> <?php
                    } else if ($kes >= 150) {
                        ?> <a href="#" class="text-warning"><i class="bi bi-arrow-left-circle-fill"></i></a> <?php
                    } else if ($kes >= 75) {
                        ?> <a href="#" class="text-danger"><i class="bi bi-arrow-down-left-circle-fill"></i></a> <?php
                    }else {
                        ?> <a href="#" class="text-danger"><i class="bi bi-arrow-down-circle-fill"></i></a> <?php
                    }
                    ?>
                    </td>
                    <td><?php echo $final_ks ?> pcs 
                    <?php
                    if($final_ks >= 160) {
                        ?> <a href="#" class="text-success"><i class="bi bi-arrow-up-circle-fill"></i></a> <?php
                    } else if ($final_ks >= 120) {
                        ?> <a href="#" class="text-success"><i class="bi bi-arrow-up-left-circle-fill"></i></a> <?php
                    } else if ($final_ks >= 80) {
                        ?> <a href="#" class="text-warning"><i class="bi bi-arrow-left-circle-fill"></i></a> <?php
                    } else if ($final_ks >= 40) {
                        ?> <a href="#" class="text-danger"><i class="bi bi-arrow-down-left-circle-fill"></i></a> <?php
                    } else {
                        ?> <a href="#" class="text-danger"><i class="bi bi-arrow-down-circle-fill"></i></a> <?php
                    }
                    ?>
                    </td>
                    <td>Rp. <?php echo number_format($keseluruhan2) ?>
                    <?php
                    if($keseluruhan2 >= 200000) {
                        ?> <a href="#" class="text-success"><i class="bi bi-arrow-up-circle-fill"></i></a> <?php
                    } else if ($keseluruhan2 >= 150000) {
                        ?> <a href="#" class="text-success"><i class="bi bi-arrow-up-left-circle-fill"></i></a> <?php
                    } else if ($keseluruhan2 >= 100000) {
                        ?> <a href="#" class="text-warning"><i class="bi bi-arrow-left-circle-fill"></i></a> <?php
                    } else if ($keseluruhan2 >= 50000) {
                        ?> <a href="#" class="text-danger"><i class="bi bi-arrow-down-left-circle-fill"></i></a> <?php
                    } else {
                        ?> <a href="#" class="text-danger"><i class="bi bi-arrow-down-circle-fill"></i></a> <?php
                    }
                    ?> 
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- akhiran percobaan tabel -->

   
<!-- untuk menghitung stok barang + barang terjual -->
<div class="container mt-5 mb-5">
    <div class="card mb-4">
            <div class="card-header text-light text-center bg-success">
                <?php
                $total_semua = $final_ks + $kes;
                ?>
                <h4>Jumlah Stok Barang dan Barang Laku : <?php echo $total_semua ?></h4>
            </div>
    </div>
</div>
    <!-- untuk akhirann menghitung stok barang + barang terjual -->

<?php
include "footer.php";
?>