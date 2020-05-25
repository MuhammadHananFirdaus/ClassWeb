        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

          <div class="row">
             <?php if(validation_errors()): ?>
              <div class="alert alert-danger" role="alert">
                <?= validation_errors() ?>
              </div>
             <?php endif; ?>
              <?=$this->session->flashdata('message')?>
          </div>

          <a href="" class="btn btn-primary" data-toggle="modal" data-target="#MenuModal">Add New SubMenu</a>

        <div class="row mt-3">
            <div class="col-lg">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">icon</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?> 
                        <?php foreach($subMenu as $sm): ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $sm['judul'] ?></td>
                            <td><?= $sm['menu'] ?></td>
                            <td><?= $sm['url'] ?></td>
                            <td><?= $sm['icon'] ?></td>
                            <td>
                                <a href="<?=base_url('Menu/edit')?>" class="badge badge-success">Edit</a>
                                <a href="<?=base_url('Menu/deleteSm/' . $sm['id'])?>" class="badge badge-danger">Delete</a>
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
        <h5 class="modal-title" id="MenuModalLabel">Add New SubMenu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('menu/subMenu')?>" method="post">
        <div class="form-group">
            <label for="judul">Nama SubMenu</label>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Nama SubMenu...">
        </div>
        
        <div class="form-group">
            <select name="menu_id" id="menu_id" class="form-control">
                <option value=""">Select Menu</option>
                <?php foreach($menu as $m) : ?>
                <option value="<?= $m['id'] ?>"> <?= $m['menu'] ?></option>
                <?php endforeach; ?>>
            </select>
        </div>
        <div class="form-group">
            <label for="url">Nama url</label>
            <input type="text" class="form-control" id="url" name="url" placeholder="Nama URL...">
        </div>
        
        <div class="form-group">
            <label for="icon">Nama Icon</label>
            <input type="text" class="form-control" id="icon" name="icon" placeholder="Nama icon...">
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