<?php namespace App\Models;

use CodeIgniter\Model;

class Ot_model extends Model{
    protected $table 		= 'ot';
	protected $primaryKey 	= 'id';
    protected $allowedFields = ['kategori',
                                'nama',
								'kampus',
                                'nim',
                                'wa',
                                'email'];

    // Listing
	public function listing(){
		$this->select('*');
		$this->orderBy("id", "DESC");
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