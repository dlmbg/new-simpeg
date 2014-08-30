
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/docs.css" rel="stylesheet">
	<style>
		body{
			margin:20px;
			}
	</style>
	
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/application.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-tooltip.js"></script>
  </head>

  <body>
	<div class="well">
	<?php echo $this->session->flashdata('pass'); ?>
	<?php if(validation_errors()) { ?>
	<div class="alert alert-block">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  	<h4>Terjadi Kesalahan!</h4>
		<?php echo validation_errors(); ?>
	</div>
	<?php } ?>
		<?php echo form_open('manage_user/simpan','class="form-horizontal"'); ?>
		  <div class="control-group">
		  	<legend>Manajemen User</legend>
			<label class="control-label" for="nama_unit_kerja">Nama Pengguna</label>
			<div class="controls">
			  <input type="text" class="span" name="nama_lengkap" id="nama_lengkap" value="<?php echo $nama_lengkap; ?>" placeholder="Nama Pengguna">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="eselon">Username</label>
			<div class="controls">
			  <input type="text" class="span" name="username" id="username" value="<?php echo $username; ?>" <?php if($st=="edit"){ echo 'readonly="true"'; } ?> placeholder="Username">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="parent_unit">Password</label>
			<div class="controls">
			  <input type="password" class="span" name="password" id="password" placeholder="Password">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="parent_unit">Unit Kerja</label>
			<div class="controls">
			  <select data-placeholder="Unit Kerja" class="chzn-select" style="width:100%;" tabindex="2" name="id_unit_kerja" id="id_unit_kerja">
				<option value=""></option>
				<?php
					$selected = '';
					if($id_unit_kerja == '0')
					{
						$selected = 'selected';
					}
				?>
				<option value="0" <?php echo $selected; ?>>Administrator</option>
				  	<?php
				  		foreach($mst_unit_kerja->result_array() as $muk)
				  		{
				  			if($id_unit_kerja==$muk['id_unit_kerja'])
				  			{
				  	?>
				  		<option value="<?php echo $muk['id_unit_kerja']; ?>" selected="selected"><?php echo $muk['nama_unit_kerja']; ?></option>
				  	<?php
				  			}
				  			else
				  			{
				  	?>
				  		<option value="<?php echo $muk['id_unit_kerja']; ?>"><?php echo $muk['nama_unit_kerja']; ?></option>
				  	<?php
				  			}
				  		}
				  	?>
			</select>
			</div>
		  </div>
		  <input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
		  <input type="hidden" name="default_username" value="<?php echo $username; ?>">
		  <input type="hidden" name="st" value="<?php echo $st; ?>">
		  <div class="control-group">
			<div class="controls">
			  <button type="submit" class="btn btn-primary">Simpan Data</button>
			  <button type="reset" class="btn">Hapus Data</button>
			</div>
		  </div>
		<?php echo form_close(); ?>
	</div>    
	
  </body>
</html>
