<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <a href="<?= base_url('admin/jabatan/tambah_data') ?>" class="btn btn-success mb-3"><i class="fas fa-plus mr-2"></i>Tambah Jabatan</a>
    <?= $this->session->flashdata('pesan') ?>
    <table class="table table-bordered table-striped table-hover mt-2">
        <tr class="text-center">
            <th width="20px">NO</th>
            <th>Nama Jabatan</th>
            <th>Gaji Pokok</th>
            <th>Tj. Transport</th>
            <th>Uang Makan</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <?php
        $no = 1;
        foreach ($jabatan as $jbt) :
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $jbt->n_jab ?></td>
                <td>Rp. <?= number_format($jbt->gaji_pokok, 0, ',', '.') ?></td>
                <td>Rp. <?= number_format($jbt->transport, 0, ',', '.') ?></td>
                <td>Rp. <?= number_format($jbt->uang_makan, 0, ',', '.') ?></td>
                <td>Rp. <?= number_format($jbt->gaji_pokok + $jbt->transport + $jbt->uang_makan, 0, ',', '.') ?></td>
                <td>
                    <center>
                        <a href="<?= base_url('admin/jabatan/update_data/' . $jbt->id_jab) ?>" class="btn btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Apakan Anda Yakin Ingin Menghapusnya')" href="<?= base_url('admin/jabatan/delete_data/' . $jbt->id_jab) ?>" class="btn btn-danger" title="Hapus"><i class="fas fa-trash"></i></a>
                    </center>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>