<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <strong>Input Absensi Pegawai</strong>
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

                <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye mr-1"></i>Generate</button>
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

    <form method="post">
        <button type="submit" class="btn btn-success mb-2" name="submit" value="submit">Simpan</button>
        <table class="table table-striped table-hover table-bordered" style="margin-bottom: 70px;">
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Pegawai</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th width="100px">Hadir</th>
                <th width="100px">Sakit</th>
                <th width="100px">Alpha</th>
            </tr>
            <?php
            $no = 1;
            foreach ($input_absen as $ab) :
            ?>
                <tr>
                    <input type="hidden" class="form-control" name="bulan[]" value="<?= $blnthn ?>">
                    <input type="hidden" class="form-control" name="nik[]" value="<?= $ab->nik ?>">
                    <input type="hidden" class="form-control" name="n_peg[]" value="<?= $ab->n_peg ?>">
                    <input type="hidden" class="form-control" name="jk[]" value="<?= $ab->jk ?>">
                    <input type="hidden" class="form-control" name="n_jab[]" value="<?= $ab->n_jab ?>">
                    <td><?= $no++ ?></td>
                    <td><?= $ab->nik ?></td>
                    <td><?= $ab->n_peg ?></td>
                    <td><?= $ab->jk ?></td>
                    <td><?= $ab->n_jab ?></td>
                    <td><input type="number" class="form-control" name="hadir[]" value="0"></td>
                    <td><input type="number" class="form-control" name="sakit[]" value="0"></td>
                    <td><input type="number" class="form-control" name="alpha[]" value="0"></td>
                </tr>
            <?php endforeach ?>
        </table>
    </form>

</div>