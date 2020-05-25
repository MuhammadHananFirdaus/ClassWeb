<div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
            <h1>Daftar Murid</h1>
      </div>
   </div>
  </div>
<div class="container mb-3">
  <div class="row">
  <div class="col-lg-6">
    <ul class="list-group">
    <?php 
    $i = 1;
    foreach ($muridList as $murid) :?>
        <li class="list-group-item bg-light"> 
          <?=$i.'.'?>
          <?=$murid['nama']?>
          <a href="<?=base_url()?>siswa/detail/<?=$murid['id']?>" class="badge badge-primary badge-pill float-right detailMurid" data-toggle="modal" data-target="#DetailModal" data-id=<?=$murid['id']?>>detail</a>
        </li>

      <?php 
      $i++;
      endforeach;?>
      </ul>
    </div>
  </div>
</div>









<!-- 
<!-- Form Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="Judul Modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url();?>siswa/tambah" method="POST">

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="nama" class="form-control" id="nama" name="nama">
        </div>
        <div class="form-group">
            <label for="ttl">Tempat Tanggal Lahir</label>
            <input type="ttl" class="form-control" id="ttl" name="ttl">
        </div>
        <div class="form-group">
            <label for="quotes">quotes</label>
            <input type="quotes" autocomplete="off" class="form-control" id="quotes" name="quotes">
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="gambar" class="form-control" id="gambar" name="gambar">
        </div>
      
        

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- DetailModal -->
<div class="modal fade" id="DetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Detail Murid</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4"><img src="" class="gambarDetail img-fluid"></div>
            <div class="col-md-8 text-center">
              <ul class="list-group">
                <li class="list-group-item "><h1 class="nama"></h1></li>
                <li class="list-group-item ttl text-muted">
                <li class="list-group-item">"<span><i class="quotes"></i></span>"</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>