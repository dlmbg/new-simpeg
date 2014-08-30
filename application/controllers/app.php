<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller {

	/*
		***	Controller : app.php
		***	by Gede Lumbung
		***	http://gedelumbung.com
	*/

	public function index()
	{
		if($this->session->userdata('logged_in')=="")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->get("tbl_data_pegawai");
			$config['base_url'] = base_url() . 'dashboard_admin/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_pegawai'] = $this->db->query("select a.nip, a.nama_pegawai, b.golongan, c.nama_status, a.id_pegawai from tbl_data_pegawai a left join tbl_master_golongan b on a.id_golongan=b.id_golongan
			left join tbl_master_status_pegawai c on a.status_pegawai=c.id_status_pegawai limit ".$offset.",".$limit."");
			
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('app/home/home',$d);
			}
			else
			{
				$dt['username'] = $this->input->post('username');
				$dt['password'] = $this->input->post('password');
				$this->app_login_model->getLoginData($dt);
			}
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			header('location:'.base_url().'dashboard_admin');
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="operator")
		{
			header('location:'.base_url().'dashboard_operator');
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="executive")
		{
			header('location:'.base_url().'dashboard_executive');
		}
	}

	public function pegawai()
	{
		$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
		$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
		$d['instansi'] = $this->config->item('nama_instansi');
		$d['credit'] = $this->config->item('credit_aplikasi');
		$d['alamat'] = $this->config->item('alamat_instansi');
		
		$id['id_pegawai'] = $this->uri->segment(3);
		$this->session->set_userdata($id);
		$data_pegawai = $this->db->get_where("tbl_data_pegawai",$id);
		
		if($data_pegawai->num_rows()>0)
		{
			$q = $this->db->get_where("tbl_data_pegawai",$id);
			$set_detail = $q->row();
			$this->session->set_userdata("nama_pegawai",$set_detail->nama_pegawai);
			
			foreach($q->result() as $data)
			{
				$d['id_param'] = $data->id_pegawai;
				$d['nip'] = $data->nip;
				$d['nip_lama'] = $data->nip_lama;
				$d['no_kartu_pegawai'] = $data->no_kartu_pegawai;
				$d['nama_pegawai'] = $data->nama_pegawai;
				$d['tempat_lahir'] =  $data->tempat_lahir;
				$d['tanggal_lahir'] = $data->tanggal_lahir;
				$d['jenis_kelamin'] = $data->jenis_kelamin;
				$d['agama'] = $data->agama;
				$d['usia'] =  $data->usia;
				$d['status_pegawai'] = $data->status_pegawai;
				$d['tanggal_pengangkatan_cpns'] = $data->tanggal_pengangkatan_cpns;
				$d['alamat_pegawai'] =  $data->alamat;
				$d['no_npwp'] = $data->no_npwp;
				$d['kartu_askes_pegawai'] = $data->kartu_askes_pegawai;
				$d['status_pegawai_pangkat'] = $data->status_pegawai_pangkat;
				$d['id_golongan'] = $data->id_golongan;
				$d['nomor_sk_pangkat'] = $data->nomor_sk_pangkat;
				$d['tanggal_sk_pangkat'] = $data->tanggal_sk_pangkat;
				$d['tanggal_mulai_pangkat'] = $data->tanggal_mulai_pangkat;
				$d['tanggal_selesai_pangkat'] = $data->tanggal_selesai_pangkat;
				$d['id_status_jabatan'] = $data->id_status_jabatan;
				$d['id_jabatan'] = $data->id_jabatan;
				$d['id_unit_kerja'] = $data->id_unit_kerja;
				$d['id_satuan_kerja'] = $data->id_satuan_kerja;
				$d['lokasi_kerja'] = $data->lokasi_kerja;
				$d['nomor_sk_jabatan'] = $data->nomor_sk_jabatan;
				$d['tanggal_sk_jabatan'] = $data->tanggal_sk_jabatan;
				$d['tanggal_mulai_jabatan'] = $data->tanggal_mulai_jabatan;
				$d['tanggal_selesai_jabatan'] = $data->tanggal_selesai_jabatan;
				$d['id_eselon'] = $data->id_eselon;
				$d['tmt_eselon'] = $data->tmt_eselon;
				$d['foto'] = $data->foto;
			}
			
			$d['st'] = "edit";
			$d['mst_status_pegawai'] = $this->db->get('tbl_master_status_pegawai');
			$d['mst_golongan'] = $this->db->get('tbl_master_golongan');
			$d['mst_stts_jabatan'] = $this->db->get('tbl_master_status_jabatan');
			$d['mst_jabatan'] = $this->db->get('tbl_master_jabatan');
			$d['mst_unit_kerja'] = $this->db->get('tbl_master_unit_kerja');
			$d['mst_satuan_kerja'] = $this->db->get('tbl_master_satuan_kerja');
			$d['mst_eselon'] = $this->db->get('tbl_master_eselon');
			$d['mst_lokasi_kerja'] = $this->db->get('tbl_master_lokasi_kerja');
			
			$d['data_keluarga'] = $this->db->get_where("tbl_data_keluarga",$id);
			$d['data_riwayat_pangkat'] = $this->db->query("select * from tbl_data_riwayat_pangkat a left join tbl_master_golongan b on a.id_golongan=b.id_golongan where 
			a.id_pegawai='".$id['id_pegawai']."'");
			$d['data_riwayat_jabatan'] = $this->db->query("select * from tbl_data_riwayat_jabatan a left join tbl_master_jabatan b on a.id_jabatan=b.id_jabatan left join
			tbl_master_unit_kerja c on a.id_unit_kerja=c.id_unit_kerja left join tbl_master_eselon d on a.id_eselon=d.id_eselon where 
			a.id_pegawai='".$id['id_pegawai']."'");
			$d['data_pendidikan'] = $this->db->get_where("tbl_data_pendidikan",$id);
			$d['data_pelatihan'] = $this->db->query("select b.nama_pelatihan, a.lokasi, a.tanggal_sertifikat, a.jam_pelatihan,
			a.negara, a.id_pelatihan from tbl_data_pelatihan a left join tbl_master_pelatihan b on a.id_master_pelatihan=b.id_pelatihan where 
			a.id_pegawai='".$id['id_pegawai']."'");
			$d['data_penghargaan'] = $this->db->query("select b.nama_penghargaan, a.nomor_sk, a.tanggal_sk, a.id_penghargaan from tbl_data_penghargaan a left join tbl_master_penghargaan b on a.id_master_penghargaan=b.id_penghargaan where
			a.id_pegawai='".$id['id_pegawai']."'");
			$d['data_seminar'] = $this->db->get_where("tbl_data_seminar",$id);
			$d['data_organisasi'] = $this->db->get_where("tbl_data_organisasi",$id);
			$d['data_gaji_pokok'] = $this->db->query("select * from tbl_data_gaji_pokok a left join tbl_master_golongan b on a.id_golongan=b.id_golongan where
			a.id_pegawai='".$id['id_pegawai']."'");
			$d['data_hukuman'] =  $this->db->query("select a.id_hukuman, b.nama_hukuman, a.nomor_sk, a.tanggal_sk, a.tanggal_mulai
		, a.tanggal_selesai, a.masa_berlaku from tbl_data_hukuman a left join tbl_master_hukuman b on a.id_master_hukuman=b.id_hukuman where
			a.id_pegawai='".$id['id_pegawai']."'");
			$d['data_dp3'] = $this->db->get_where("tbl_data_dp3",$id);
			
			$this->load->view('app/home/detail_pegawai',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
	
	public function change_password()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			$this->load->view('dashboard_admin/user/header',$d);
			$this->load->view('dashboard_admin/user/bg_change_password');
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
	
	public function save_pass()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$this->form_validation->set_rules('pass_lama', 'Password Lama', 'trim|required');
			$this->form_validation->set_rules('pass_baru', 'Password Baru', 'trim|required');
			$this->form_validation->set_rules('ulangi_pass_baru', 'Ulangi Password Baru', 'trim|required');
			
			$id['username'] = $this->input->post("usernname");
			$pass_lama = $this->input->post("pass_lama");
			$pass_baru = $this->input->post("pass_baru");
			$ulangi_pass_baru = $this->input->post("ulangi_pass_baru");
			
			$set['tab_a'] = "active";
			$set['tab_b'] = "";
			$this->session->set_userdata($set);
			
			if ($this->form_validation->run() == FALSE)
			{
				$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
				$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
				$d['instansi'] = $this->config->item('nama_instansi');
				$d['credit'] = $this->config->item('credit_aplikasi');
				$d['alamat'] = $this->config->item('alamat_instansi');
				
				$this->load->view('dashboard_admin/user/header',$d);
				$this->load->view('dashboard_admin/user/bg_change_password');
			}
			else
			{
				$login['username'] = $id['username'];
				$login['password'] = md5($pass_lama.'AppSimpeg32');
				$cek = $this->db->get_where('tbl_user_login', $login);
				if($cek->num_rows()>0)
				{
					if($pass_baru==$ulangi_pass_baru)
					{
						$upd['password'] = md5($pass_baru.'AppSimpeg32');
						$this->db->update("tbl_user_login",$upd,$id);
						$this->session->set_flashdata('pass', 'Berhasil mengubah password...');
						header('location:'.base_url().'app/change_password');
					}
					else
					{
						$this->session->set_flashdata('pass', 'Password Baru tidak sama...');
						header('location:'.base_url().'app/change_password');
					}
				}
				else
				{
					$this->session->set_flashdata('pass', 'Password Lama salah...');
					header('location:'.base_url().'app/change_password');
				}
			}
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
	
	public function save_name()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$this->form_validation->set_rules('nama_lengkap', 'Nama Pengguna', 'trim|required');
			
			$id['username'] = $this->input->post("usernname");
			$nama = $this->input->post("nama_lengkap");
			
			$set['tab_a'] = "";
			$set['tab_b'] = "active";
			$this->session->set_userdata($set);
			
			if ($this->form_validation->run() == FALSE)
			{
				$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
				$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
				$d['instansi'] = $this->config->item('nama_instansi');
				$d['credit'] = $this->config->item('credit_aplikasi');
				$d['alamat'] = $this->config->item('alamat_instansi');
				
				$this->load->view('dashboard_admin/user/header',$d);
				$this->load->view('dashboard_admin/user/bg_change_password');
			}
			else
			{
				$upd['nama_lengkap'] = $nama;
				$this->db->update("tbl_user_login",$upd,$id);
				$this->session->set_flashdata('pass', 'Berhasil mengubah nama pengguna...');
				$set_new['nama'] = $upd['nama_lengkap'];
				$this->session->set_userdata($set_new);
				header('location:'.base_url().'app/change_password');
			}
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function cari()
	{
		$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
		$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
		$d['instansi'] = $this->config->item('nama_instansi');
		$d['credit'] = $this->config->item('credit_aplikasi');
		$d['alamat'] = $this->config->item('alamat_instansi');
		
		if($this->input->post("cari")=="")
		{
			$kata = $this->session->userdata('kata');
		}
		else
		{
			$sess_data['kata'] = $this->input->post("cari");
			$this->session->set_userdata($sess_data);
			$kata = $this->session->userdata('kata');
		}
		
		$page=$this->uri->segment(3);
		$limit=$this->config->item('limit_data');
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$d['tot'] = $offset;
		$tot_hal = $this->db->query("select a.nip, a.nama_pegawai, b.golongan, c.nama_status, a.id_pegawai from tbl_data_pegawai a left join tbl_master_golongan b on a.id_golongan=b.id_golongan
		left join tbl_master_status_pegawai c on a.status_pegawai=c.id_status_pegawai where a.nama_pegawai like '%".$kata."%' ");
		$config['base_url'] = base_url() . 'dashboard_admin/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Selanjutnya';
		$config['prev_link'] = 'Sebelumnya';
		$this->pagination->initialize($config);
		$d["paginator"] =$this->pagination->create_links();
		
		$d['data_pegawai'] = $this->db->query("select a.nip, a.nama_pegawai, b.golongan, c.nama_status, a.id_pegawai from tbl_data_pegawai a left join tbl_master_golongan b on a.id_golongan=b.id_golongan
		left join tbl_master_status_pegawai c on a.status_pegawai=c.id_status_pegawai where a.nama_pegawai like '%".$kata."%' limit ".$offset.",".$limit."");
		
				$this->load->view('app/home/home',$d);
		
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		header('location:'.base_url().'');
	}
}

/* End of file app.php */
/* Location: ./application/controllers/app.php */