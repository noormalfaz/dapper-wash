<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-6 bg-gradient-info vh-100">
            <div class="row justify-content-center align-items-center text-white vh-100">
                <div class="col-lg-7 col-md-8 col-11">
                    <div class="text-center">
                        <img src="<?= base_url(); ?>assets/img/Logo.png" alt="" class="" width="200px">
                        <h3 class="text-center fw-bold mb-0">Selamat Datang</h3>
                        <p>Di Laundry Dapper Wash</p>
                    </div>
                    <form class="mb-3" action="<?= base_url(); ?>auth" method="POST">
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Alamat Email..." value="<?= set_value('email'); ?>">
                            <?= form_error("email", '<small class="text-warning">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <?= form_error("password", '<small class="text-warning">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            Masuk
                        </button>
                    </form>
                    <div class="text-center">
                        <span class="small text-white">Lupa Password?</span>
                        <a class="small text-white" href="<?= base_url(); ?>auth/forgotpassword">Klik Disini</a>
                    </div>
                    <div class="text-center">
                        <span class="small text-white">Belum Punya Akun?</span>
                        <a class="small text-white" href="<?= base_url(); ?>auth/registration">Ayo Daftar!</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 bg-img vh-100 d-lg-block d-none"></div>
    </div>
</div>