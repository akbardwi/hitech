<?php

namespace App\Controllers;

//Load Model
use App\Models\Sf_model;
use App\Models\Hf_model;
use App\Models\Ot_model;
//End Load Model

class Auth extends BaseController{
    public function __construct(){
        helper('form', 'url');
        $this->form_validation = \Config\Services::validation();
    }

    //Registrasi Software Fair
	public function register_sf(){
		$method = $_SERVER["REQUEST_METHOD"];
        if($method == "POST"){
            $category = filter_var($this->request->getVar('category'), FILTER_SANITIZE_STRING);
            $nama_app = filter_var($this->request->getVar('nama_app'), FILTER_SANITIZE_STRING);
            $nama_ketua = filter_var($this->request->getVar('nama_ketua'), FILTER_SANITIZE_STRING);
            $nim_ketua = filter_var($this->request->getVar('nim_ketua'), FILTER_SANITIZE_STRING);
            $nama_anggota = filter_var($this->request->getVar('nama_anggota'), FILTER_SANITIZE_STRING);
            $nim_anggota = filter_var($this->request->getVar('nim_anggota'), FILTER_SANITIZE_STRING);
            $nama_anggota2 = filter_var($this->request->getVar('nama_anggota2'), FILTER_SANITIZE_STRING);
            $nim_anggota2 = filter_var($this->request->getVar('nim_anggota2'), FILTER_SANITIZE_STRING);
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
                        'nama_anggota2' => $nama_anggota2,
                        'nim_anggota2'  => $nim_anggota2,
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
                session()->setFlashdata('inputs_sf', $this->request->getPost());
                session()->setFlashdata('error_sf', 'Mohon maaf, kuota pendaftaran sudah penuh.');
                return redirect()->to(base_url()."/#sf");
            }
        } else {
            return redirect()->to(base_url());
        }
	}

    //Registrasi Hardware Fair
    public function register_hf(){
		$method = $_SERVER["REQUEST_METHOD"];
        if($method == "POST"){
            $judul_alat = filter_var($this->request->getVar('judul_alat'), FILTER_SANITIZE_STRING);
            $nama_ketua = filter_var($this->request->getVar('nama_ketua_hf'), FILTER_SANITIZE_STRING);
            $nim_ketua = filter_var($this->request->getVar('nim_ketua_hf'), FILTER_SANITIZE_STRING);
            $nama_anggota = filter_var($this->request->getVar('nama_anggota_hf'), FILTER_SANITIZE_STRING);
            $nim_anggota = filter_var($this->request->getVar('nim_anggota_hf'), FILTER_SANITIZE_STRING);
            $nama_anggota2 = filter_var($this->request->getVar('nama_anggota2_hf'), FILTER_SANITIZE_STRING);
            $nim_anggota2 = filter_var($this->request->getVar('nim_anggota2_hf'), FILTER_SANITIZE_STRING);
            $kampus = filter_var($this->request->getVar('kampus_hf'), FILTER_SANITIZE_STRING);
            $link = filter_var($this->request->getVar('link_hf'), FILTER_SANITIZE_STRING);
            $wa = filter_var($this->request->getVar('wa_hf'), FILTER_SANITIZE_NUMBER_INT);
            $email = filter_var($this->request->getVar('email_hf'), FILTER_SANITIZE_EMAIL);

            $model 		= new Hf_model();
            $check_email= $model->check_email($email);
            $db      	= \Config\Database::connect();
            $hf  	    = $db->table('hf');
            if($hf->countAllResults() < 15){
                if($check_email){
                    session()->setFlashdata('error_hf', 'Email sudah terdaftar');
                    return redirect()->to(base_url()."/#hf");
                } else {
                    $hf = [
                        'judul_alat'    => $judul_alat,
                        'nama_ketua'    => $nama_ketua,
                        'nim_ketua'     => $nim_ketua,
                        'nama_anggota'  => $nama_anggota,
                        'nim_anggota'   => $nim_anggota,
                        'nama_anggota2' => $nama_anggota2,
                        'nim_anggota2'  => $nim_anggota2,
                        'kampus'        => $kampus,
                        'link'          => $link,
                        'wa'            => $wa,
                        'email'         => $email
                    ];
                    if($this->form_validation->run($hf, 'hf') == FALSE){
                        // mengembalikan nilai input yang sudah dimasukan sebelumnya
                        session()->setFlashdata('inputs_hf', $this->request->getPost());
                        // memberikan pesan error pada saat input data
                        session()->setFlashdata('errors_hf', $this->form_validation->getErrors());
                        return redirect()->to(base_url()."/#hf");
                    } else {
                        $batas = strtotime(date("26-02-2021 10:00:00"));
                        $sekarang = strtotime(date("d-m-Y H:i:s"));
                        if($batas >= $sekarang){
                            $model->tambah($hf);
							session()->setFlashdata('success_hf', 'Terima kasih telah mendaftar Hardware Fair. Nantikan informasi dari kami yang akan dikirim ke email Anda.');
							return redirect()->to(base_url()."/#hf");                       
                        } else {
                            session()->setFlashdata('inputs_hf', $this->request->getPost());
                            session()->setFlashdata('error_hf', 'Mohon maaf, waktu pendaftaran sudah ditutup.');
                            return redirect()->to(base_url()."/#hf");
                        }
                    }
                }
            } else {
                session()->setFlashdata('inputs_hf', $this->request->getPost());
                session()->setFlashdata('error_hf', 'Mohon maaf, kuota pendaftaran sudah penuh.');
                return redirect()->to(base_url()."/#hf");
            }
        } else {
            return redirect()->to(base_url());
        }
	}

    //Registrasi Open Talk
    public function register_ot(){
		$method = $_SERVER["REQUEST_METHOD"];
        if($method == "POST"){
            $otCategory = filter_var($this->request->getVar('otCategory'), FILTER_SANITIZE_STRING);
            $nama_ot = filter_var($this->request->getVar('nama_ot'), FILTER_SANITIZE_STRING);
            $kampus_ot = filter_var($this->request->getVar('kampus_ot'), FILTER_SANITIZE_STRING);
            $nim_ot = filter_var($this->request->getVar('nim_ot'), FILTER_SANITIZE_STRING);
            $wa_ot = filter_var($this->request->getVar('wa_ot'), FILTER_SANITIZE_NUMBER_INT);
            $email_ot = filter_var($this->request->getVar('email_ot'), FILTER_SANITIZE_EMAIL);

            $model 		= new ot_model();
            $check_email= $model->check_email($email_ot);
            $db      	= \Config\Database::connect();
            $ot  	    = $db->table('ot');
            if($ot->countAllResults() < 100){
                if($check_email){
                    session()->setFlashdata('error_ot', 'Email sudah terdaftar');
                    // mengembalikan nilai input yang sudah dimasukan sebelumnya
                    session()->setFlashdata('inputs_ot', $this->request->getPost());
                    return redirect()->to(base_url()."/#ot");
                } else {
                    if($otCategory == "Mahasiswa"){
                        $ot = [
                            'kategori'      => $otCategory,
                            'nama'          => $nama_ot,
                            'kampus'        => $kampus_ot,
                            'nim'           => $nim_ot,
                            'wa'            => $wa_ot,
                            'email'         => $email_ot
                        ];

                        $valid = "otMhs";
                    } else {
                        $ot = [
                            'kategori'      => $otCategory,
                            'nama'          => $nama_ot,
                            'wa'            => $wa_ot,
                            'email'         => $email_ot
                        ];

                        $valid = "otUmum";
                    }
                    
                    if($this->form_validation->run($ot, $valid) == FALSE){
                        // mengembalikan nilai input yang sudah dimasukan sebelumnya
                        session()->setFlashdata('inputs_ot', $this->request->getPost());
                        // memberikan pesan error pada saat input data
                        session()->setFlashdata('errors_ot', $this->form_validation->getErrors());
                        return redirect()->to(base_url()."/#ot");
                    } else {
                        $batas = strtotime(date("26-02-2021 10:00:00"));
                        $sekarang = strtotime(date("d-m-Y H:i:s"));
                        if($batas >= $sekarang){
                            $model->tambah($ot);
							session()->setFlashdata('success_ot', 'Terima kasih telah mendaftar Open Talk. Nantikan informasi dari kami yang akan dikirim ke email Anda.');
							return redirect()->to(base_url()."/#ot");                       
                        } else {
                            session()->setFlashdata('inputs_ot', $this->request->getPost());
                            session()->setFlashdata('error_ot', 'Mohon maaf, waktu pendaftaran sudah ditutup.');
                            return redirect()->to(base_url()."/#ot");
                        }
                    }
                }
            } else {
                session()->setFlashdata('inputs_ot', $this->request->getPost());
                session()->setFlashdata('error_ot', 'Mohon maaf, kuota pendaftaran sudah penuh.');
                return redirect()->to(base_url()."/#ot");
            }
        } else {
            return redirect()->to(base_url());
        }
	}
}
