<?php namespace App\Models;

use CodeIgniter\Model;

class Forum_model extends Model{
    protected $table 		= 'forum';
	protected $primaryKey 	= 'id';
    protected $allowedFields = ['id_dev',
								'id_visitor', 
                                'type_dev', 
                                'reply_to',
                                'text',
                                'coin',
                                'point'];

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