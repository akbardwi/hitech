<?php namespace App\Models;

use CodeIgniter\Model;

class Forum_model extends Model{
    protected $table 		= 'forum';
	protected $primaryKey 	= 'id';
    protected $allowedFields = ['id_dev',
								'id_visitor', 
                                'type_dev', 
                                'nama',
                                'type_user',
                                'reply_to',
                                'comment',
                                'rate',
                                'point'];

    // Listing
	public function listing($id){
		$this->select('*');
		$this->where(['id_dev' => $id]);
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