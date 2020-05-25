        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

            <div class="row">
                <div class="col-lg-8">
                <?php if(validation_errors()): ?>
                  <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                  </div>
                <?php endif; ?>

                    <?= form_open_multipart('user/edit'); ?>
                      <div class="form-group row">
                          <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>" readonly>
                        </div>
                      </div>

                      <div class="form-group row">
                          <label for="quotes" class="col-sm-2 col-form-label">Quotes</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="quotes" name="quotes" value="<?= $user['quotes'] ?>">
                            <?= form_error('quotes', '<small class="text-danger pl-3">', '</small>')?>
                        </div>
                      </div>
                      <div class="form-group row">
                          <label for="ttl" class="col-sm-2 col-form-label">Tempat Tanggal Lahir</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="ttl" name="ttl" value="<?= $user['ttl'] ?>">
                            <?= form_error('ttl', '<small class="text-danger pl-3">', '</small>')?>
                        </div>
                      </div>

                      <div class="form-group row">
                          <div class="col-sm-2">Gambar</div>
                          <div class="col-sm-10">
                            <div class="row">
                              <div class="col-sm-3">
                                <img src="<?= base_url('asset/img/'). $user['gambar'] ?>" class="img-thumbnail">
                              </div>
                              <div class="com-sm-9">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                  <label class="custom-file-label" for="gambar">Choose file</label>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>

                      <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                      </div>
                        
                    </form>


                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

