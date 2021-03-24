<?php namespace App\Models;

use CodeIgniter\Model;

class Hf_model extends Model{
    protected $table 		= 'hf';
	protected $primaryKey 	= 'id';
    protected $allowedFields = ['tim',
								'judul_alat',
                                'nama_ketua',
                                'nim_ketua',
                                'nama_anggota',
                                'nim_anggota',
								'nama_anggota2',
                                'nim_anggota2',
								'kampus',
                                'link',
                                'wa',
                                'email',
								'logo',
								'suara'];

    // Listing
	public function listing(){
		$this->select('*');
		$this->orderBy("id", "DESC");
		$query = $this->get();
		return $query->getResultArray();
	}

	// Dev Lunas
	public function lunas(){
		$this->select('*');
		$this->orderBy("id", "DESC");
		$this->where(['bayar' => 1]);
		$query = $this->get();
		return $query->getResultArray();
	}

	// Quick Count
	public function qc(){
		$this->select('*');
		$this->orderBy("suara", "DESC");
		$query = $this->get();
		return $query->getResultArray();
	}
	
	// Count
	public function hitung(){
		$this->select('*');
		$query = $this->get();
		return $query->countAllResults();
    }
    
    //Cek Email
    public function check_email($email){
        $this->select("*");
        $this->where(['email' => $email]);
        $query = $this->get();
		return $query->getRowArray();
    }

	//Cek Login
    public function check_login($kode){
        $this->select("*");
        $this->where(['verif_code' => $kode]);
        $query = $this->get();
		return $query->getRowArray();
    }

	//Tambah
	public function tambah($data){
		$this->save($data);
	}

	//Read
    public function read($id){
		$this->select('*');
		$this->where(['id' => $id]);
		$query = $this->get();
		return $query->getRowArray();
	}
}