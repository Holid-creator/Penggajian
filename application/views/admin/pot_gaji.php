<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <a href="<?= base_url('admin/pot_gaji/tambah') ?>" class="btn btn-success mb-2"><i class="fas fa-plus mr-1"></i>Tambah</a>
    <table class="table table-bordered table-hover table-striped">
        <tr class="text-center">
            <th>No</th>
            <th>Jenis Potongan</th>
            <th>Jumlah Potongan</th>
            <th>Action</th>
        </tr>
        <?php
        $no = 1;
        foreach ($pot_gaji as $pg) :
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $pg->potongan ?></td>
                <td>Rp. <?= number_format($pg->jml_pot, 0, ',', '.') ?></td>
                <td>
                    <center>
                        <a href="<?= base_url('admin/pot_gaji/update/' . $pg->id) ?>" class="btn btn-success"><i class="fas fa-edit mr-1"></i>Ubah</a>
                        <a onclick="return confirm('Yakin Ingin Menghapusnya')" href="<?= base_url('admin/pot_gaji/delete_data/' . $pg->id) ?>" class="btn btn-danger"><i class="fas fa-trash mr-1"></i>Hapus</a>
                    </center>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>