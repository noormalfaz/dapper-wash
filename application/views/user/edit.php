<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header">
                    <div class="h4 mb-0 font-weight-bold text-dark text-center"><?= $title; ?></div>
                </div>
                <div class="card-body">
                    <?= form_open_multipart("user/edit"); ?>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 font-weight-bold text-dark">Email</label>
                        <div class="col-sm-9">
                            <input type="text" name="email" id="email" class="form-control" value="<?= $user['email']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 font-weight-bold text-dark">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" id="name" class="form-control" value="<?= $user['name']; ?>">
                            <?= form_error("name", '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 font-weight-bold text-dark">Gambar</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url("assets/img/profile/") . $user["image"]; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" name="image" id="image" class="custom-file-input">
                                        <label for="image" class="custom-file-label">Choose File</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>

