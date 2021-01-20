<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card col-md-8">
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/pot_gaji/tambah_aksi') ?>">
                <div class="form-group">
                    <label for="">Jenis Potongan</label>
                    <input type="text" name="potongan" class="form-control">
                    <?= form_error('potongan', '<div class="text-danger small ml-2">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Jumlah Potongan</label>
                    <input type="number" name="jml_pot" class="form-control">
                    <?= form_error('jml_pot', '<div class="text-danger small ml-2">', '</div>') ?>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>