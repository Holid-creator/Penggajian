<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <a href="<?= base_url('admin/pegawai/tambah_data') ?>" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Tambah Data Pegawai</a>

    <table class="table table-bordered table-hover table-striped mt-3" style="margin-bottom: 70px;">
        <tr class="text-center">
            <th>No</th>
            <th>NIK</th>
            <th>Nama Pegawai</th>
            <th>Jenis Kelamin</th>
            <th>Jabatan</th>
            <th>Tanggal Masuk</th>
            <th>Status</th>
            <th>Foto</th>
            <th>Hak Akses</th>
            <th>Action</th>
        </tr>
        <?php
        $no = 1;
        foreach ($pegawai as $pg) :
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $pg->nik ?></td>
                <td><?= $pg->n_peg ?></td>
                <td><?= $pg->jk ?></td>
                <td><?= $pg->n_jab ?></td>
                <td><?= date('d M Y', strtotime($pg->tgl_masuk)) ?></td>
                <td><?= $pg->status ?></td>
                <td><img src="<?= base_url('assets/foto/') . $pg->foto ?>" width="75px"></td>
                <?php if ($pg->hak_akses == '1') { ?>
                    <td>Admin</td>
                <?php } else { ?>
                    <td>Pegawai</td>
                <?php } ?>
                <td>
                    <center>
                        <a href=" <?= base_url('admin/pegawai/update_data/' . $pg->id_peg) ?>" class="btn btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Apakan Anda Yakin Ingin Menghapusnya')" href="<?= base_url('admin/pegawai/delete_data/' . $pg->id_peg) ?>" class="btn btn-danger" title="Hapus"><i class="fas fa-trash"></i></a>
                    </center>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>