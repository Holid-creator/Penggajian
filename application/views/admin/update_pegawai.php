<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card col-md-6" style="margin-bottom: 70px;">
        <div class="card-body">

            <?php foreach ($pegawai as $pg) : ?>
                <form method="post" action="<?= base_url('admin/pegawai/update_aksi') ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">NIK</label>
                        <input type="hidden" class="form-control" name="id_peg" value="<?= $pg->id_peg ?>">
                        <input type="text" class="form-control" name="nik" value="<?= $pg->nik ?>" readonly>
                        <?= form_error('nik', '<div class="text-danger text-small ml-2">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Pegawai</label>
                        <input type="text" class="form-control" name="n_peg" value="<?= $pg->n_peg ?>">
                        <?= form_error('n_peg', '<div class="text-danger text-small ml-2">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="username" class="form-control" value="<?= $pg->username ?>">
                        <?= form_error('username', '<div class="text-danger text-small ml-2">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="password" class="form-control">
                        <?= form_error('password', '<div class="text-danger text-small ml-2">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jk" class="form-control">
                            <option value="<?= $pg->jk ?>"><?= $pg->jk ?></option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <?= form_error('jk', '<div class="text-danger text-small ml-2">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Jabatan</label>
                        <select name="n_jab" class="form-control">
                            <option value="<?= $pg->n_jab ?>"><?= $pg->n_jab ?></option>
                            <?php foreach ($jabatan as $jbt) : ?>
                                <option value="<?= $jbt->n_jab ?>"><?= $jbt->n_jab ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('jabatan', '<div class="text-danger text-small ml-2">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Masuk</label>
                        <input type="date" class="form-control" name="tgl_masuk" value="<?= $pg->tgl_masuk ?>">
                        <?= form_error('tgl_masuk', '<div class="text-danger text-small ml-2">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="form-control">
                            <option value="<?= $pg->status ?>"><?= $pg->status ?></option>
                            <option value="Pegawai Tetap">Pegawai Tetap</option>
                            <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
                        </select>
                        <?= form_error('status', '<div class="text-danger text-small ml-2">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <?php foreach ($pegawai as $pg) : ?>
                            <img src="<?= base_url() . 'assets/foto/' . $pg->foto ?>" width="200px" class="img-thumbnail">
                        <?php endforeach ?><br><br>
                        <label for="">Foto</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                    <div class="form-group">
                        <label for="">Hak Akses</label>
                        <select name="hak_akses" class="form-control">
                            <option value="<?= $pg->hak_akses ?>">
                                <?php if ($pg->hak_akses == '1') {
                                    echo 'Admin';
                                } else {
                                    echo 'Pegawai';
                                } ?>
                            </option>
                            <option value="1">Admin</option>
                            <option value="2">Pegawai</option>
                        </select>
                    </div>

                    <button type=" submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Simpan</button>
                </form>
            <?php endforeach ?>
        </div>
    </div>
</div>