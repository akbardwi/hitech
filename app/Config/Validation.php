<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	//Validasi Login Admin
	public $login = [
		'username' => 'required',
		'password' => 'required'
	];	 
	public $login_errors = [
		'username' => [
			'required'      => 'Username wajib diisi'
		],
		'password' => [
			'required'      => 'Password wajib diisi'
		]
	];
	
	//Validasi Daftar SF
	public $sf = [
		'tim'			=> 'required',
		'category' 		=> 'required',
		'nama_app'		=> 'required',
		'nama_ketua'	=> 'required',
		'nim_ketua'		=> 'required',
		'nama_anggota'	=> 'required',
		'nim_anggota'	=> 'required',
		'kampus'	 	=> 'required',
		'link'	 		=> 'required',
		'wa'			=> [
			'required',
			'is_natural'
		],
		'email'			=> [
			'required',
			'valid_email'
		],
	];	 
	public $sf_errors = [
		'tim' 		=> [
			'required'      => 'Nama Tim wajib diisi'
		],
		'category' 		=> [
			'required'      => 'Kategori wajib diisi'
		],
		'nama_app' 		=> [
			'required'      => 'Nama Aplikasi wajib diisi'
		],
		'nama_ketua' 	=> [
			'required'      => 'Nama Ketua wajib diisi'
		],
		'nim_ketua' 	=> [
			'required'      => 'NIM Ketua wajib diisi'
		],
		'nama_anggota' 	=> [
			'required'      => 'Nama Anggota wajib diisi'
		],
		'nim_anggota' 	=> [
			'required'      => 'NIM Anggota wajib diisi'
		],
		'kampus' 		=> [
			'required'      => 'Asal Kampus wajib diisi'
		],
		'link' 			=> [
			'required'      => 'Link Google Drive wajib diisi'
		],
		'wa'			=> [
			'required'		=> 'No. Wa wajib diisi',
			'is_natural'	=> 'No. Wa hanya bisa diisi bilangan bulat'
		],
		'email'			=> [
			'required'		=> 'Email wajib diisi',
			'valid_email'	=> 'Masukkan Email yang valid'
		]
	];

	//Validasi Daftar HF
	public $hf = [
		'tim'			=> 'required',
		'judul_alat'	=> 'required',
		'nama_ketua'	=> 'required',
		'nim_ketua'		=> 'required',
		'nama_anggota'	=> 'required',
		'nim_anggota'	=> 'required',
		'kampus'	 	=> 'required',
		'link'	 		=> 'required',
		'wa'			=> [
			'required',
			'is_natural'
		],
		'email'			=> [
			'required',
			'valid_email'
		],
	];	 
	public $hf_errors = [
		'tim' 		=> [
			'required'      => 'Nama Tim wajib diisi'
		],
		'judul_alat'	=> [
			'required'      => 'Judul Alat wajib diisi'
		],
		'nama_ketua' 	=> [
			'required'      => 'Nama Ketua wajib diisi'
		],
		'nim_ketua' 	=> [
			'required'      => 'NIM Ketua wajib diisi'
		],
		'nama_anggota' 	=> [
			'required'      => 'Nama Anggota wajib diisi'
		],
		'nim_anggota' 	=> [
			'required'      => 'NIM Anggota wajib diisi'
		],
		'kampus' 		=> [
			'required'      => 'Asal Kampus wajib diisi'
		],
		'link' 			=> [
			'required'      => 'Link Google Drive wajib diisi'
		],
		'wa'			=> [
			'required'		=> 'No. Wa wajib diisi',
			'is_natural'	=> 'No. Wa hanya bisa diisi bilangan bulat'
		],
		'email'			=> [
			'required'		=> 'Email wajib diisi',
			'valid_email'	=> 'Masukkan Email yang valid'
		]
	];

	//Validasi Daftar OT
	public $otMhs = [
		'kategori'		=> 'required',
		'nama'			=> 'required',
		'kampus'		=> 'required',
		'nim'			=> 'required',
		'wa'			=> [
			'required',
			'is_natural'
		],
		'email'			=> [
			'required',
			'valid_email'
		],
	];	 
	public $otMhs_errors = [
		'kategori'		=> [
			'required'      => 'Kategori wajib diisi'
		],
		'nama' 			=> [
			'required'      => 'Nama wajib diisi'
		],
		'kampus' 		=> [
			'required'      => 'Asal Kampus wajib diisi'
		],
		'nim' 			=> [
			'required'      => 'NIM wajib diisi'
		],
		'wa'			=> [
			'required'		=> 'No. Wa wajib diisi',
			'is_natural'	=> 'No. Wa hanya bisa diisi bilangan bulat'
		],
		'email'			=> [
			'required'		=> 'Email wajib diisi',
			'valid_email'	=> 'Masukkan Email yang valid'
		]
	];
	public $otUmum = [
		'kategori'		=> 'required',
		'nama'			=> 'required',
		'wa'			=> [
			'required',
			'is_natural'
		],
		'email'			=> [
			'required',
			'valid_email'
		],
	];	 
	public $otUmum_errors = [
		'kategori'		=> [
			'required'      => 'Kategori wajib diisi'
		],
		'nama' 			=> [
			'required'      => 'Nama wajib diisi'
		],
		'wa'			=> [
			'required'		=> 'No. Wa wajib diisi',
			'is_natural'	=> 'No. Wa hanya bisa diisi bilangan bulat'
		],
		'email'			=> [
			'required'		=> 'Email wajib diisi',
			'valid_email'	=> 'Masukkan Email yang valid'
		]
	];

	// Validasi Registrasi Pengunjung
	public $visitor = [
		'nama'			=> 'required',
		'email'			=> [
			'required',
			'valid_email'
		],
		'pass'			=> 'required',
	];	 
	public $visitor_errors = [
		'nama' 			=> [
			'required'      => 'Nama wajib diisi'
		],
		'email'			=> [
			'required'		=> 'Email wajib diisi',
			'valid_email'	=> 'Masukkan Email yang valid'
		],
		'pass' 			=> [
			'required'      => 'Password wajib diisi'
		],
	];

	// Validasi Login Pengunjung
	public $login_visitor = [
		'email'			=> [
			'required',
			'valid_email'
		],
		'pass'			=> 'required',
	];	 
	public $login_visitor_errors = [
		'email'			=> [
			'required'		=> 'Email wajib diisi',
			'valid_email'	=> 'Masukkan Email yang valid'
		],
		'pass' 			=> [
			'required'      => 'Password wajib diisi'
		],
	];

	// Validasi Request Token Login Developer
	public $login_dev = [		
		'catDev'		=> 'required',
		'email'			=> [
			'required',
			'valid_email'
		],
	];	 
	public $login_dev_errors = [
		'catDev' 		=> [
			'required'      => 'Kategori Developer wajib diisi'
		],
		'email'			=> [
			'required'		=> 'Email wajib diisi',
			'valid_email'	=> 'Masukkan Email yang valid'
		],
	];

	// Validasi Request Token Login Developer
	public $vote = [		
		'kesan'			=> 'required',
		'pesan'			=> 'required',
	];	 
	public $vote_errors = [
		'kesan' 		=> [
			'required'      => 'Kesan wajib diisi'
		],
		'pesan'			=> [
			'required'		=> 'Pesan wajib diisi'
		],
	];
}
