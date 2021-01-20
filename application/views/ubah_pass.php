<div class="container-fluid col-lg-5 mx-auto">
    <div>
        <h1 class="h3 mb-0 text-gray-800 text-center mb-3"><?= $title ?></h1>
    </div>
    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= base_url('ubah_pass/aksi') ?>">
                <div class="form-group">
                    <label for="">Password Baru</label>
                    <input type="password" name="passb" class="form-control">
                    <?= form_error('passb', '<div class="text-danger text-small ml-2">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" name="passn" class="form-control">
                    <?= form_error('passn', '<div class="text-danger text-small ml-2">', '</div>') ?>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>