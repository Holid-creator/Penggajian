<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: black;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <center>
        <h1>HOLID DIGITAL PRINTING</h1>
        <h2>Slip Gaji Pegawai</h2>
        <hr width="80%" style="border: 2px solid #f0f0f0;">
    </center>

    <div style="margin:10px">

        <table class="col-md-3 mb-3">
            <?php foreach ($cetakSlip as $cs) : ?>
                <tr>
                    <td class="font-weight-bold" width="150px">NIK</td>
                    <td>:</td>
                    <td><?= $cs->nik ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="150px">Nama Karyawan</td>
                    <td>:</td>
                    <td><?= $cs->n_peg ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="150px">Jabatan</td>
                    <td>:</td>
                    <td><?= $cs->n_jab ?></td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td class="font-weight-bold">Bulan</td>
                <td>:</td>
                <td><?= substr($cs->bulan, 0, 2) ?></td>
            </tr>
            <tr>
                <td class="font-weight-bold">Tahun</td>
                <td>:</td>
                <td><?= substr($cs->bulan, 2, 4) ?></td>
            </tr>
        </table>

        <table class="table table-striped table-hover table-bordered">
            <tr class="text-center">
                <th width="50px">No</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
            </tr>
            <?php
            foreach ($potongan as $pt) {
                $alpha = $pt->jml_pot;
            }
            ?>
            <?php
            foreach ($cetakSlip as $cl) :
            ?>
                <?php $potongan = $cl->alpha * $alpha ?>
                <tr>
                    <td>1</td>
                    <td>Gaji Pokok</td>
                    <td>Rp. <?= number_format($cl->gaji_pokok, 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Tunjangan Transportasi</td>
                    <td>Rp. <?= number_format($cl->transport, 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Uang Makan</td>
                    <td>Rp. <?= number_format($cl->uang_makan, 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Potongan</td>
                    <td>Rp. <?= number_format($potongan, 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <th colspan="2" class="text-center">Total Gaji</th>
                    <th>Rp. <?= number_format($cl->gaji_pokok + $cl->transport + $cl->uang_makan - $potongan, 0, ',', '.') ?></th>
                </tr>
            <?php endforeach ?>
        </table>
        <table width="100%">
            <tr>
                <td><?= anchor('admin/slip_gaji', '<div class="btn btn-primary">Kembali ke Slip Gaji</div>') ?></td>
                <td width="200px">
                    <p>Bogor, <?= date('d M Y') ?> <br> Finance</p><br><br>
                    <p>________________</p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>

<!-- <script>
    window.print();
</script> -->