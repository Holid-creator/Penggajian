<div class="container-fluid col-md-5">
    <div class="card mx-auto">
        <div class="card-header bg-primary text-white text-center">
            <strong>Filter Slip Gaji Pegawai</strong>
        </div>
        <form method="post" action="<?= base_url('admin/slip_gaji/cetak_slip') ?>">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Masukkan Bulan &nbsp;&nbsp;&nbsp;&nbsp;:</label>
                    <div class="col-sm-7">
                        <select name="bulan" class="form-control">
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
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Masukkan Tahun &nbsp;&nbsp;&nbsp;:</label>
                    <div class="col-sm-7">
                        <select name="tahun" class="form-control">
                            <option value="">-- Pilih Tahun --</option>
                            <?php $tahun = date('Y');
                            for ($i = 2020; $i < $tahun + 5; $i++) {
                            ?> <option value="<?= $i ?>"><?= $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Nama Pegawai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                    <div class="col-sm-7">
                        <select name="n_peg" class="form-control">
                            <option value="">-- Pilih Pegawai --</option>
                            <?php foreach ($pegawai as $pg) : ?>
                                <option value="<?= $pg->n_peg ?>"><?= $pg->n_peg ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary col-sm-12"><i class="fas fa-print mr-1"></i>Cetak Slip Gaji</button>
            </div>
        </form>
    </div>
</div>