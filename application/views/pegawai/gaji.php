<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>Bulan/ Tahun</th>
            <th>Gaji Pokok</th>
            <th>Tj. Transportasi</th>
            <th>Uang Makan</th>
            <th>Potongan</th>
            <th>Total Gaji</th>
            <th>Cetak Slip</th>
        </tr>
        <?php
        foreach ($potongan as $pt) {
            $alpha = $pt->jml_pot;
        }
        ?>
        <?php foreach ($gaji as $gj) : ?>
            <?php $pot_gaji = $gj->alpha * $alpha ?>
            <tr>
                <td><?= $gj->bulan ?></td>
                <td>Rp. <?= number_format($gj->gaji_pokok, 0, ',', '.') ?></td>
                <td>Rp. <?= number_format($gj->transport, 0, ',', '.') ?></td>
                <td>Rp. <?= number_format($gj->uang_makan, 0, ',', '.') ?></td>
                <td>Rp. <?= number_format($pot_gaji, 0, ',', '.') ?></td>
                <td>Rp. <?= number_format($gj->gaji_pokok + $gj->transport + $gj->uang_makan - $pot_gaji, 0, ',', '.') ?></td>
                <td>
                    <center>
                        <a href="<?= base_url('pegawai/gaji/cetak/' . $gj->id_hdr) ?>" class="btn btn-sm btn-primary"><i class="fas fa-print"></i></a>
                    </center>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>