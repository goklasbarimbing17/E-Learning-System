<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Matpel extends Migration
{
	public function up()
	{

		/*
         * Table Matpel
         */
		$this->forge->addField([
			'id_matpel'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'matpel'   			=> ['type' => 'varchar', 'constraint' => 225],
			'id_tingkatan'      => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
			'id_pengajar'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
		]);
		$this->forge->addKey('id_matpel', true);
		$this->forge->addForeignKey('id_tingkatan', 'tb_tingkatan', 'id', false, 'CASCADE');
		$this->forge->addForeignKey('id_pengajar', 'tb_pengajar', 'id_pengajar', false, 'CASCADE');
		$this->forge->createTable('tb_matpel');
	}

	public function down()
	{
		$this->forge->dropForeignKey('tb_matpel', 'tingkatan_id_foreign');
		$this->forge->dropForeignKey('tb_matpel', 'pengajar_id_foreign');
		$this->forge->dropTable('tb_matpel');
	}
}
