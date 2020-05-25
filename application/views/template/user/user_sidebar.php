 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url()?>">
  <div class="sidebar-brand-icon">
      <i class="fas fa-network-wired"></i>
  </div>
  <div class="sidebar-brand-text mx-3">TKJ</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item">
    <a class="nav-link" href="<?=base_url()?>">
    <i class="fas fa-home"></i>
    <span>Back To Home</span></a>
</li>

<!-- QueryMenu -->
<?php
  $roleId =$this->session->userdata('role_id');
  $queryMenu = "SELECT `user_menu`.`id`, `menu`
                FROM `user_menu` JOIN `user_menu_access`
                ON `user_menu`.`id` = `user_menu_access`.`menu_id`
                WHERE `user_menu_access`.`role_id` = $roleId
                ORDER BY `user_menu_access`.`menu_id` ASC";
  $menu = $this->db->query($queryMenu)->result_array();
?>


<!-- LoopingHeading -->
<?php foreach($menu as $m) : ?>
<div class="sidebar-heading">
  <?= $m['menu']; ?>
</div>

<!-- Query SubMenu -->
<?php
$querySubMenu = "SELECT * FROM `user_sub_menu`
                 WHERE `menu_id` = {$m['id']}
                 ";
$subMenu=$this->db->query($querySubMenu)->result_array();
?>

<!-- Looping SubMenu -->

    <?php foreach($subMenu as $sm) : 
      if ($title == $sm['judul']) : ?>
      <li class="nav-item active">
      <?php else : ?>
      <li class="nav-item">
      <?php endif; ?>
        <a class="nav-link" href="<?=base_url($sm['url'])?>">
          <i class="<?= $sm['icon'] ?>"></i>
          <span><?= $sm['judul'] ?></span></a>
      </li>
    <?php endforeach; ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

<?php endforeach; ?>

 <!-- Logout -->
<li class="nav-item">
  <a class="nav-link" href="<?=base_url('auth/logout')?>">
  <i class="fas fa-fw fa-sign-out-alt"></i>
    <span>Logout</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->