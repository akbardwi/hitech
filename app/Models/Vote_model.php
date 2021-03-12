<?php namespace App\Models;

use CodeIgniter\Model;

class Vote_model extends Model{
    protected $table 		= 'vote';
	protected $primaryKey 	= 'id';
    protected $allowedFields = ['dev', 
                                'id_dev', 
                                'email_visitor',
                                'kesan',
                                'pesan'];

    // Listing
	public function listing(){
		$this->select('*');
		$this->orderBy("id", "DESC");
		$query = $this->get();
		return $query->getResultArray();
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