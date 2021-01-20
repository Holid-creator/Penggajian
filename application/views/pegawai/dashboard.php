<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
    <div class="alert alert-success font-weight-bold" style="width:50%">Selamat Datang Anda Login Sebagai Pegawai</div>
    <div class="card" style="width: 50%;">
        <div class="card-header font-weight-bold text-white bg-primary">
            Data Pegawai
        </div>
        <?php foreach ($pegawai as $pg) : ?>
            <div class="body">
                <div class="row">
                    <div class="col-md-5">
                        <img src="<?= base_url('assets/foto/' . $pg->foto) ?>" width="200px" class="m-2">
                    </div>
                    <div class="col-md-7">
                        <table class="table">
                            <tr>
                                <td>Nama Pegawai</td>
                                <td>:</td>
                                <td><?= $pg->n_peg ?></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td>:</td>
                                <td><?= $pg->n_jab ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Masuk</td>
                                <td>:</td>
                                <td><?= date('d F Y', strtotime($pg->tgl_masuk)) ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><?= $pg->status ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>