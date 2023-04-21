<?php
$paket = $this->db->get_where("paket", ["id_paket" => $transaksi["paket_id"]])->row_array();
?>
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
            align-items: baseline;
        }

        .papisah1 {
            display: flex;
            justify-content: space-between;
        }

        .papisah2 {
            display: flex;
        }
    </style>
</head>

<body>
    <div class="papisah1">
        <div class="papisah2">
            <div style="margin-right: 20px;">
                <img src="<?= base_url(); ?>assets/img/Logo.png" height="150px">
            </div>
            <div>
                <h3>Dapper Wash</h3>
                <div>Noor Mohamad Alfaz</div>
                <div>082129530705</div>
                <div>noormzzz07@gmail.com</div>
            </div>
        </div>
        <div>
            <h3>Invoice</h3>
        </div>
    </div>
    <hr>
    <br>
    <div class="papisah">
        <table>
            <tr>
                <td width="100"><b>Customer</b></td>
                <td>:</td>
                <td><?= $transaksi["nama"]; ?></td>
            </tr>
            <tr>
                <td width="100"><b>Status</b></td>
                <td>:</td>
                <td><?php if ($transaksi["status"] == 0) : ?>
                        <div>Open</div>
                    <?php elseif ($transaksi["status"] == 1) : ?>
                        <div>Sedang Diproses</div>
                    <?php elseif ($transaksi["status"] == 2) : ?>
                        <div>Lunas</div>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td width="100"><b>Kode Transaksi</b></td>
                <td>:</td>
                <td><?= $transaksi["kode"]; ?></td>
            </tr>
            <tr>
                <td width="150"><b>Tanggal Masuk</b></td>
                <td>:</td>
                <td><?= DateToIndo($transaksi["tgl_masuk"]); ?></td>
            </tr>
            <tr>
                <td width="150"><b>Tanggal Ambil</b></td>
                <td>:</td>
                <td><?= DateToIndo($transaksi["tgl_ambil"]); ?></td>
            </tr>
        </table>
    </div>
    <br>
    <table width="100%" border="1" cellpadding="5px" cellspacing="0px">
        <tr align="center">
            <td><b>Paket</b></td>
            <td><b>Berat/Kg</b></td>
            <td><b>Harga</b></td>
            <td><b>Sub Total</b></td>
        </tr>
        <tr>
            <td><?= $paket["nama"]; ?></td>
            <td><?= $transaksi["berat"]; ?></td>
            <td><?= rupiah($paket["harga"]); ?></td>
            <td><?= rupiah($transaksi["total"]); ?></td>
        </tr>
        <tr>
            <td colspan="3" align="right"><b>Total</b></td>
            <td><?= rupiah($transaksi["total"]); ?></td>
        </tr>
    </table>
    <br>
    <div><b>Keterangan</b></div>
    <ol>
        <li>Pengambilan cucian harus membawa nota.</li>
        <li>Hitung dan periksa sebelum pergi.</li>
        <li>Klaim kekurangan/kehilangan cucian.</li>
    </ol>
    <table width="100%">
        <tr>
            <td width="70%">

            </td>
            <td>
                <center>
                    <div>Tertanda</div>
                    <br>
                    <br>
                    <br>
                    <div>
                        <?php $nama = $this->db->get_where("user", ["id_user" => $transaksi["user_id"]])->row_array(); ?>
                        <?= $nama["name"]; ?>
                    </div>
                </center>
            </td>
        </tr>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>