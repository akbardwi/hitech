<?php

namespace App\Controllers;

//Load Model
use App\Models\Sf_model;
use App\Models\Hf_model;
use App\Models\Ot_model;
use App\Models\Visitor_model;
use App\Models\Vote_model;
use App\Models\Admin_model;
use App\Models\Forum_model;
//End Load Model

class Admin extends BaseController{
    public function __construct(){
        helper('form', 'url');
        $this->form_validation = \Config\Services::validation();
    }

	public function index(){
		return redirect()->to(base_url('admin/dashboard'));
	}

    // Halaman Login Admin
    public function login(){
        return view("admin/login");
    }

    // Halaman Dashboard Admin
    public function dashboard(){
        $config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error', 'Anda belum login');
			return redirect()->to(base_url("admin/login"));
		}
		// End proteksi
        $modelUser = new Visitor_model();
		$modelSF = new Sf_model();
		$modelHF = new Hf_model();
        $modelAdm= new Admin_model();

        $check_login = $modelAdm->check_username($session->get('user_email'));
        $check_login['fullname'] = $check_login['nama'];
        $data = [
			'title'				=> 'Dashboard',
			'dashboard'			=> TRUE,
			'user_login'		=> $check_login
		];
		
		render_page('admin/layout','header', $data);
		render_content('vote','index', $data);
		render_page('admin/layout','footer', $data);
    }

    // Fungsi Logout
    public function logout(){
        session()->destroy();
        return redirect()->to(base_url("admin/login"));
    }

    //Quick Count Admin
    public function quickcount(){
        $config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error', 'Anda belum login');
			return redirect()->to(base_url("admin/login"));
		}
		// End proteksi
        $modelUser = new Visitor_model();
		$modelSF = new Sf_model();
		$modelHF = new Hf_model();
        $modelAdm= new Admin_model();

        $check_login = $modelAdm->check_username($session->get('user_email'));

		$data = [
			'title'				=> 'Quick Count Developer',
			'dashboard'			=> TRUE,
			'sf'				=> $modelSF->qc(),
			'hf'				=> $modelHF->qc(),
			'user_login'		=> $check_login
		];
		
		render_page('admin/layout','header', $data);
		render_content('vote','qc', $data);
		render_page('admin/layout','footer', $data);
    }

	// Halaman List Peserta
	public function peserta(){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error', 'Anda belum login');
			return redirect()->to(base_url("admin/login"));
		}
		// End proteksi

        $modelAdm= new Admin_model();

        $check_login = $modelAdm->check_username($session->get('user_email'));

		$data = [
			'title'				=> 'Daftar Peserta',
			'dashboard'			=> TRUE,
			'user_login'		=> $check_login
		];
		
		render_page('admin/layout','header', $data);
		render_content('admin','peserta', $data);
		render_page('admin/layout','footer', $data);
	}

	// Halaman Peserta SF
	public function sf(){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error', 'Anda belum login');
			return redirect()->to(base_url("admin/login"));
		}
		// End proteksi

        $modelAdm= new Admin_model();
		$modelSF = new Sf_model();

        $check_login = $modelAdm->check_username($session->get('user_email'));

		$data = [
			'title'				=> 'Daftar Peserta',
			'dashboard'			=> TRUE,
			'peserta'			=> $modelSF->listing(),
			'user_login'		=> $check_login
		];
		
		render_page('admin/layout','header', $data);
		render_content('admin','sf', $data);
		render_page('admin/layout','footer', $data);
	}

	// Halaman Peserta HF
	public function hf(){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error', 'Anda belum login');
			return redirect()->to(base_url("admin/login"));
		}
		// End proteksi

        $modelAdm= new Admin_model();
		$modelHF = new Hf_model();

        $check_login = $modelAdm->check_username($session->get('user_email'));

		$data = [
			'title'				=> 'Daftar Peserta',
			'dashboard'			=> TRUE,
			'peserta'			=> $modelHF->listing(),
			'user_login'		=> $check_login
		];
		
		render_page('admin/layout','header', $data);
		render_content('admin','hf', $data);
		render_page('admin/layout','footer', $data);
	}

	// Halaman Peserta OT
	public function ot(){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error', 'Anda belum login');
			return redirect()->to(base_url("admin/login"));
		}
		// End proteksi

        $modelAdm= new Admin_model();
		$model = new Ot_model();

        $check_login = $modelAdm->check_username($session->get('user_email'));

		$data = [
			'title'				=> 'Daftar Peserta',
			'dashboard'			=> TRUE,
			'peserta'			=> $model->listing(),
			'user_login'		=> $check_login
		];
		
		render_page('admin/layout','header', $data);
		render_content('admin','ot', $data);
		render_page('admin/layout','footer', $data);
	}

	// Halaman Peserta OT
	public function pengunjung(){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error', 'Anda belum login');
			return redirect()->to(base_url("admin/login"));
		}
		// End proteksi

        $modelAdm= new Admin_model();
		$model = new Visitor_model();

        $check_login = $modelAdm->check_username($session->get('user_email'));

		$data = [
			'title'				=> 'Daftar Peserta',
			'dashboard'			=> TRUE,
			'peserta'			=> $model->listing(),
			'user_login'		=> $check_login
		];
		
		render_page('admin/layout','header', $data);
		render_content('admin','pengunjung', $data);
		render_page('admin/layout','footer', $data);
	}

	//Cek data
    public function getData(){
        $config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error', 'Anda belum login');
			return redirect()->to(base_url("admin/login"));
		}
		// End proteksi
        
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "POST") {
            $id = filter_var($this->request->getVar('id'), FILTER_SANITIZE_STRING);
			$type = filter_var($this->request->getVar('type'), FILTER_SANITIZE_STRING);
			$modelSF = new Sf_model();
			$modelHF = new Hf_model();
            if($type == "sf"){
				$peserta = $modelSF->read($id);
			} else {
				$peserta = $modelHF->read($id);
			}
            $data = array(  
                'title'		            => 'Data Peserta',
                'data'    	            => $peserta
            );
            
			if($type == "sf"){
				render_content('admin','datasf', $data);
			} else {
				render_content('admin','datahf', $data);
			}
            // render_page('admin/layout','footer', $data);
        } else {
            return redirect()->to(base_url('admin/dashboard'));
        }
    }
    
    //Refresh Token
    public function refreshToken(){
        $config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error', 'Anda belum login');
			return redirect()->to(base_url("admin/login"));
		}
		// End proteksi
        
        // Generate new Token
        $data = csrf_hash();
        return $data;
    }

	//Upload Logo
	public function uploadLogo(){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error', 'Anda belum login');
			return redirect()->to(base_url("admin/login"));
		}
		// End proteksi

		$method = $_SERVER['REQUEST_METHOD'];
        if($method == "POST") {
			$id = filter_var($this->request->getVar('id'), FILTER_SANITIZE_STRING);
			$type = filter_var($this->request->getVar('type'), FILTER_SANITIZE_STRING);
			
			$tambah = [
				'logo'	=> $this->request->getFile('logo')
			];
			if($this->form_validation->run($tambah, 'upload_logo') == FALSE){
				// mengembalikan nilai input yang sudah dimasukan sebelumnya
				// session()->setFlashdata('inputs', $this->request->getPost());
				// memberikan pesan error pada saat input data
				session()->setFlashdata('errors', $this->form_validation->getErrors());
				session()->setFlashdata('keterangan', $this->request->getVar('keterangan'));
				return redirect()->to(base_url($_SERVER['HTTP_REFERER']));
			} else {
				$logo = $this->request->getFile('logo');
				$namabaru = $logo->getRandomName();
				$db = \Config\Database::connect();
				if($type == "sf"){
					$logo->move(WRITEPATH . '../assets/berkas/sf/',$namabaru);
					$update = $db->query("UPDATE sf SET logo = '$namabaru' WHERE id = '$id'");
					if($update){
						session()->setFlashdata('success', "Berhasil Update Logo");
						return redirect()->to(base_url($_SERVER['HTTP_REFERER']));
					} else {
						session()->setFlashdata('error', "Update Logo Gagal");
						return redirect()->to(base_url($_SERVER['HTTP_REFERER']));
					}
				} else {
					$logo->move(WRITEPATH . '../assets/berkas/hf/',$namabaru);
					$update = $db->query("UPDATE hf SET logo = '$namabaru' WHERE id = '$id'");
					if($update){
						session()->setFlashdata('success', "Berhasil Update Logo");
						return redirect()->to(base_url($_SERVER['HTTP_REFERER']));
					} else {
						session()->setFlashdata('error', "Update Logo Gagal");
						return redirect()->to(base_url($_SERVER['HTTP_REFERER']));
					}
				}
			}
		} else {
			return redirect()->to(base_url("admin/dashboard"));
		}
	}

	// HTM
	public function bayar(){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error', 'Anda belum login');
			return redirect()->to(base_url("admin/login"));
		}
		// End proteksi

		$method = $_SERVER['REQUEST_METHOD'];
        if($method == "POST") {
			$id = filter_var($this->request->getVar('id'), FILTER_SANITIZE_STRING);
			$type = filter_var($this->request->getVar('type'), FILTER_SANITIZE_STRING);
			$bayar = filter_var($this->request->getVar('bayar'), FILTER_SANITIZE_STRING);
			
			$db = \Config\Database::connect();
			if($type == "sf"){
				$query = $db->query("UPDATE sf SET bayar = '$bayar' WHERE id = '$id'");
			} else {
				$query = $db->query("UPDATE hf SET bayar = '$bayar' WHERE id = '$id'");
			}

			$session->setFlashdata('success', 'Data sudah disimpan');
			return redirect()->to(base_url($_SERVER['HTTP_REFERER']));
		} else {
			return redirect()->to(base_url($_SERVER['HTTP_REFERER']));
		}
	}

	// Halaman List Forum
	public function fr(){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error_visitors', 'Anda belum login');
			return redirect()->to(base_url("admin/login"));
		}
		// End proteksi
		$modelUser = new Visitor_model();
		$modelHF = new Hf_model();
		$modelSF = new Sf_model();
        $check_login = $modelUser->check_email($session->get('user_email'));

		$data = [
			'title'				=> 'Forum Developer',
			'sf'				=> $modelSF->listing(),
			'hf'				=> $modelHF->listing(),
			'dashboard'			=> TRUE,
			'user_login'		=> $check_login
		];
		
		render_page('admin/layout','header', $data);
		render_content('admin','qna', $data);
		render_page('admin/layout','footer', $data);
	}

	//Halaman Forum Diskusi
	public function forum($type, $id_dev){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error_visitors', 'Anda belum login');
			return redirect()->to(base_url("admin/login"));
		}
		// End proteksi
		$modelUser = new Visitor_model();
		$modelHF = new Hf_model();
		$modelSF = new Sf_model();
		$modelForum = new Forum_model();
		$modelAdm = new Admin_model();

		$check_login = $modelAdm->check_username($session->get('user_email'));
		if($type == "software-fair"){
			$dev = $modelSF->read($id_dev);
			$dev['app'] = $dev['nama_app'];
			$dev['type'] = "sf";
		} else {
			$dev = $modelHF->read($id_dev);
			$dev['app'] = $dev['judul_alat'];
			$dev['type'] = "hf";
		}
		$data = [
			'title'				=> 'Forum Developer',
			'dev'				=> $dev,
			'forum'				=> $modelForum->listing($id_dev, $dev['type']),
			'dashboard'			=> TRUE,
			'user_login'		=> $check_login
		];
		
		render_page('admin/layout','header', $data);
		render_content('admin','forum', $data);
		render_page('admin/layout','footer', $data);
	}

	//Halaman Forum Open Talk
	public function opentalk(){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error_visitors', 'Anda belum login');
			return redirect()->to(base_url("admin/login"));
		}
		// End proteksi
		$modelUser = new Visitor_model();
		$modelHF = new Hf_model();
		$modelSF = new Sf_model();
		$modelForum = new Forum_model();
		$modelAdm = new Admin_model();

		$check_login = $modelAdm->check_username($session->get('user_email'));
		$data = [
			'title'				=> 'Forum OpenTalk',
			'forum'				=> $modelForum->listing(0, 'ot'),
			'dashboard'			=> TRUE,
			'user_login'		=> $check_login
		];
		
		render_page('admin/layout','header', $data);
		render_content('admin','forumOT', $data);
		render_page('admin/layout','footer', $data);
	}

	//Halaman Ranking Pengunjung
	public function ranking(){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error_visitors', 'Anda belum login');
			return redirect()->to(base_url("admin/login"));
		}
		// End proteksi
		$modelUser = new Visitor_model();
		$modelAdm = new Admin_model();

		$check_login = $modelAdm->check_username($session->get('user_email'));
		$data = [
			'title'				=> 'Ranking Pengunjung',
			'ranking'			=> $modelUser->rank(),
			'dashboard'			=> TRUE,
			'user_login'		=> $check_login
		];
		
		render_page('admin/layout','header', $data);
		render_content('admin','ranking', $data);
		render_page('admin/layout','footer', $data);
	}

	//Halaman Rating Developer
	public function rating(){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error_visitors', 'Anda belum login');
			return redirect()->to(base_url("admin/login"));
		}
		// End proteksi
		$modelUser = new Visitor_model();
		$modelHF = new Hf_model();
		$modelSF = new Sf_model();
		$modelVote = new Vote_model();
		$modelAdm = new Admin_model();

		$check_login = $modelAdm->check_username($session->get('user_email'));
		$data = [
			'title'				=> 'Ranking Pengunjung',
			'sf'				=> $modelSF->listing(),
			'hf'				=> $modelHF->listing(),
			'vote'				=> $modelVote->listing(),
			'dashboard'			=> TRUE,
			'user_login'		=> $check_login
		];
		
		render_page('admin/layout','header', $data);
		render_content('admin','rating', $data);
		render_page('admin/layout','footer', $data);
	}

	//Halaman List Voting
	public function voting(){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error_visitors', 'Anda belum login');
			return redirect()->to(base_url("admin/login"));
		}
		// End proteksi
		$modelHF = new Hf_model();
		$modelSF = new Sf_model();
		$modelVote = new Vote_model();
		$modelAdm = new Admin_model();

		$check_login = $modelAdm->check_username($session->get('user_email'));
		$data = [
			'title'				=> 'Ranking Pengunjung',
			'sf'				=> $modelSF->listing(),
			'hf'				=> $modelHF->listing(),
			'vote'				=> $modelVote->listing(),
			'dashboard'			=> TRUE,
			'user_login'		=> $check_login
		];
		
		render_page('admin/layout','header', $data);
		render_content('admin','voting', $data);
		render_page('admin/layout','footer', $data);
	}
}