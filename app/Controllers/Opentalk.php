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

class Opentalk extends BaseController{
    public function __construct(){
        helper('form', 'url', 'Url_helper');
        $this->form_validation = \Config\Services::validation();
    }

    public function forum(){
        $config = null;
		$session = \Config\Services::session($config);
		// Proteksi
		if($session->get('user_email') =="") {
			$session->setFlashdata('error_ot', 'Anda belum login');
			return redirect()->to(base_url()."/#ot");
		}
		// End proteksi
		$modelUser = new Ot_model();
        $modelForum = new Forum_model();
        $check_login = $modelUser->check_email($session->get('user_email'));

		$data = [
			'title'				=> 'Forum Open Talk',
			'dashboard'			=> TRUE,
            'forum'				=> $modelForum->listing(0, 'ot'),
			'user_login'		=> $check_login
		];
		
		render_page('ot/layout','header', $data);
		render_content('ot','forum', $data);
		render_page('ot/layout','footer', $data);
    }

    // Fungsi Logout
    public function logout(){
        session()->destroy();
        return redirect()->to(base_url());
    }
}