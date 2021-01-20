<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <strong>Filter Data Gaji Pegawai</strong>
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

                <button type="submit" class="btn btn-primary mb-2 mr-1 ml-auto"><i class="fas fa-eye mr-1"></i>Tampilkan Data</button>
                <?php if (count($gaji) > 0) { ?>
                    <a href="<?= base_url('admin/penggajian/cetak_gaji?bulan=' . $bulan), '&tahun=' . $tahun ?>" class="btn btn-success mb-2"><i class="fas fa-print mr-1"></i>Cetak Data Gaji</a>
                <?php } else { ?>
                    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#gaji"><i class="fas fa-print mr-1"></i>Cetak Data Gaji</button>
                <?php } ?>
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
    <div class="alert alert-info">Menampilkan Data Gaji Pegawai Bulan : <span class="font-weight-bold"><?= $bulan ?></span> Tahun: <span class="font-weight-bold"><?= $tahun ?></span></div>

    <?php
    $jml = count($gaji);
    if ($jml > 0) { ?>
        ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <tr class="text-center">
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Pegawai</th>
                    <th>Jenis Kelamin</th>
                    <th>Jabatan</th>
                    <th width="130px">Gaji Pokok</th>
                    <th width="130px">Tj. Transport</th>
                    <th width="110">Uang Makan</th>
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
                foreach ($gaji as $gj) :
                ?>
                    <?php $potongan = $gj->alpha * $alpha ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $gj->nik ?></td>
                        <td><?= $gj->n_peg ?></td>
                        <td><?= $gj->jk ?></td>
                        <td><?= $gj->n_jab ?></td>
                        <td>Rp. <?= number_format($gj->gaji_pokok, 0, ',', '.') ?></td>
                        <td>Rp. <?= number_format($gj->transport, 0, ',', '.') ?></td>
                        <td>Rp. <?= number_format($gj->uang_makan, 0, ',', '.') ?></td>
                        <td>Rp. <?= number_format($potongan, 0, ',', '.') ?></td>
                        <td>Rp. <?= number_format($gj->gaji_pokok + $gj->transport + $gj->uang_makan - $potongan, 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        <?php } else { ?>

            <span class="badge badge-danger"><i class="fas fa-info-circle mr-1"></i>Data Absensi Masih Kosong, Silahkan input data kehadiran pada bulan dan tahun yang anda pilih</span>

        <?php } ?>
        </div>

</div>

<div class="modal fade" id="gaji" tabindex="-1" aria-labelledby="gaji" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="gaji">Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Data Gaji Masih Kosong, Silahkan Input Absensi Terlebih dahulu pada tahun yang Anda pilih
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>