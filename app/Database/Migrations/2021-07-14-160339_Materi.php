<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Materi extends Migration
{
	public function up()
	{

		/*
         * Table Materi
         */
		$this->forge->addField([
			'id_materi'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'id_matpel'   		=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
			'judul'        		=> ['type' => 'varchar', 'constraint' => 225],
			'nama_file'         => ['type' => 'varchar', 'constraint' => 225],
		]);
		$this->forge->addKey('id_materi', true);
		$this->forge->addForeignKey('id_matpel', 'tb_matpel', 'id_matpel', false, 'CASCADE');
		$this->forge->createTable('tb_materi');
	}

	public function down()
	{
		$this->forge->dropForeignKey('tb_materi', 'matpel_id_foreign');
		$this->forge->dropTable('tb_materi');
	}
}
