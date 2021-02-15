<?php namespace App\Models;

use CodeIgniter\Model;

class Sf_model extends Model{
    protected $table 		= 'sf';
	protected $primaryKey 	= 'id';
    protected $allowedFields = ['kat_app', 
                                'nama_app', 
                                'nama_ketua',
                                'nim_ketua',
                                'nama_anggota',
                                'nim_anggota',
								'kampus',
                                'link_gdrive',
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
    
    //Cek NISN
    public function check_email($email){
        $this->select("*");
        $this->where(['email' => $email]);
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