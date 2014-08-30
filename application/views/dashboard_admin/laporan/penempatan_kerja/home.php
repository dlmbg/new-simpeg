
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
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/colorbox/colorbox.css" />
	<script src="<?php echo base_url(); ?>asset/colorbox/jquery.colorbox.js"></script>
	<script>
		  $(document).ready(function(){
			  //Examples of how to assign the ColorBox event to elements
			  $(".medium-box").colorbox({rel:'group', iframe:true, width:"90%", height:"90%"});
	
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

  <div class="well">
	<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Laporan Pegawai - Penempatan Kerja</a>
		<div class="span6 pull-right">
		<?php
			echo form_open("laporan_pegawai_penempatan_kerja/set",'class="navbar-form pull-right"');
		?>
			<div class="span2"><strong>Lokasi Kerja</strong></div>
			<div class="span">:</div>
			<div class="span3">
			<select class="span3" name="id_lokasi_kerja">
			<option value="">- Lokasi Kerja -</option>
			  	<?php
			  		foreach($mst_lokasi_kerja->result_array() as $muk)
			  		{
			  			if($this->session->userdata('id_lokasi_kerja')==$muk['id_lokasi_kerja'])
			  			{
			  	?>
			  		<option value="<?php echo $muk['id_lokasi_kerja']; ?>" selected="selected"><?php echo $muk['lokasi_kerja']; ?></option>
			  	<?php
			  			}
			  			else
			  			{
			  	?>
			  		<option value="<?php echo $muk['id_lokasi_kerja']; ?>"><?php echo $muk['lokasi_kerja']; ?></option>
			  	<?php
			  			}
			  		}
			  	?>
			</select>
			</div>
			
			<div class="span2"><strong>Satuan Kerja</strong></div>
			<div class="span">:</div>
			<div class="span3">
			<select class="span3" name="id_satuan_kerja">
			<option value="">- Satuan Kerja -</option>
			<?php
			if($this->session->userdata('id_satuan_kerja')=="Semua")
			{
			?>
				<option value="Semua" selected="selected">Semua Satuan Kerja</option>
			<?php
			}
			else
			{
			?>
				<option value="Semua">Semua Satuan Kerja</option>
			<?php
			}
			  		foreach($mst_satuan_kerja->result_array() as $msk)
			  		{
			  			if($this->session->userdata('id_satuan_kerja')==$msk['id_satuan_kerja'])
			  			{
			  	?>
			  		<option value="<?php echo $msk['id_satuan_kerja']; ?>" selected="selected"><?php echo $msk['nama_satuan_kerja']; ?></option>
			  	<?php
			  			}
			  			else
			  			{
			  	?>
			  		<option value="<?php echo $msk['id_satuan_kerja']; ?>"><?php echo $msk['nama_satuan_kerja']; ?></option>
			  	<?php
			  			}
			  		}
			  	?>
			</select>
		</div>
		<div class="span4 pull-right">
  		<a class="btn" href="<?php echo base_url(); ?>laporan_pegawai_penempatan_kerja/export"><i class="icon-ok-circle"></i> Export ke Excell</a>
		  <button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i> Cari Data Laporan</button>
		</div>
		<?php echo form_close(); ?>
		</div>
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	
	  <section>
  <table class="table table-hover table-condensed">
    <thead>
      <tr>
        <th>No.</th>
        <th>NIP</th>
        <th>Nama Pegawai</th>
        <th>Tempat/Tanggal Lahir</th>
		<th>Gender</th>
		<th>Agama</th>
		<th>Usia</th>
      </tr>
    </thead>
    <tbody>
	<?php
		$no=1;
		foreach($data_pegawai->result_array() as $dp)
		{
	?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $dp['nip']; ?></td>
        <td><?php echo $dp['nama_pegawai']; ?></td>
        <td><?php echo $dp['tempat_lahir'].' - '.$dp['tanggal_lahir']; ?></td>
        <td><?php echo $dp['jenis_kelamin']; ?></td>
        <td><?php echo $dp['agama']; ?></td>
        <td><?php echo $dp['usia']; ?></td>
      </tr>
	 <?php
	 		$no++;
	 	}
	 ?>
    </tbody>
  </table>
	
  

</section>
  </div>


      <footer class="well">
        <p><?php echo $credit; ?></p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
