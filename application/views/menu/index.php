        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

          <div class="row">
              <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>')?>
              <?=$this->session->flashdata('message')?>
          </div>

          <a href="" class="btn btn-primary" data-toggle="modal" data-target="#MenuModal">Add New Menu</a>

        <div class="row mt-3">
            <div class="col-lg-6">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?> 
                        <?php foreach($menu as $m): ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $m['menu'] ?></td>
                            <td>
                                <a href="<?=base_url('menu/edit')?>" class="badge badge-success">Edit</a>
                                <a href="<?=base_url('menu/delete/' . $m['id'])?>" class="badge badge-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->






      <!--Modal-->

      <div class="modal fade" id="MenuModal" tabindex="-1" role="dialog" aria-labelledby="MenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="MenuModalLabel">Add New Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('menu')?>" method="post">
        <div class="form-group">
            <label for="menu">Nama Menu</label>
            <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama Menu...">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="sumbit" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>