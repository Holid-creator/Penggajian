<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <strong>Filter Data Absensi Pegawai</strong>
        </div>
        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mb-2">
                    <label for="">Bulan :</label>
                    <select name="bulan" class="form-control ml-3">
                        <option value="">-- Pilih Bulan --</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group mb-2 ml-2">
                    <label for="">Tahun :</label>
                    <select name="tahun" class="form-control ml-3">
                        <option value="">-- Pilih Tahun --</option>
                        <?php $tahun = date('Y');
                        for ($i = 2020; $i < $tahun + 5; $i++) {
                        ?> <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye mr-1"></i>Tampilkan Data</button>
                <a href="<?= base_url('admin/absensi/input_absensi') ?>" class="btn btn-success mb-2 ml-1"><i class="fas fa-plus mr-1"></i>Input Kehadiran</a>
            </form>
        </div>
    </div>

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
    <div class="alert alert-info">Menampilkan Data Kehadiran Pegawai Bulan : <span class="font-weight-bold"><?= $bulan ?></span> Tahun: <span class="font-weight-bold"><?= $tahun ?></span></div>

    <?php

    $jml_data = count($absensi);
    if ($jml_data > 0) {
    ?>

        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Pegawai</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Hadir</th>
                <th>Sakit</th>
                <th>Alpha</th>
            </tr>
            <?php
            $no = 1;
            foreach ($absensi as $absen) :
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $absen->nik ?></td>
                    <td><?= $absen->n_peg ?></td>
                    <td><?= $absen->jk ?></td>
                    <td><?= $absen->n_jab ?></td>
                    <td><?= $absen->hadir ?></td>
                    <td><?= $absen->sakit ?></td>
                    <td><?= $absen->alpha ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    <?php } else { ?>

        <span class="badge badge-danger"><i class="fas fa-info-circle mr-1"></i>Data Masih Kosong, Silahkan input data kehadiran pada bulan dan tahun yang anda pilih</span>

    <?php } ?>
</div>