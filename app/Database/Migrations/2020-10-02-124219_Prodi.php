<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Prodi extends Migration
{
	//nama tabel yang mau dibuat di database
	private $table = 'prodi';

	//untuk membuat database
	public function up()
	{
		//membuat kolom pada tabel database
		$this->forge->addField([
			'kode_prodi'=>[
				'type' 			=> 'VARCHAR',
				'constraint'	=> '1',
			],
			'nama_prodi'=>[
				'type' 			=> 'VARCHAR',
				'constraint'	=> '100',
			],
			'ketua_prodi'=>[
				'type' 			=> 'VARCHAR',
				'constraint'	=> '100',
			],
		]);
		$this->forge->addKey('kode_prodi', true); // untuk membuat primarykey
		$this->forge->createTable($this->table);
	}

	//--------------------------------------------------------------------
	//untuk menghapus database
	public function down()
	{
		$this->forge->dropTable($this->table);
	}
}
