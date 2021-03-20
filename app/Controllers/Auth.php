<?php

namespace App\Controllers;

//Load Model
use App\Models\Sf_model;
use App\Models\Hf_model;
use App\Models\Ot_model;
use App\Models\Visitor_model;
use App\Models\Admin_model;
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
            $tim = filter_var($this->request->getVar('tim'), FILTER_SANITIZE_STRING);
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
            $modelHF	= new Hf_model();
            $check_email= $model->check_email($email);
            $db      	= \Config\Database::connect();
            $sf  	    = $db->table('sf');
            $userSF     = count($model->listing());
            $userHF     = count($modelHF->listing());
            $jml        = $userSF+$userHF;
            // if($sf->countAllResults() < 15){
            if($jml < 15){
                if($check_email){
                    session()->setFlashdata('error_sf', 'Email sudah terdaftar');
                    return redirect()->to(base_url()."/#sf");
                } else {
                    $sf = [
                        'tim'           => $tim,
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
                        $batas = strtotime(date("29-03-2021 23:59:59"));
                        $sekarang = strtotime(date("d-m-Y H:i:s"));
                        if($batas >= $sekarang){
                            $email_smtp = \Config\Services::email();
                            $email_smtp->setFrom("hmti@orma.dinus.ac.id", "HMTI UDINUS");
                            $email_smtp->setTo("$email");
                            $email_smtp->setSubject("Konfirmasi Pendaftaran Developer HI TECH 2021");
                            $email_smtp->setMessage("<div>Halo, Tim $tim</div><div><br /></div><div>Terimakasih telah mendaftar sebagai developer di acara Hi-technology. Untuk para tim developer diharapkan untuk bergabung kedalam whatsapp group agar mendapatkan informasi-informasi terbaru.</div><div>Berikut link whatsapp group :</div><div><br />https://chat.whatsapp.com/CtJBWZtWbwB3hLVHAZyYx2</div><div><br /></div><div>Salam, Hi-technology 2021</div>");
                            $kirim = $email_smtp->send();
                            if($kirim){
                                $model->tambah($sf);
                                session()->setFlashdata('success_sf', 'Terima kasih telah mendaftar Software Fair.  Silahkan cek inbox/spam pada email Anda untuk informasil lebih lanjut.');
                                return redirect()->to(base_url()."/#sf");
                            } else {
                                session()->setFlashdata('error_sf', 'Pendaftaran gagal, silahkan hubungi panitia.');
                                return redirect()->to(base_url()."/#sf");
                            }
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
            $tim = filter_var($this->request->getVar('tim_hf'), FILTER_SANITIZE_STRING);
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
            $modelSF	= new Sf_model();
            $check_email= $model->check_email($email);
            $db      	= \Config\Database::connect();
            $hf  	    = $db->table('hf');
            $userSF     = count($modelSF->listing());
            $userHF     = count($model->listing());
            $jml        = $userSF+$userHF;
            // if($hf->countAllResults() < 15){
            if($jml < 15){
                if($check_email){
                    session()->setFlashdata('error_hf', 'Email sudah terdaftar');
                    return redirect()->to(base_url()."/#hf");
                } else {
                    $hf = [
                        'tim'           => $tim,
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
                        $batas = strtotime(date("29-03-2021 23:59:59"));
                        $sekarang = strtotime(date("d-m-Y H:i:s"));
                        if($batas >= $sekarang){
                            $email_smtp = \Config\Services::email();
                            $email_smtp->setFrom("hmti@orma.dinus.ac.id", "HMTI UDINUS");
                            $email_smtp->setTo("$email");
                            $email_smtp->setSubject("Konfirmasi Pendaftaran Developer HI TECH 2021");
                            $email_smtp->setMessage("<div>Halo, Tim $tim</div><div><br /></div><div>Terimakasih telah mendaftar sebagai developer di acara Hi-technology. Untuk para tim developer diharapkan untuk bergabung kedalam whatsapp group agar mendapatkan informasi-informasi terbaru.</div><div>Berikut link whatsapp group :</div><div><br />https://chat.whatsapp.com/CtJBWZtWbwB3hLVHAZyYx2</div><div><br /></div><div>Salam, Hi-technology 2021</div>");
                            $kirim = $email_smtp->send();
                            if($kirim){
                                $model->tambah($hf);
                                session()->setFlashdata('success_hf', 'Terima kasih telah mendaftar Hardware Fair.  Silahkan cek inbox/spam pada email Anda untuk informasil lebih lanjut.');
                                return redirect()->to(base_url()."/#hf");
                            } else {
                                session()->setFlashdata('error_hf', 'Pendaftaran gagal, silahkan hubungi panitia.');
                                return redirect()->to(base_url()."/#hf");
                            }                       
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
            if($ot->countAllResults() < 200){
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
                            'kampus'        => "",
                            'nim'           => "",
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
                        $batas = strtotime(date("29-03-2021 23:59:59"));
                        $sekarang = strtotime(date("d-m-Y H:i:s"));
                        if($batas >= $sekarang){
                            $email_smtp = \Config\Services::email();
                            $email_smtp->setFrom("hmti@orma.dinus.ac.id", "HMTI UDINUS");
                            $email_smtp->setTo("$email_ot");
                            $email_smtp->setSubject("Konfirmasi Pendaftaran Open Talk HI TECH 2021");
                            $email_smtp->setMessage("<div>Halo, $nama_ot</div><div><br /></div><div>Terimakasih telah mendaftar Open Talk di acara Hi-technology. Untuk para peserta diharapkan untuk bergabung kedalam whatsapp group agar mendapatkan informasi-informasi terbaru.</div><div>Berikut link whatsapp group :</div><div><br />https://chat.whatsapp.com/JrFMLbsC23pLR19QLFy2AJ</div><div><br /></div><div>Salam, Hi-technology 2021</div>");
                            $kirim = $email_smtp->send();
                            if($kirim){
                                $model->tambah($ot);
                                session()->setFlashdata('success_ot', 'Terima kasih telah mendaftar Open Talk.  Silahkan cek inbox/spam pada email Anda untuk informasil lebih lanjut.');
                                return redirect()->to(base_url()."/#ot");
                            } else {
                                session()->setFlashdata('error_ot', 'Pendaftaran gagal, silahkan hubungi panitia.');
                                return redirect()->to(base_url()."/#ot");
                            }                       
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

    //Registrasi Pengunjung
    public function register(){
		$method = $_SERVER["REQUEST_METHOD"];
        if($method == "POST"){
            $nama = filter_var($this->request->getVar('reg_name'), FILTER_SANITIZE_STRING);
            $email = filter_var($this->request->getVar('reg_email'), FILTER_SANITIZE_EMAIL);
            $pass = filter_var($this->request->getVar('reg_pass'), FILTER_SANITIZE_STRING);

            $model 		= new Visitor_model();
            $check_email= $model->check_email($email);
            $db      	= \Config\Database::connect();
            $visitor  	= $db->table('visitor');
            if($visitor->countAllResults() < 300){
                if($check_email){
                    session()->setFlashdata('error_visitors', 'Email sudah terdaftar');
                    // mengembalikan nilai input yang sudah dimasukan sebelumnya
                    session()->setFlashdata('inputs_visitors', $this->request->getPost());
                    return redirect()->to(base_url()."/#pengunjung");
                } else {
                    $visitor = [
                        'nama'          => $nama,
                        'email'         => $email,
                        'pass'          => $pass
                    ];
                    
                    if($this->form_validation->run($visitor, "visitor") == FALSE){
                        // mengembalikan nilai input yang sudah dimasukan sebelumnya
                        session()->setFlashdata('inputs_visitors', $this->request->getPost());
                        // memberikan pesan error pada saat input data
                        session()->setFlashdata('errors_visitors', $this->form_validation->getErrors());
                        return redirect()->to(base_url()."/#pengunjung");
                    } else {
                        $batas = strtotime(date("29-03-2021 23:59:59"));
                        $sekarang = strtotime(date("d-m-Y H:i:s"));
                        if($batas >= $sekarang){
                            $karakter = '0123456789abcdefghijklmnopqrstuvwxyz';
                            $kode = substr(str_shuffle($karakter), 0, 25);
                            $email_smtp = \Config\Services::email();
                            $email_smtp->setFrom("hmti@orma.dinus.ac.id", "HMTI UDINUS");
                            $email_smtp->setTo("$email");
                            $email_smtp->setSubject("Verifikasi Akun Pengunjung HI TECH 2021");
                            $email_smtp->setMessage('Terima kasih telah mendaftar sebagai pengunjung HI TECH 2021. Silahkan verifikasi akun Anda dengan klik <a href="'.base_url("verification-email/$kode").'">disini</a>&nbsp;atau bisa copy paste link berikut: '.base_url("verification-email/$kode"));
                            $kirim = $email_smtp->send();
                            if($kirim){
                                $data = [
                                    'fullname'      => $nama,
                                    'email'         => $email,
                                    'password'      => password_hash($pass, PASSWORD_DEFAULT),
                                    'status'        => 0,
                                    'vote'          => 0,
                                    'verif_code'    => $kode
                                ];
                                
                                $model->tambah($data);
                                session()->setFlashdata('success_visitors', 'Terima kasih telah mendaftar sebagai pengunjung. Silahkan cek inbox/spam pada email Anda untuk informasil lebih lanjut.');
                                return redirect()->to(base_url()."/#pengunjung");
                            } else {
                                session()->setFlashdata('error_visitors', 'Gagal, silahkan coba lagi.');
                                return redirect()->to(base_url()."/#pengunjung"); 
                            }                                                
                        } else {
                            session()->setFlashdata('inputs_visitors', $this->request->getPost());
                            session()->setFlashdata('error_visitors', 'Mohon maaf, waktu pendaftaran sudah ditutup.');
                            return redirect()->to(base_url()."/#pengunjung");
                        }
                    }
                }
            } else {
                session()->setFlashdata('inputs_visitors', $this->request->getPost());
                session()->setFlashdata('error_visitors', 'Mohon maaf, kuota pendaftaran sudah penuh.');
                return redirect()->to(base_url()."/#pengunjung");
            }
        } else {
            return redirect()->to(base_url());
        }
	}

    //Proses Login Visitor
    public function login(){
        $method = $_SERVER["REQUEST_METHOD"];
        if($method == "POST"){
            $email = filter_var($this->request->getVar('logemail'), FILTER_SANITIZE_EMAIL);
            $pass = filter_var($this->request->getVar('logpass'), FILTER_SANITIZE_STRING);

            $visitor = [
                'email'         => $email,
                'pass'          => $pass
            ];
            
            if($this->form_validation->run($visitor, "login_visitor") == FALSE){
                // mengembalikan nilai input yang sudah dimasukan sebelumnya
                session()->setFlashdata('inputs_visitors', $this->request->getPost());
                // memberikan pesan error pada saat input data
                session()->setFlashdata('errors_visitors', $this->form_validation->getErrors());
                return redirect()->to(base_url()."/#pengunjung");
            } else {
                $model 		= new Visitor_model();
                $check_user = $model->check_email($email);
                if($check_user){
                    if(password_verify($pass, $check_user['password'])){
                        if($check_user['status'] == 0){
                            session()->setFlashdata('error_visitors', 'Silahkan cek inbox/spam email untuk verifikasi terlebih dahulu.');
                            return redirect()->to(base_url()."/#pengunjung");
                        } else {
                            session()->set('user_email',$check_user['email']);
                            session()->set('cat_dev','visitor');
                            session()->set('user_type','visitor');
                            return redirect()->to(base_url("users/dashboard"));
                        }
                    } else {
                        session()->setFlashdata('inputs_visitors', $this->request->getPost());
                        session()->setFlashdata('error_visitors', 'Password salah.');
                        return redirect()->to(base_url()."/#pengunjung");
                    }
                } else {
                    session()->setFlashdata('inputs_visitors', $this->request->getPost());
                    session()->setFlashdata('error_visitors', 'Email tidak ditemukan.');
                    return redirect()->to(base_url()."/#pengunjung");
                }
            }
        } else {
            return redirect()->to(base_url());
        }
    }

    // Verifikasi Email Pengunjung
    public function verification_email($code){
        $model 		= new Visitor_model();
        $data_user  = $model->check_code($code);
        $db      	= \Config\Database::connect();
        $visitor  	= $db->table('visitor');

        if($data_user){
            $email  = $data_user['email'];
            $nama   = $data_user['fullname'];
            $query = $db->query("UPDATE visitor SET status = '1', verif_code = '' WHERE email = '$email'");
            if($query){
                $email_smtp = \Config\Services::email();
                $email_smtp->setFrom("hmti@orma.dinus.ac.id", "HMTI UDINUS");
                $email_smtp->setTo("$email");
                $email_smtp->setSubject("Konfirmasi Pendaftaran Pengunjung HI TECH 2021");
                $email_smtp->setMessage("<div>Halo, $nama</div><div><br /></div><div>Terimakasih telah mendaftar sebagai pengunjung di acara Hi-technology. Untuk para peserta diharapkan untuk bergabung kedalam whatsapp group agar mendapatkan informasi-informasi terbaru.</div><div>Berikut link whatsapp group :</div><div><br />https://chat.whatsapp.com/HH0P9ffhJd51Vmb8hoGdIZ</div><div><br /></div><div>Salam, Hi-technology 2021</div>");
                $kirim = $email_smtp->send();
                session()->setFlashdata('success_visitors', 'Email berhasil diverifikasi.');
                return redirect()->to(base_url()."/#pengunjung"); 
            } else {
                session()->setFlashdata('error_visitors', 'Email gagal diverifikasi.');
                return redirect()->to(base_url()."/#pengunjung");
            }
        } else {
            session()->setFlashdata('error_visitors', 'Kode verifikasi tidak ditemukan/sudah dipakai.');
            return redirect()->to(base_url()."/#pengunjung");
        }
    }

    //Request Token Login Developer
    public function loginDev(){
        $method = $_SERVER["REQUEST_METHOD"];
        if($method == "POST"){
            $catDev = filter_var($this->request->getVar('category'), FILTER_SANITIZE_STRING);
            $email = filter_var($this->request->getVar('emailDev'), FILTER_SANITIZE_EMAIL);

            $dev = [
                'catDev'        => $catDev,
                'email'         => $email
            ];
            
            if($this->form_validation->run($dev, "login_dev") == FALSE){
                // mengembalikan nilai input yang sudah dimasukan sebelumnya
                // session()->setFlashdata('inputs_visitors', $this->request->getPost());
                // memberikan pesan error pada saat input data
                if($catDev == "sfDev"){
                    session()->setFlashdata('errors_sf', $this->form_validation->getErrors());
                    return redirect()->to(base_url()."/#sf");
                } else if($catDev == "hfDev"){
                    session()->setFlashdata('errors_hf', $this->form_validation->getErrors());
                    return redirect()->to(base_url()."/#hf");
                } else {
                    session()->setFlashdata('errors_sf', $this->form_validation->getErrors());
                    return redirect()->to(base_url()."/#sf");
                }
            } else {
                $modelSF 	= new Sf_model();
                $modelHF 	= new Hf_model();
                $db      	= \Config\Database::connect();
                if($catDev == "sfDev"){
                    $check_user = $modelSF->check_email($email);
                    if($check_user){
                        if($check_user['bayar'] == 0){
                            session()->setFlashdata('error_sf', 'Dimohon untuk menyelesaikan administrasi terlebih dahulu.');
                            return redirect()->to(base_url()."/#sf");
                        }
                        $karakter = '0123456789abcdefghijklmnopqrstuvwxyz';
                        $kode = substr(str_shuffle($karakter), 0, 30);
                        $email_smtp = \Config\Services::email();
                        $email_smtp->setFrom("hmti@orma.dinus.ac.id", "HMTI UDINUS");
                        $email_smtp->setTo("$email");
                        $email_smtp->setSubject("Login Developer HI TECH 2021");
                        $email_smtp->setMessage('Hai, Developer. <br /> Silahkan klik <a href="'.base_url("autologin/sf/$kode").'">disini</a>&nbsp; untuk login atau bisa copy paste link berikut: '.base_url("autologin/sf/$kode"));
                        $kirim = $email_smtp->send();
                        if($kirim){
                            $query = $db->query("UPDATE sf SET verif_code = '$kode' WHERE email = '$email'");
                            if($query){
                                session()->setFlashdata('success_sf', 'Silahkan cek email untuk login.');
                                return redirect()->to(base_url()."/#sf");
                            } else {
                                session()->setFlashdata('error_sf', 'Gagal update kode, silahkan coba lagi.');
                                return redirect()->to(base_url()."/#sf");
                            }
                        } else {
                            session()->setFlashdata('error_sf', 'Email gagal dikirim, silahkan coba lagi.');
                            return redirect()->to(base_url()."/#sf");
                        }
                    } else {
                        // session()->setFlashdata('inputs_sf', $this->request->getPost());
                        session()->setFlashdata('error_sf', 'Email tidak ditemukan.');
                        return redirect()->to(base_url()."/#sf");
                    }
                } else {
                    $check_user = $modelHF->check_email($email);
                    if($check_user['bayar'] == 0){
                        session()->setFlashdata('error_hf', 'Dimohon untuk menyelesaikan administrasi terlebih dahulu.');
                        return redirect()->to(base_url()."/#hf");
                    }
                    if($check_user){
                        $karakter = '0123456789abcdefghijklmnopqrstuvwxyz';
                        $kode = substr(str_shuffle($karakter), 0, 30);
                        $email_smtp = \Config\Services::email();
                        $email_smtp->setFrom("hmti@orma.dinus.ac.id", "HMTI UDINUS");
                        $email_smtp->setTo("$email");
                        $email_smtp->setSubject("Login Developer HI TECH 2021");
                        $email_smtp->setMessage('Hai, Developer. <br /> Silahkan klik <a href="'.base_url("autologin/hf/$kode").'">disini</a>&nbsp; untuk login atau bisa copy paste link berikut: '.base_url("autologin/hf/$kode"));
                        $kirim = $email_smtp->send();
                        if($kirim){
                            $query = $db->query("UPDATE hf SET verif_code = '$kode' WHERE email = '$email'");
                            if($query){
                                session()->setFlashdata('success_hf', 'Silahkan cek email untuk login.');
                                return redirect()->to(base_url()."/#hf");
                            } else {
                                session()->setFlashdata('error_hf', 'Gagal update kode, silahkan coba lagi.');
                                return redirect()->to(base_url()."/#hf");
                            }
                        } else {
                            session()->setFlashdata('error_hf', 'Email gagal dikirim, silahkan coba lagi.');
                            return redirect()->to(base_url()."/#hf");
                        }
                    } else {
                        // session()->setFlashdata('inputs_hf', $this->request->getPost());
                        session()->setFlashdata('error_hf', 'Email tidak ditemukan.');
                        return redirect()->to(base_url()."/#hf");
                    }
                }
            }
        } else {
            return redirect()->to(base_url());
        }
    }

    //Proses Auto Login Developer
    public function autoLoginDev($type, $kode){
        if($type == "sf"){
            $db      	= \Config\Database::connect();
            $model      = new Sf_model();
            $dataUser   = $model->check_login($kode);
            if($dataUser){
                $query = $db->query("UPDATE sf SET verif_code = '' WHERE verif_code = '$kode'");
                session()->set('user_email',$dataUser['email']);
                session()->set('cat_dev','sf');
                session()->set('user_type','developer');
                return redirect()->to(base_url("users/dashboard"));
            } else {
                session()->setFlashdata('error_sf', 'Link login tidak valid, silahkan coba lagi.');
                return redirect()->to(base_url()."/#sf");
            }            
        } else if($type == "hf"){
            $db      	= \Config\Database::connect();
            $model      = new Hf_model();
            $dataUser   = $model->check_login($kode);
            if($dataUser){
                $query = $db->query("UPDATE hf SET verif_code = '' WHERE verif_code = '$kode'");
                session()->set('user_email',$dataUser['email']);
                session()->set('cat_dev','hf');
                session()->set('user_type','developer');
                return redirect()->to(base_url("users/dashboard"));
            } else {
                session()->setFlashdata('error_hf', 'Link login tidak valid, silahkan coba lagi.');
                return redirect()->to(base_url()."/#hf");
            }  
        } else {
            return redirect()->to(base_url());
        }
    }

    // Proses Login Admin
    public function loginAdm(){
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "POST"){
            $username = filter_var($this->request->getVar('username'), FILTER_SANITIZE_STRING);
            $password = filter_var($this->request->getVar('password'), FILTER_SANITIZE_STRING);
            
            $login = [
                'username'  => $username,
                'password'  => $password
            ];

            if($this->form_validation->run($login, "login_admin") == FALSE){
                // mengembalikan nilai input yang sudah dimasukan sebelumnya
                session()->setFlashdata('inputs', $this->request->getPost());
                // memberikan pesan error pada saat input data
                session()->setFlashdata('errors', $this->form_validation->getErrors());
                return redirect()->to(base_url("admin/login"));
            } else {
                $model      = new Admin_model();
                $check_user = $model->check_username($username);
                if($check_user){
                    if(password_verify($password, $check_user['password'])){
                        session()->set('user_email',$check_user['username']);
                        session()->set('cat_dev','admin');
                        session()->set('user_type','admin');
                        return redirect()->to(base_url("admin/dashboard"));
                    } else {
                        session()->setFlashdata('error', 'Password salah.');
                        return redirect()->to(base_url("admin/login"));
                    }
                } else {
                    session()->setFlashdata('error', 'User tidak ditemukan.');
                    return redirect()->to(base_url("admin/login"));
                }
            }
        } else {
            return redirect()->to(base_url("admin/login"));
        }
    }
}
