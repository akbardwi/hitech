<?php namespace App\Models;

use CodeIgniter\Model;

class Admin_model extends Model{
    protected $table 		= 'admin';
	protected $primaryKey 	= 'id';
    protected $allowedFields = ['username',
                                'password',
                                'nama'];

    // Listing
	public function listing(){
		$this->select('*');
		$this->orderBy("id", "DESC");
		$query = $this->get();
		return $query->getResultArray();
	}
    
    //Cek User
    public function check_username($user){
        $this->select("*");
        $this->where(['username' => $user]);
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