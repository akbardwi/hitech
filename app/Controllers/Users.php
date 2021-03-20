<?php

namespace App\Controllers;

//Load Model
use App\Models\Sf_model;
use App\Models\Hf_model;
use App\Models\Ot_model;
use App\Models\Visitor_model;
use App\Models\Vote_model;
//End Load Model

class Users extends BaseController{
    public function __construct(){
        helper('form', 'url', 'Url_helper');
        $this->form_validation = \Config\Services::validation();
    }

	public function index(){
		return redirect()->to(base_url('users/dashboard'));
	}

	// Halaman Dashboard Users
    public function dashboard(){
        $config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error_visitors', 'Anda belum login');
			return redirect()->to(base_url()."/#pengunjung");
		}
		// End proteksi
		$modelUser = new Visitor_model();
		$modelSF = new Sf_model();
		$modelHF = new Hf_model();
		if(session()->get('user_type') == "visitor"){
			$check_login = $modelUser->check_email($session->get('user_email'));
		} else {
			if(session()->get('cat_dev') == "sf"){
				$check_login = $modelSF->check_email($session->get('user_email'));
				$check_login['fullname'] = $check_login['nama_ketua'];
			} else {
				$check_login = $modelHF->check_email($session->get('user_email'));
				$check_login['fullname'] = $check_login['nama_ketua'];
			}
		}
        
		$data = [
			'title'				=> 'Dashboard',
			'dashboard'			=> TRUE,
			'user_login'		=> $check_login
		];
		
