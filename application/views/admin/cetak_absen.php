<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: black;
            margin: 30px;
        }
    </style>
</head>

<body>
    <center>
        <h1>HOLID DIGITAL PRINTING</h1>
        <h2>Laporan Kehadiran Pegawai</h2>
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
    <table>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td>
                <?= $bulan ?>
            </td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td>
                <?= $tahun ?>
            </td>
        </tr>
    </table>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>No</th>
            <th>Nama Pegawai</th>
            <th>NIK</th>
            <th>Jabatan</th>
            <th>Hadir</th>
            <th>Sakit</th>
            <th>Alpha</th>
        </tr>
        <?php
        $no = 1;
        foreach ($laporan_kh as $lkh) :
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $lkh->n_peg ?></td>
                <td><?= $lkh->nik ?></td>
                <td><?= $lkh->n_jab ?></td>
                <td><?= $lkh->hadir ?></td>
                <td><?= $lkh->sakit ?></td>
                <td><?= $lkh->alpha ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <?= anchor('admin/laporan_absen', '<div class="btn btn-primary">Kembali ke Laporan Absen</div>') ?>
</body>

</html>
<script>
    window.print();
</script>