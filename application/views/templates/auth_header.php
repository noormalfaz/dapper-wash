<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
    <link rel="icon" href="<?= base_url(); ?>assets/img/IconWeb.png" />
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .bg-img {
            background-image: url("https://i.pinimg.com/564x/d6/a0/fa/d6a0fa4ea92ca69226c2a9e432cce62b.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <div class="error-data" data-error="<?= $this->session->flashdata("error"); ?>"></div>
    <div class="success-data" data-success="<?= $this->session->flashdata("success"); ?>"></div>