		render_page('vote/layout','header', $data);
		render_content('vote','index', $data);
		render_page('vote/layout','footer', $data);
    }

	// Fungsi Logout
    public function logout(){
        session()->destroy();
        return redirect()->to(base_url());
    }

	// Proses Voting
	public function vote(){
		$method = $_SERVER['REQUEST_METHOD'];
		if($method == "POST"){
			$id_dev = filter_var($this->request->getVar('id'), FILTER_SANITIZE_STRING);
            $type_dev = filter_var($this->request->getVar('dev'), FILTER_SANITIZE_STRING);
            $email = filter_var($this->request->getVar('email'), FILTER_SANITIZE_EMAIL);
            $kesan = filter_var($this->request->getVar('kesan'), FILTER_SANITIZE_STRING);
            $pesan = filter_var($this->request->getVar('pesan'), FILTER_SANITIZE_STRING);

			session()->setFlashdata('sweetalert', TRUE);

			$modelVisitor = new Visitor_model();
			$dataUser = $modelVisitor->check_email($email);
			if($dataUser['vote'] == 1){
				session()->setFlashdata('error_vote', "Anda sudah memberikan vote untuk developer");
				return redirect()->to($_SERVER['HTTP_REFERER']);
			}

			$data = [				
				'dev'				=> $type_dev,
				'id_dev'			=> $id_dev,
				'email_visitor'		=> $email,
				'kesan'				=> $kesan,
				'pesan'				=> $pesan
			];
			
			if($this->form_validation->run($data, 'vote') == FALSE){
				// mengembalikan nilai input yang sudah dimasukan sebelumnya
				session()->setFlashdata('inputs_vote', $this->request->getPost());
				// memberikan pesan error pada saat input data
				session()->setFlashdata('errors_vote', $this->form_validation->getErrors());
				return redirect()->to($_SERVER['HTTP_REFERER']);
			} else {
				$model = new Vote_model();
				$model->tambah($data);
				
				$db = \Config\Database::connect();
				if($type_dev == "sf"){
					$vote = $db->query("UPDATE sf SET suara = suara+1 WHERE id = '$id_dev'");
				} else {
					$vote = $db->query("UPDATE hf SET suara = suara+1 WHERE id = '$id_dev'");
				}

				$query = $db->query("UPDATE visitor SET vote = '1' WHERE email = '$email'");
				if($query and $vote){
					session()->setFlashdata('success_vote', "Terima kasih telah memberikan suara Anda untuk developer");
					return redirect()->to($_SERVER['HTTP_REFERER']);
				} else {
					session()->setFlashdata('error_vote', "Vote bermasalah, silahkan hubungi panitia");
					return redirect()->to($_SERVER['HTTP_REFERER']);
				}
			}
		} else {
			return redirect()->to(base_url("users/dashboard"));
		}
	}

	// Halaman Vote Software Fair
	public function sf(){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error_visitors', 'Anda belum login');
			return redirect()->to(base_url()."/#pengunjung");
		}
		// End proteksi
		$modelUser = new Visitor_model();
		$modelSF = new Sf_model();
		if(session()->get('user_type') == "visitor"){
			$check_login = $modelUser->check_email($session->get('user_email'));
		} else {
			return redirect()->to(base_url("users/dashboard"));
		}
        
		$data = [
			'title'				=> 'Vote Software Fair',
			'dashboard'			=> TRUE,
			'developer'			=> $modelSF->listing(),
			'user_login'		=> $check_login
		];
		
		render_page('vote/layout','header', $data);
		render_content('vote','sf', $data);
		render_page('vote/layout','footer', $data);
	}

	// Halaman Vote Software Fair
	public function hf(){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error_visitors', 'Anda belum login');
			return redirect()->to(base_url()."/#pengunjung");
		}
		// End proteksi
		$modelUser = new Visitor_model();
		$modelHF = new Hf_model();
		if(session()->get('user_type') == "visitor"){
			$check_login = $modelUser->check_email($session->get('user_email'));
		} else {
			return redirect()->to(base_url("users/dashboard"));
		}
        
		$data = [
			'title'				=> 'Vote Hardware Fair',
			'dashboard'			=> TRUE,
			'developer'			=> $modelHF->listing(),
			'user_login'		=> $check_login
		];
		
		render_page('vote/layout','header', $data);
		render_content('vote','hf', $data);
		render_page('vote/layout','footer', $data);
	}

	// Halaman Quick Count
	public function qc(){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error_visitors', 'Anda belum login');
			return redirect()->to(base_url()."/#pengunjung");
		}
		// End proteksi
		$modelUser = new Visitor_model();
		$modelHF = new Hf_model();
		$modelSF = new Sf_model();
        $check_login = $modelUser->check_email($session->get('user_email'));

		$data = [
			'title'				=> 'Quick Count Developer',
			'dashboard'			=> TRUE,
			'sf'				=> $modelSF->qc(),
			'hf'				=> $modelHF->qc(),
			'user_login'		=> $check_login
		];
		
		render_page('vote/layout','header', $data);
		render_content('vote','qc', $data);
		render_page('vote/layout','footer', $data);
	}

	// Halaman Wheel Of Fortune
	public function wof(){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error_visitors', 'Anda belum login');
			return redirect()->to(base_url()."/#pengunjung");
		}
		// End proteksi
		$modelUser = new Visitor_model();
		$modelHF = new Hf_model();
		$modelSF = new Sf_model();
        $check_login = $modelUser->check_email($session->get('user_email'));

		$data = [
			'title'				=> 'Wheel Of Fortune',
			'dashboard'			=> TRUE,
			'user_login'		=> $check_login
		];
		
		render_page('vote/layout','header', $data);
		render_content('vote','wof', $data);
		render_page('vote/layout','footer', $data);
	}

	// Halaman List Forum
	public function fr(){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error_visitors', 'Anda belum login');
			return redirect()->to(base_url()."/#pengunjung");
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
		
		render_page('vote/layout','header', $data);
		render_content('vote','qna', $data);
		render_page('vote/layout','footer', $data);
	}

	//Halaman Forum Diskusi
	public function forum($type, $id_dev){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error_visitors', 'Anda belum login');
			return redirect()->to(base_url()."/#pengunjung");
		}
		// End proteksi
		$modelUser = new Visitor_model();
		$modelHF = new Hf_model();
		$modelSF = new Sf_model();

		$check_login = $modelUser->check_email($session->get('user_email'));
		if($type == "software-fair"){
			$dev = $modelSF->read($id_dev);
			$dev['app'] = $dev['nama_app'];
		} else {
			$dev = $modelHF->read($id_dev);
			$dev['app'] = $dev['nama_app'];
		}
		$data = [
			'title'				=> 'Forum Developer',
			'dev'				=> $dev,
			'dashboard'			=> TRUE,
			'user_login'		=> $check_login
		];
		
		render_page('vote/layout','header', $data);
		render_content('vote','forum', $data);
		render_page('vote/layout','footer', $data);
	}
}