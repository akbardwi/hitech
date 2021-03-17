<?php

namespace App\Controllers;

//Load Model
use App\Models\Sf_model;
use App\Models\Hf_model;
use App\Models\Ot_model;
use App\Models\Visitor_model;
use App\Models\Vote_model;
use App\Models\Admin_model;
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
			$session->setFlashdata('error_visitors', 'Anda belum login');
			return redirect()->to(base_url()."/#pengunjung");
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
			$session->setFlashdata('error_visitors', 'Anda belum login');
			return redirect()->to(base_url()."/#pengunjung");
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
}