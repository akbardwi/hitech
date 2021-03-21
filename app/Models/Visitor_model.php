<?php namespace App\Models;

use CodeIgniter\Model;

class Visitor_model extends Model{
    protected $table 		= 'visitor';
	protected $primaryKey 	= 'id';
    protected $allowedFields = ['fullname',
                                'email',
                                'password',
								'status',
								'vote',
								'point',
								'verif_code'];

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

	//Cek Kode
    public function check_code($code){
        $this->select("*");
        $this->where(['verif_code' => $code]);
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