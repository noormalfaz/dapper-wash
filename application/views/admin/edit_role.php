<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header">
                    <h1 class="h3 mb-0 font-weight-bold text-dark text-center"><?= $title; ?></h1>
                </div>
                <div class="card card-body">
                    <form action="" method="post">
                        <div class="form-group row">
                            <input type="hidden" name="id_user_role" value="<?= $role['id_user_role']; ?>">
                            <label for="role" class="col-sm-2 mt-0 mt-lg-2 font-weight-bold text-dark">Role</label>
                            <div class="col-sm-10">
                                <input type="text" name="role" id="role" class="form-control" value="<?= $role['role']; ?>">
                                <?= form_error("role", '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="ml-0 btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>