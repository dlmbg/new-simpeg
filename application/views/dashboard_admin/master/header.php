
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $judul_lengkap.' - '.$instansi; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/docs.css" rel="stylesheet">
	
    <script src="<?php echo base_url(); ?>asset/js/jquery-1.8.0.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/application.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-tooltip.js"></script>
	<link href="<?php echo base_url(); ?>asset/css/chosen.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/colorbox/colorbox.css" />
	<script src="<?php echo base_url(); ?>asset/colorbox/jquery.colorbox.js"></script>
	<script>
		  $(document).ready(function(){
			  //Examples of how to assign the ColorBox event to elements
			  $(".medium-box").colorbox({rel:'group', iframe:true, width:"900px", height:"90%"});
	
		  });
	</script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <?php echo menu(); ?>
    </div>
	
    <div class="container">
	
	<div class="well">
	  <div class="row">
		<div class="span">
		  <h3><?php echo $judul_lengkap.' '.$instansi; ?></h3>
		  <p><?php echo $alamat; ?></p>
		</div>
	  </div>
	</div>
	
	<header class="jumbotron subhead" id="overview">
	  <div class="subnav">
		<ul class="nav nav-pills">
		  <li><a href="<?php echo base_url(); ?>pegawai/edit/<?php echo $this->session->userdata("kode_pegawai"); ?>">Pegawai</a></li>
		  <li><a href="<?php echo base_url(); ?>data_keluarga/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">Keluarga</a></li>
		  <li><a href="<?php echo base_url(); ?>data_riwayat_pangkat/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">Riwayat Pangkat</a></li>
		  <li><a href="<?php echo base_url(); ?>data_riwayat_jabatan/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">Riwayat Jabatan</a></li>
		  <li><a href="<?php echo base_url(); ?>data_pendidikan/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">Pendidikan</a></li>
		  <li><a href="<?php echo base_url(); ?>data_pelatihan/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">Pelatihan</a></li>
		  <li><a href="<?php echo base_url(); ?>data_penghargaan/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">Penghargaan</a></li>
		  <li><a href="<?php echo base_url(); ?>data_seminar/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">Seminar</a></li>
		  <li><a href="<?php echo base_url(); ?>data_organisasi/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">Organisasi</a></li>
		  <li><a href="<?php echo base_url(); ?>data_gaji_pokok/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">Gaji Pokok</a></li>
		  <li><a href="<?php echo base_url(); ?>data_hukuman/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">Hukuman</a></li>
		  <li><a href="<?php echo base_url(); ?>data_dp3/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">DP3</a></li>
		</ul>
	  </div>
	</header>

