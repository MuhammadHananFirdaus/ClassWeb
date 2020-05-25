<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= $judul;?></title>
    <link rel="shortcut icon" href="<?=base_url();?>asset/img/untitled.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <img src="<?=base_url('asset/img/Untitled')?>.png" class="rounded-circle mr-3" width="40">
      <a class="navbar-brand" href="<?=base_url();?>">TKJ</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <?php if ($judul == 'Home') :?>
          <li class="nav-item active">
            <a class="nav-link" href="<?=base_url()?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('siswa')?>">Daftar Murid</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('user')?>">My Profile</a>
          </li>
          <?php elseif($judul == 'Daftar Murid') : ?>
            <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>">Home</a>
          </li>
          <li class="nav-item  active">
            <a class="nav-link" href="<?=base_url('siswa')?>">Daftar Murid</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('user')?>">My Profile</a>
          </li>
          <?php else : ?>
            <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('siswa')?>">Daftar Murid</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?=base_url('user')?>">My Profile</a>
          </li>
          <?php endif;?>
        </ul>
        <?php if(!$this->session->userdata('nama')) : ?>
          <a href="<?=base_url('auth')?>" class="text-light btn btn-outline-success my-2 my-sm-0">Login</a>
          <?php else : ?>
            <a href="<?=base_url('auth/logout')?>" class="text-light btn btn-outline-success my-2 my-sm-0">Logout</a>
        <?php endif; ?>    
      </div>
    </div>
  </nav>