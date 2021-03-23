<?php namespace App\Models;

use CodeIgniter\Model;

class Feedback_model extends Model{
    protected $table 		= 'feedback';
	protected $primaryKey 	= 'id';
    protected $allowedFields = ['email',
								'pesan', 
                                'kesan'];

    // Listing
	public function listing(){
		$this->select('*');
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