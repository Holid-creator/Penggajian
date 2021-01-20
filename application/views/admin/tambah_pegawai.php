<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card col-md-6" style="margin-bottom: 70px;">
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/pegawai/tambah_aksi') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">NIK</label>
                    <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK Pegawai">
                    <?= form_error('nik', '<div class="text-danger text-small ml-2">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Nama Pegawai</label>
                    <input type="text" class="form-control" name="n_peg" placeholder="Masukkan Nama Pegawai">
                    <?= form_error('n_peg', '<div class="text-danger text-small ml-2">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username Anda">
                    <?= form_error('username', '<div class="text-danger text-small ml-2">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                    <?= form_error('password', '<div class="text-danger text-small ml-2">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jk" class="form-control">
                        <option>-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <?= form_error('jk', '<div class="text-danger text-small ml-2">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Jabatan</label>
                    <select name="n_jab" class="form-control">
                        <option>-- Pilih Jabatan --</option>
                        <?php foreach ($jabatan as $jbt) : ?>
                            <option value="<?= $jbt->n_jab ?>"><?= $jbt->n_jab ?></option>
                        <?php endforeach ?>
                    </select>
                    <?= form_error('jabatan', '<div class="text-danger text-small ml-2">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Masuk</label>
                    <input type="date" class="form-control" name="tgl_masuk" placeholder="Masukkan Nama Pegawai">
                    <?= form_error('tgl_masuk', '<div class="text-danger text-small ml-2">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" class="form-control">
                        <option value="">-- Pilih Status --</option>
                        <option value="Pegawai Tetap">Pegawai Tetap</option>
                        <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
                    </select>
                    <?= form_error('status', '<div class="text-danger text-small ml-2">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" class="form-control" name="foto">
                </div>
                <div class="form-group">
                    <label for="">Hak Akses</label>
                    <select name="hak_akses" class="form-control">
                        <option value="">-- Pilih Hak Akses</option>
                        <option value="1">Admin</option>
                        <option value="2">Pegawai</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Simpan</button>
            </form>
        </div>
    </div>
</div>