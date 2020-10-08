<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
	private $table='mahasiswa';
	public function up()
	{
		//membuat kolom pada tabel database
		$this->forge->addField([
			'nim'=>[
				'type' 			=> 'VARCHAR',
				'constraint'	=> '9',
			],
			'nama'=>[
				'type' 			=> 'VARCHAR',
				'constraint'	=> '100',
			],
			'tempat_lahir'=>[
				'type' 			=> 'VARCHAR',
				'constraint'	=> '100',
			],
			'tanggal_lahir'=>[
				'type' 			=> 'DATE',
			],
			'jenis_kelamin'=>[
				'type' 			=> 'ENUM',
				'constraint'	=> ['Laki-laki','Perempuan'],
				'default'		=> 'Laki-laki',
			],
			'id_agama'=>[
				'type' 			=> 'INT',
				'constraint'	=> '11',
				'unsigned'		=> TRUE,
			],
			'alamat'=>[
				'type' 			=> 'TEXT',
			],
			'foto'=>[
				'type' 			=> 'TEXT',
			],
		]);
		$this->forge->addKey('nim', true); // untuk membuat primarykey
		$this->forge->addForeignKey('id_agama', 'agama', 'id_agama', 'CASCADE', 'CASCADE');
		$this->forge->createTable($this->table);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable($this->table);
	}
}
