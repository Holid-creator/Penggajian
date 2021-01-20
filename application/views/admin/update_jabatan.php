<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card col-md-6" style="margin-bottom: 70px;">
        <div class="card-body">
            <?php foreach ($jabatan as $jbt) : ?>
                <form method="post" action="<?= base_url('admin/jabatan/update_aksi') ?>">
                    <div class="form-group">
                        <label for="">Nama Jabatan</label>
                        <input type="hidden" name="id_jab" value="<?= $jbt->id_jab ?>">
                        <input type="text" name="n_jab" class="form-control" value="<?= $jbt->n_jab ?>">
                        <?= form_error('n_jab', '<div class="text-danger text-small ml-2">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Gaji Pokok</label>
                        <input type="text" name="gaji_pokok" class="form-control" value="<?= $jbt->gaji_pokok ?>">
                        <?= form_error('gaji_pokok', '<div class="text-danger text-small ml-2">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Tunjangan Transport</label>
                        <input type="text" name="transport" class="form-control" value="<?= $jbt->transport ?>">
                        <?= form_error('transport', '<div class="text-danger text-small ml-2">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Uang Makan</label>
                        <input type="text" name="uang_makan" class="form-control" value="<?= $jbt->uang_makan ?>">
                        <?= form_error('uang_makan', '<div class="text-danger text-small ml-2">', '</div>') ?>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            <?php endforeach ?>
        </div>
    </div>
</div>