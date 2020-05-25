        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

        <div class="row">
          <div class="col-lg-8">
            <?= $this->session->flashdata('message') ?>
            <form action="<?= base_url('user/changePassword') ?>" method="post">
                      <div class="form-group row">
                          <label for="oldPassword" class="col-sm-3 col-form-label">Old Password</label>
                          <div class="col-sm-8">
                            <input type="password" class="form-control" id="oldPassword" name="oldPassword">
                            <?= form_error('oldPassword', '<small class="text-danger pl-3">', '</small>')?>
                        </div>
                      </div>

                      <div class="form-group row">
                          <label for="password1" class="col-sm-3 col-form-label">New Password</label>
                          <div class="col-sm-8">
                            <input type="password" class="form-control" id="password1" name="password1">
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>')?>
                        </div>
                      </div>

                      <div class="form-group row">
                          <label for="password2" class="col-sm-3 col-form-label">Confirm Pawword</label>
                          <div class="col-sm-8">
                            <input type="password" class="form-control" id="password2" name="password2">
                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>')?>
                        </div>
                      </div>

                      <button type="submit" class="btn btn-primary" >Change</button>
            </form>
          </div>
        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

