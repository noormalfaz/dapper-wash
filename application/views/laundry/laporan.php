<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="icon" href="<?= base_url(); ?>assets/img/IconWeb.png" />
    <style>
        * {
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.5;
        }

        .papisah {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div align="center">
        <img src="<?= base_url(); ?>assets/img/Logo.png" width="100px">
    </div>
    <div>
        <div align="center">
            <h3>Laporan Laundry Dapper Wash</h3>
        </div>
        <div align="center">
            <?= $waktu;?>
        </div>
        <br>
    </div>
    <hr>
    <table width="100%" border="1" cellpadding="5px" cellspacing="0px">
        <tr align="center">
            <td><b>Tanggal Masuk</b></td>
            <td><b>Kode Transaksi</b></td>
            <td><b>Konsumen</b></td>
            <td><b>Paket</b></td>
            <td><b>Berat (Kg)</b></td>
            <td><b>Total</b></td>
            <td><b>Tanggal Ambil</b></td>
            <td><b>Status</b></td>
        </tr>
        <?php
        foreach ($transaksi as $t) : ?>
            <tr>
                <td><?= $t["tgl_masuk"]; ?></td>
                <td><?= $t["kode"]; ?></td>
                <td><?= $t["nama"]; ?></td>
                <td>
                    <?php $data = $this->db->get_where('paket', ['id_paket' => $t["paket_id"]])->row_array(); ?>
                    <?= $data["nama"]; ?>
                </td>
                <td><?= $t["berat"]; ?></td>
                <td><?= rupiah($t["total"]); ?></td>
                <td><?= $t["tgl_ambil"]; ?></td>
                <td>
                    <?php if ($t["status"] == 0) : ?>
                        <div>Open</div>
                    <?php elseif ($t["status"] == 1) : ?>
                        <div>On Proses</div>
                    <?php elseif ($t["status"] == 2) : ?>
                        <div>Closed</div>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>