<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card col-md-6" style="margin-bottom: 70px;">
        <div class="card-body">
            <?php foreach ($pot_gaji as $pg) : ?>
                <form method="post" action="<?= base_url('admin/pot_gaji/update_aksi') ?>">
                    <div class="form-group">
                        <label for="">Potongan Gaji</label>
                        <input type="hidden" name="id" value="<?= $pg->id ?>">
                        <input type="text" name="potongan" class="form-control" value="<?= $pg->potongan ?>">
                        <?= form_error('potongan', '<div class="text-danger text-small ml-2">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Potongan</label>
                        <input type="text" name="jml_pot" class="form-control" value="<?= $pg->jml_pot ?>">
                        <?= form_error('jml_pot', '<div class="text-danger text-small ml-2">', '</div>') ?>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            <?php endforeach ?>
        </div>
    </div>
</div>