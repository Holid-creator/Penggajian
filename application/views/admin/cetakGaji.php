<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/logo/logo1.png" type="image/x-icon">
    <title><?= $title ?></title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: black;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <center>
        <img src="../../assets/logo/logo.png" width="500px" class="mb-3">
        <h2>Daftar Gaji Pegawai</h2>
    </center>
    <?php
    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $blnthn = $bulan . $tahun;
    } else {
        $bulan = date('m');
        $tahun = date('Y');
        $blnthn = $bulan . $tahun;
    }
    ?>
    <div style="margin:10px">
        <table>
            <tr>
                <td>Bulan</td>
                <td>:</td>
                <td><?= $bulan ?></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?= $tahun ?></td>
            </tr>
        </table>
        <table class="table table-striped table-hover table-bordered">
            <tr class="text-center">
                <th>No</th>
                <th>NIK</th>
                <th>Nama Pegawai</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th width="130px">Gaji Pokok</th>
                <th width="130px">Tj. Transport</th>
                <th width="130">Uang Makan</th>
                <th width="130px">Potongan</th>
                <th width="140px">Total Gaji</th>
            </tr>
            <?php
            foreach ($potongan as $pt) {
                $alpha = $pt->jml_pot;
            }
            ?>
            <?php
            $no = 1;
            foreach ($cetakGaji as $cg) :
            ?>
                <?php $potongan = $cg->alpha * $alpha ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $cg->nik ?></td>
                    <td><?= $cg->n_peg ?></td>
                    <td><?= $cg->jk ?></td>
                    <td><?= $cg->n_jab ?></td>
                    <td>Rp. <?= number_format($cg->gaji_pokok, 0, ',', '.') ?></td>
                    <td>Rp. <?= number_format($cg->transport, 0, ',', '.') ?></td>
                    <td>Rp. <?= number_format($cg->uang_makan, 0, ',', '.') ?></td>
                    <td>Rp. <?= number_format($potongan, 0, ',', '.') ?></td>
                    <td>Rp. <?= number_format($cg->gaji_pokok + $cg->transport + $cg->uang_makan - $potongan, 0, ',', '.') ?></td>
                </tr>
            <?php endforeach ?>
        </table>
        <table width="100%">
            <tr>
                <td></td>
                <td width="200px">
                    <p>Bogor, <?= date('d M Y') ?> <br> Finance</p><br><br>
                    <p>________________</p>
                </td>
            </tr>
        </table>
        <?= anchor('admin/penggajian', '<div class="btn btn-primary">Kembali ke Data Gaji</div>') ?>
        <?= anchor('admin/laporan_gaji', '<div class="btn btn-primary">Kembali ke Laporan Gaji</div>') ?>
    </div>
</body>

</html>

<!-- <script>
    window.print();
</script> -->