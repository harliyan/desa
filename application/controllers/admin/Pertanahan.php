			<?php
			defined('BASEPATH') OR exit('No direct script access allowed');

			class Pertanahan extends CI_Controller {

				public function __construct() 
				{
					parent::__construct();
					$this->load->model('M_user');
					$this->load->model('M_pertanahan');
					$this->load->model('M_users');
					if (empty($this->session->userdata('status')) || $this->session->userdata('status') !== "LogedIn") {
						return redirect('logout');
					} else {
						if (!empty($this->session->userdata('userdata')->privilege) && $this->session->userdata('userdata')->privilege !== 'admin') 
						{
							return redirect('logout');		
						}
					}
				}
				public function index()
				{
					$data = [
						'active_controller' => 'pertanahan',
						'active_function' => 'index',
						'sidebar' => 'sidebar_admin',
					];
					$data['dataTanahbengkok'] = $this->M_pertanahan->tampil();
					$data['dataTanahkering'] = $this->M_pertanahan->luas_tanah_kering();
					$data['dataTanahsawah'] = $this->M_pertanahan->luas_tanah_sawah();
					$data['dataLuaswilayah'] = $this->M_pertanahan->luas_wilayah();
					$data['bengkokCount'] = $this->M_pertanahan->bengkokCount();
					$data['wilayahCount'] = $this->M_pertanahan->wilayahCount();
					$data['tanahkeringCount'] = $this->M_pertanahan->tanahkeringCount();
					$data['tanahsawahCount'] = $this->M_pertanahan->tanahsawahCount();

					// $data['userCount'] = $this->M_home->get_user_count();
					// $data['userCount2'] = $this->M_home->get_user_count2();
					// $data['namaUser'] = $this->M_home->get_nama_kepsek();

					// echo 'pake index';
					$this->load->view('adminlte3/global/template', $data);
				}	

				public function hapus_bengkok($id_desa){ //fungsi delete
			    $this->load->model('M_pertanahan'); //load model
			    $this->M_pertanahan->hapus_bengkok($id_desa); //ngacir ke fungsi delTransaksi
			    $this->session->set_flashdata('success', 'Data Administrasi Wilayah Berhasil dihapus');
			    redirect('admin/pertanahan'); //redirect
			}

			public function hapus_luas_wilayah($id_desa){ //fungsi delete
			    $this->load->model('M_pertanahan'); //load model
			    $this->M_pertanahan->hapus_luas_wilayah($id_desa); //ngacir ke fungsi delTransaksi
			    $this->session->set_flashdata('success', 'Data Administrasi Wilayah Berhasil dihapus');
			    redirect('admin/pertanahan'); //redirect
			}

			public function hapus_tanah_kering($id_desa){ //fungsi delete
			    $this->load->model('M_pertanahan'); //load model
			    $this->M_pertanahan->hapus_tanah_kering($id_desa); //ngacir ke fungsi delTransaksi
			    $this->session->set_flashdata('success', 'Data Administrasi Wilayah Berhasil dihapus');
			    redirect('admin/pertanahan'); //redirect
			}

			public function hapus_tanah_sawah($id_desa){ //fungsi delete
			    $this->load->model('M_pertanahan'); //load model
			    $this->M_pertanahan->hapus_tanah_sawah($id_desa); //ngacir ke fungsi delTransaksi
			    $this->session->set_flashdata('success', 'Data Administrasi Wilayah Berhasil dihapus');
			    redirect('admin/pertanahan'); //redirect
			}

			public function edit_bengkok($id_desa)
			{

				$where = array('id_desa' => $id_desa);

				$data = [
					'active_controller' => 'edit',
					'active_function' => 'edit_bengkok',
					'sidebar' => 'sidebar_admin',
				];

				$data['tb_tanah_bengkok'] = $this->M_pertanahan->edit_data_bengkok($where, 'tb_tanah_bengkok')->result();

				$this->load->view('adminlte3/global/template', $data);
			}	

			public function update_bengkok(){
				$id_desa = $this->input->post('id_desa');
				$bengkok_sawah = $this->input->post('bengkok_sawah');
				$bengkok_lahan_kering = $this->input->post('bengkok_lahan_kering');
				$kas_sawah = $this->input->post('kas_sawah');
				$kas_lahan_kering = $this->input->post('kas_lahan_kering');
				$tahun = $this->input->post('tahun');


				$data = array(
					'bengkok_sawah' => $bengkok_sawah,
					'bengkok_lahan_kering' => $bengkok_lahan_kering,
					'kas_sawah' => $kas_sawah,
					'kas_lahan_kering' => $kas_lahan_kering,
					'tahun' => $tahun

				);

				$where = array(
					'id_desa' => $id_desa
				);

				$this->M_pertanahan->update_data_bengkok($where,$data,'tb_tanah_bengkok');
				redirect('admin/pertanahan');
			}

			public function edit_luas($id_desa)
			{

				$where = array('id_desa' => $id_desa);

				$data = [
					'active_controller' => 'edit',
					'active_function' => 'edit_luas',
					'sidebar' => 'sidebar_admin',
				];

				$data['tb_luas_wilayah'] = $this->M_pertanahan->edit_data_luas($where, 'tb_luas_wilayah')->result();

				$this->load->view('adminlte3/global/template', $data);
			}	

			public function update_luas(){
				$id_desa = $this->input->post('id_desa');
				$luas_wilayah = $this->input->post('luas_wilayah');
				$tanah_sawah = $this->input->post('tanah_sawah');
				$tanah_kering = $this->input->post('tanah_kering');
				$tahun = $this->input->post('tahun');


				$data = array(
					'luas_wilayah' => $luas_wilayah,
					'tanah_sawah' => $tanah_sawah,
					'tanah_kering' => $tanah_kering,
					'tahun' => $tahun

				);

				$where = array(
					'id_desa' => $id_desa
				);

				$this->M_pertanahan->update_data_luas($where,$data,'tb_luas_wilayah');
				redirect('admin/pertanahan');
			}

			public function edit_kering($id_desa)
			{

				$where = array('id_desa' => $id_desa);

				$data = [
					'active_controller' => 'edit',
					'active_function' => 'edit_kering',
					'sidebar' => 'sidebar_admin',
				];

				$data['tb_luas_tanah_kering'] = $this->M_pertanahan->edit_data_kering($where, 'tb_luas_tanah_kering')->result();

				$this->load->view('adminlte3/global/template', $data);
			}	

			public function update_kering(){
				$id_desa = $this->input->post('id_desa');
				$perkarangan_bangunan = $this->input->post('perkarangan_bangunan');
				$tegal_kebun = $this->input->post('tegal_kebun');
				$padang_gembala = $this->input->post('padang_gembala');
				$tambak_kolam = $this->input->post('tambak_kolam');
				$hutan_negara = $this->input->post('hutan_negara');
				$perkebunan_negara = $this->input->post('perkebunan_negara');
				$lainnya = $this->input->post('lainnya');
				$jumlah = $this->input->post('jumlah');


				$data = array(
					'perkarangan_bangunan' => $perkarangan_bangunan,
					'tegal_kebun' => $tegal_kebun,
					'padang_gembala' => $padang_gembala,
					'tambak_kolam' => $tambak_kolam,
					'hutan_negara' => $hutan_negara,
					'perkebunan_negara' => $perkebunan_negara,
					'lainnya' => $lainnya,
					'jumlah' => $jumlah

				);

				$where = array(
					'id_desa' => $id_desa
				);

				$this->M_pertanahan->update_data_kering($where,$data,'tb_luas_tanah_kering');
				redirect('admin/pertanahan');
			}

			public function edit_sawah($id_desa)
			{

				$where = array('id_desa' => $id_desa);

				$data = [
					'active_controller' => 'edit',
					'active_function' => 'edit_sawah',
					'sidebar' => 'sidebar_admin',
				];

				$data['tb_luas_tanah_sawah'] = $this->M_pertanahan->edit_data_sawah($where, 'tb_luas_tanah_sawah')->result();

				$this->load->view('adminlte3/global/template', $data);
			}	

			public function update_sawah(){
				$id_desa = $this->input->post('id_desa');
				$irigasi_teknis = $this->input->post('irigasi_teknis');
				$irigasi_setengah_teknis = $this->input->post('irigasi_setengah_teknis');
				$irigasi_sederhana = $this->input->post('irigasi_sederhana');
				$hujan_tadah = $this->input->post('hujan_tadah');
				$jumlah = $this->input->post('jumlah');


				$data = array(
					'irigasi_teknis' => $irigasi_teknis,
					'irigasi_setengah_teknis' => $irigasi_setengah_teknis,
					'irigasi_sederhana' => $irigasi_sederhana,
					'hujan_tadah' => $hujan_tadah,
					'jumlah' => $jumlah

				);

				$where = array(
					'id_desa' => $id_desa
				);

				$this->M_pertanahan->update_data_sawah($where,$data,'tb_luas_tanah_sawah');
				redirect('admin/pertanahan');
			}
			}
