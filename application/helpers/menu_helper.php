<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('menu'))
{
	function menu()
	{
		$master = '';
		$CI =& get_instance();
		if($CI->session->userdata('id_unit_kerja') == 0)
		{
			$master = '<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-book icon-white"></i> Master <b class="caret"></b></a>
				        <ul class="dropdown-menu">
				          <li><a href="'.base_url().'master_status_pegawai"><i class="icon-tag"></i> Status Pegawai</a></li>
				          <li><a href="'.base_url().'master_unit_kerja"><i class="icon-question-sign"></i> Unit Kerja</a></li>
				          <li><a href="'.base_url().'master_satuan_kerja"><i class="icon-ok-sign"></i> Satuan Kerja</a></li>
				          <li><a href="'.base_url().'master_ppk"><i class="icon-eye-open"></i> PPK</a></li>
				          <li><a href="'.base_url().'master_golongan"><i class="icon-random"></i> Golongan</a></li>
				          <li><a href="'.base_url().'master_eselon"><i class="icon-retweet"></i> Eselon</a></li>
				          <li><a href="'.base_url().'master_pelatihan"><i class="icon-folder-open"></i> Pelatihan</a></li>
				          <li><a href="'.base_url().'master_jabatan"><i class="icon-hdd"></i> Jabatan</a></li>
				          <li><a href="'.base_url().'master_status_jabatan"><i class="icon-tasks"></i> Status Jabatan</a></li>
				          <li><a href="'.base_url().'master_penghargaan"><i class="icon-filter"></i> Penghargaan</a></li>
				          <li><a href="'.base_url().'master_hukuman"><i class="icon-briefcase"></i> Hukuman</a></li>
				          <li><a href="'.base_url().'master_lokasi_pelatihan"><i class="icon-fullscreen"></i> Lokasi Pelatihan</a></li>
				          <li><a href="'.base_url().'master_lokasi_kerja"><i class="icon-briefcase"></i> Lokasi Kerja</a></li>
				        </ul>
			      	</li>
				  	<li><a href="'.base_url().'manage_user"><i class="icon-user icon-white"></i> Manajemen User</a></li>';
		}
		$menu = '<div class="navbar-inner">
			        <div class="container">
			          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			          </a>
			          <a class="brand" href="'.base_url().'">'.$CI->config->item('nama_aplikasi_pendek').'</a>
			          <div class="nav-collapse collapse">
			            <ul class="nav">
			      			<li class="active"><a href="'.base_url().'"><i class="icon-home icon-white"></i> Beranda</a></li>
							'.$master.'
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-tasks icon-white"></i> Laporan <b class="caret"></b></a>
						        <ul class="dropdown-menu">
						          <li><a href="'.base_url().'laporan_pegawai_unit_satuan"><i class="icon-tag"></i> Laporan Pegawai - Unit Kerja dan Satuan Kerja</a></li>
						          <li><a href="'.base_url().'laporan_pegawai_penempatan_kerja"><i class="icon-question-sign"></i> Laporan Pegawai - Penempatan Kerja</a></li>
						          <li><a href="'.base_url().'laporan_pegawai_ikut_pelatihan"><i class="icon-ok-sign"></i> Laporan Pegawai - Mengikuti Pelatihan</a></li>
						          <li><a href="'.base_url().'laporan_pegawai_status_golongan"><i class="icon-eye-open"></i> Laporan Pegawai - Status Pegawai dan Golongan</a></li>
						          <li><a href="'.base_url().'laporan_pegawai_struktural_fungsional"><i class="icon-random"></i> Laporan Pegawai - Struktural dan Fungsional</a></li>
						          <li><a href="'.base_url().'laporan_pegawai_urut_kepangkatan"><i class="icon-retweet"></i> Laporan Daftar Urut Kepangkatan</a></li>
						        </ul>
				      		</li>
			    		</ul>
			            <div class="btn-group pull-right">
			      			  <button class="btn btn-primary"><i class="icon-user icon-white"></i> '.$CI->session->userdata('nama').'</button>
			      			  <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			      				<span class="caret"></span>
			      			  </button>
			      			  <ul class="dropdown-menu">
			        				<li><a href="'.base_url().'app/change_password"><i class="icon-wrench"></i> Pengaturan Akun</a></li>
			        				<li><a href="'.base_url().'app/logout"><i class="icon-off"></i> Log Out</a></li>
			      			  </ul>
			      			</div>
			          </div>
			        </div>
			      </div>';

	    return $menu;
	}
}
