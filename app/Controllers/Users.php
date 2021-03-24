<?php

namespace App\Controllers;

//Load Model
use App\Models\Sf_model;
use App\Models\Hf_model;
use App\Models\Ot_model;
use App\Models\Visitor_model;
use App\Models\Vote_model;
use App\Models\Forum_model;
use App\Models\Feedback_model;
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

	// Proses Feedback
	public function feedback(){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error_visitors', 'Anda belum login');
			return redirect()->to(base_url()."/#pengunjung");
		}
		// End proteksi

		$method = $_SERVER['REQUEST_METHOD'];
		if($method == "POST"){
			$email = $session->get('user_email');
            $kesan = filter_var($this->request->getVar('kesan'), FILTER_SANITIZE_STRING);
            $pesan = filter_var($this->request->getVar('pesan'), FILTER_SANITIZE_STRING);

			$data = ['email' => $email, 'kesan' => $kesan, 'pesan' => $pesan];

			if($this->form_validation->run($data, 'feedback') == FALSE){
				// mengembalikan nilai input yang sudah dimasukan sebelumnya
				session()->setFlashdata('inputs_vote', $this->request->getPost());
				// memberikan pesan error pada saat input data
				session()->setFlashdata('errors_vote', $this->form_validation->getErrors());
				return redirect()->to($_SERVER['HTTP_REFERER']);
			} else {
				$model = new Feedback_model();
				$model->tambah($data);

				$db = \Config\Database::connect();
				$db->query("UPDATE visitor SET feedback = 1 WHERE email = '$email'");

				session()->setFlashdata('success', "Terima kasih telah memberikan feedback.");
				return redirect()->to($_SERVER['HTTP_REFERER']);
			}
		} else {
			return redirect()->to(base_url("users/dashboard"));
		}
	}

	// Proses Voting
	public function vote(){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error_visitors', 'Anda belum login');
			return redirect()->to(base_url()."/#pengunjung");
		}
		// End proteksi

		$method = $_SERVER['REQUEST_METHOD'];
		if($method == "POST"){
			$id_dev = filter_var($this->request->getVar('id_dev'), FILTER_SANITIZE_STRING);
            $type_dev = filter_var($this->request->getVar('dev'), FILTER_SANITIZE_STRING);
            $email = $session->get('user_email');
            $quantity = filter_var($this->request->getVar('quantity'), FILTER_SANITIZE_STRING);

			session()->setFlashdata('sweetalert', TRUE);

			$model = new Vote_model();
			$dataVote = $model->check_vote($id_dev, $type_dev, $email);
			if($dataVote){
				session()->setFlashdata('error_vote', "Anda sudah memberikan vote untuk developer ini");
				return redirect()->to($_SERVER['HTTP_REFERER']);
			}

			$data = [				
				'dev'				=> $type_dev,
				'id_dev'			=> $id_dev,
				'email_visitor'		=> $email,
				'star'				=> $quantity
			];
			
			if($this->form_validation->run($data, 'vote') == FALSE){
				// mengembalikan nilai input yang sudah dimasukan sebelumnya
				session()->setFlashdata('inputs_vote', $this->request->getPost());
				// memberikan pesan error pada saat input data
				session()->setFlashdata('errors_vote', $this->form_validation->getErrors());
				return redirect()->to($_SERVER['HTTP_REFERER']);
			} else {
				if($quantity > 0 or $quantity <= 5){
					$model->tambah($data);
				
					$db = \Config\Database::connect();
					$query = $db->query("UPDATE visitor SET vote = vote+1, point=point+1 WHERE email = '$email'");
					if($query){
						session()->setFlashdata('success_vote', "Terima kasih telah memberikan suara Anda untuk developer");
						return redirect()->to($_SERVER['HTTP_REFERER']);
					} else {
						session()->setFlashdata('error_vote', "Vote bermasalah, silahkan hubungi panitia");
						return redirect()->to($_SERVER['HTTP_REFERER']);
					}
				} else {
					session()->setFlashdata('error_vote', "Masukkan bintang 1-5");
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
		$modelVote = new Vote_model();
		if(session()->get('user_type') == "visitor"){
			$check_login = $modelUser->check_email($session->get('user_email'));
		} else {
			return redirect()->to(base_url("users/dashboard"));
		}
        
		$data = [
			'title'				=> 'Vote Software Fair',
			'dashboard'			=> TRUE,
			'developer'			=> $modelSF->lunas(),
			'vote'				=> $modelVote->listing(),
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
		$modelVote = new Vote_model();
		if(session()->get('user_type') == "visitor"){
			$check_login = $modelUser->check_email($session->get('user_email'));
		} else {
			return redirect()->to(base_url("users/dashboard"));
		}
        
		$data = [
			'title'				=> 'Vote Hardware Fair',
			'dashboard'			=> TRUE,
			'developer'			=> $modelHF->lunas(),
			'vote'				=> $modelVote->listing(),
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
			'sf'				=> $modelSF->lunas(),
			'hf'				=> $modelHF->lunas(),
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
		$modelForum = new Forum_model();

		$check_login = $modelUser->check_email($session->get('user_email'));
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
		
		render_page('vote/layout','header', $data);
		render_content('vote','forum', $data);
		render_page('vote/layout','footer', $data);
	}

	// Submit Comment
	public function post_comment(){
		$config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error_visitors', 'Anda belum login');
			return redirect()->to($_SERVER['HTTP_REFERER']);
		}
		// End proteksi

		$method = $_SERVER['REQUEST_METHOD'];
		if($method == "POST"){
			$id_dev = filter_var($this->request->getVar('id_dev'), FILTER_SANITIZE_STRING);
			$id_visitor = filter_var($this->request->getVar('id_visitor'), FILTER_SANITIZE_STRING);
			$type_dev = filter_var($this->request->getVar('type_dev'), FILTER_SANITIZE_STRING);
			$reply_to = filter_var($this->request->getVar('reply_to'), FILTER_SANITIZE_STRING);
			$comment = filter_var($this->request->getVar('comment'), FILTER_SANITIZE_STRING);
			$nama = filter_var($this->request->getVar('nama'), FILTER_SANITIZE_STRING);
			$data = [				
				'id_dev'			=> $id_dev,
				'id_visitor'		=> $id_visitor,
				'type_dev'			=> $type_dev,
				'nama'				=> $nama,
				'type_user'			=> session()->get('user_type'),
				'reply_to'			=> $reply_to,
				'comment'			=> $comment
			];
			if($this->form_validation->run($data, 'comment') == FALSE){
				// mengembalikan nilai input yang sudah dimasukan sebelumnya
				session()->setFlashdata('inputs', $this->request->getPost());
				// memberikan pesan error pada saat input data
				session()->setFlashdata('errors', $this->form_validation->getErrors());
				return redirect()->to($_SERVER['HTTP_REFERER']);
			} else {
				$model = new Forum_model();
				$model->tambah($data);
				session()->setFlashdata('success', "Komentar berhasil disimpan.");
				return redirect()->to($_SERVER['HTTP_REFERER']);
			}
		} else {
			return redirect()->to(base_url("users/dashboard"));
		}
	}

	// Rating koin komentar pengunjung
	public function rate(){
		$method = $_SERVER['REQUEST_METHOD'];
		if($method == "POST"){
			$id = filter_var($this->request->getVar('id'), FILTER_SANITIZE_NUMBER_INT);
			$id_visitor = filter_var($this->request->getVar('id_visitor'), FILTER_SANITIZE_NUMBER_INT);
			$quantity = filter_var($this->request->getVar('quantity'), FILTER_SANITIZE_NUMBER_INT);
			$data = ['quantity' => $quantity];
			if($this->form_validation->run($data, 'rate') == FALSE){
				// mengembalikan nilai input yang sudah dimasukan sebelumnya
				session()->setFlashdata('inputs', $this->request->getPost());
				// memberikan pesan error pada saat input data
				session()->setFlashdata('errors', $this->form_validation->getErrors());
				return redirect()->to($_SERVER['HTTP_REFERER']);
			} else {
				if($quantity > 0 or $quantity <= 5){
					$db = \Config\Database::connect();
					$rate = $db->query("UPDATE forum SET rate = 1, point = point+$quantity WHERE id = '$id'");
					$user = $db->query("UPDATE visitor SET point = point+$quantity WHERE id = '$id_visitor'");
					if($rate and $user){
						session()->setFlashdata('success', "Terima kasih telah memberikan point ke pengunjung.");
						return redirect()->to($_SERVER['HTTP_REFERER']);
					} else {
						session()->setFlashdata('error', "Gagal memberikan point.");
						return redirect()->to($_SERVER['HTTP_REFERER']);
					}
				} else {
					session()->setFlashdata('error', "Masukkan point 1-5.");
					return redirect()->to($_SERVER['HTTP_REFERER']);
				}
			}
		} else {
			return redirect()->to(base_url("users/forum"));
		}
	}
}