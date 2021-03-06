<?php namespace App\Models;

use CodeIgniter\Model;

class Vote_model extends Model{
    protected $table 		= 'vote';
	protected $primaryKey 	= 'id';
    protected $allowedFields = ['dev', 
                                'id_dev', 
                                'email_visitor',
								'star'];

    // Listing
	public function listing(){
		$this->select('*');
		$this->orderBy("id", "DESC");
		$query = $this->get();
		return $query->getResultArray();
	}

	// Check Vote
	public function check_vote($id_dev, $type_dev, $email_visitor){
		$this->select('*');
		$this->where(['id_dev' => $id_dev, 'dev' => $type_dev, 'email_visitor' => $email_visitor]);
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