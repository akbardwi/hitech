<?php

namespace App\Controllers;

//Load Model
use App\Models\Sf_model;
//End Load Model

class Auth extends BaseController{
    public function __construct(){
        helper('form', 'url');
        $this->form_validation = \Config\Services::validation();
    }

	public function register_sf(){
		$method = $_SERVER["REQUEST_METHOD"];
        if($method == "POST"){
            $category = filter_var($this->request->getVar('category'), FILTER_SANITIZE_STRING);
            $nama_app = filter_var($this->request->getVar('nama_app'), FILTER_SANITIZE_STRING);
            $nama_ketua = filter_var($this->request->getVar('nama_ketua'), FILTER_SANITIZE_STRING);
            $nim_ketua = filter_var($this->request->getVar('nim_ketua'), FILTER_SANITIZE_STRING);
            $nama_anggota = filter_var($this->request->getVar('nama_anggota'), FILTER_SANITIZE_STRING);
            $nim_anggota = filter_var($this->request->getVar('nim_anggota'), FILTER_SANITIZE_STRING);
            $kampus = filter_var($this->request->getVar('kampus'), FILTER_SANITIZE_STRING);
            $link = filter_var($this->request->getVar('link'), FILTER_SANITIZE_STRING);
            $wa = filter_var($this->request->getVar('wa'), FILTER_SANITIZE_NUMBER_INT);
            $email = filter_var($this->request->getVar('email'), FILTER_SANITIZE_EMAIL);

            $model 		= new Sf_model();
            $check_email= $model->check_email($email);
            $db      	= \Config\Database::connect();
            $sf  	    = $db->table('sf');
            if($sf->countAllResults() < 15){
                if($check_email){
                    session()->setFlashdata('error_sf', 'Email sudah terdaftar');
                    return redirect()->to(base_url()."/#sf");
                } else {
                    $sf = [
                        'category'      => $category,
                        'nama_app'      => $nama_app,
                        'nama_ketua'    => $nama_ketua,
                        'nim_ketua'     => $nim_ketua,
                        'nama_anggota'  => $nama_anggota,
                        'nim_anggota'   => $nim_anggota,
                        'kampus'        => $kampus,
                        'link'          => $link,
                        'wa'            => $wa,
                        'email'         => $email
                    ];
                    if($this->form_validation->run($sf, 'sf') == FALSE){
                        // mengembalikan nilai input yang sudah dimasukan sebelumnya
                        session()->setFlashdata('inputs_sf', $this->request->getPost());
                        // memberikan pesan error pada saat input data
                        session()->setFlashdata('errors_sf', $this->form_validation->getErrors());
                        return redirect()->to(base_url()."/#sf");
                    } else {
                        $batas = strtotime(date("26-02-2021 10:00:00"));
                        $sekarang = strtotime(date("d-m-Y H:i:s"));
                        if($batas >= $sekarang){
                            $model->tambah($sf);
							session()->setFlashdata('success_sf', 'Terima kasih telah mendaftar Software Fair. Nantikan informasi dari kami yang akan dikirim ke email Anda.');
							return redirect()->to(base_url()."/#sf");                       
                        } else {
                            session()->setFlashdata('inputs_sf', $this->request->getPost());
                            session()->setFlashdata('error_sf', 'Mohon maaf, waktu pendaftaran sudah ditutup.');
                            return redirect()->to(base_url()."/#sf");
                        }
                    }
                }
            } else {
                session()->setFlashdata('inputs', $this->request->getPost());
                session()->setFlashdata('error', 'Mohon maaf, kuota pendaftaran sudah penuh.');
                return redirect()->to(base_url()."/#sf");
            }
        } else {
            return redirect()->to(base_url());
        }
	}
}
