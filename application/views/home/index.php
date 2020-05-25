<section id="jubotrron">
  <div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
      <a href="<?=base_url();?>"><img src="<?=base_url();?>asset/img/untitled.png" width="200" class="rounded-circle img-thumbnail"></a>
      <h1 class="display-4">Teknik Komputer Jaringan</h1>
      <p class="lead">Welcome To WEB TKJ.</p>
    </div>
  </div>
</section>

<section id="aboutUs">
    <div class="container mb-5">
        <h1 class="text-center">About US</h1>
        <div class="row">
          <div class="col">
            <h5>Jurusan Kami adalah jurusan yang mempelajari tentang berbagai macam jaringan dan komponen komputer.kita juga belajar tentang beberapa bahasa pemrograman seperti HTML,PHP,CSS,dan JavaScript
            </h5> 
          </div>  
        </div>
    </div>
</section>



<section class="bg-light" id="portofolio">
    <div class="container mb-5">
      <div class="row justify-content-center mb-3">
        <h1>Portofolio</h1>
      </div>
      <div class="row justify-content-center mb-3">
          <img class="img-thumbnail" id="slide" width="500" src="<?=base_url();?>asset/img/kelas/1.jpeg">
      </div>  
        <div class="row">
          <?php for ($i=1; $i<29 ; $i++) :?> 
            <div class="col-3 mb-3">
            <div class="card">
              <a href="<?=base_url();?>" data-toggle="modal" data-target="#portofolioModal">
                <img src="<?=base_url();?>asset/img/kelas/<?=$i;?>.jpeg" data-id="<?=$i;?>" class="card-img-top portofolio">
              </a>
            </div>
          </div>  
          <?php endfor; ?>
        </div>
    </div>
</section>
















<!--Porofolio Modal-->
<div class="modal fade" id="portofolioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Portofolio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-4"><img src="<?=base_url();?>asset/img/kelas/1.jpeg" class="data-portofolio img-fluid"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>