<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Hobi extends Migration
{
	private $table='hobi';

	public function up()
	{
		//membuat kolom pada tabel database
		$this->forge->addField([
			'kode_hobi'=>[
				'type' 			=> 'INT',
				'constraint'	=> '20',
				'unsigned'		=> TRUE,
				'auto_increment'=> TRUE,
			],
			'hobi'=>[
				'type' 			=> 'VARCHAR',
				'constraint'	=> '20',
			],
		]);
		$this->forge->addKey('kode_hobi', true); // untuk membuat primarykey
		$this->forge->createTable($this->table);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable($this->table);
	}
}
