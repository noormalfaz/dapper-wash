<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-7">
            <div class="card shadow">
                <div class="card-header">
                    <div class="h4 mb-0 font-weight-bold text-dark text-center"><?= $title; ?></div>
                </div>
                <div class="card-body">
                    <div class="row no-qutters">
                        <div class="col-md-4">
                            <img src="<?= base_url().'assets/img/profile/'.$user['image'];?>" alt="" class="card-image img-fluid">
                        </div>
                        <div class="col-md-8 my-auto">
                            <div class="card-body text-center">
                                <h5 class="card-title font-weight-bold text-dark mb-2"><?= $user["name"];?></h5>
                                <p class="card-text mb-0"><?= $user["email"];?></p>
                                <p class="card-text"><small class="text-muted">Bergabung Sejak <?= date('d F Y',$user["date_created"]);?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
            