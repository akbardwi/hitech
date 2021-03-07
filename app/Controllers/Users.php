<?php

namespace App\Controllers;

//Load Model
use App\Models\Sf_model;
use App\Models\Hf_model;
use App\Models\Ot_model;
use App\Models\Visitor_model;
//End Load Model

class Users extends BaseController{
    public function __construct(){
        helper('form', 'url', 'Url_helper');
        $this->form_validation = \Config\Services::validation();
    }

	public function index(){
		return redirect()->to(base_url('users/dashboard'));
	}

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
        // $web = new Web_model();
		$data = [
			'title'				=> 'Halaman Dashboard',
			'dashboard'			=> TRUE,
			'user_login'		=> $check_login
		];
		
		render_page('vote/layout','header', $data);
		render_content('vote','index', $data);
		render_page('vote/layout','footer', $data);
    }

    public function logout(){
        session()->destroy();
        return redirect()->to(base_url());
    }
}