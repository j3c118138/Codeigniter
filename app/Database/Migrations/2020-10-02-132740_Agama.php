<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Agama extends Migration
{
	private $table='agama';

	public function up()
	{
		//membuat kolom pada tabel database
		$this->forge->addField([
			'id_agama'=>[
				'type' 			=> 'INT',
				'constraint'	=> '20',
				'unsigned'		=> TRUE,
				'auto_increment'=> TRUE,
			],
			'agama'=>[
				'type' 			=> 'VARCHAR',
				'constraint'	=> '100',
			],
		]);
		$this->forge->addKey('id_agama', true); // untuk membuat primarykey
		$this->forge->createTable($this->table);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable($this->table);
	}
}
