<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Elearning extends Migration
{
	public function up()
	{

		/*
         * Table Tingkatan
         */
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true
			],
			'tingkatan'       => ['type' => 'VARCHAR', 'constraint' => '255'],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('tb_tingkatan');

		/*
         * Table Tarif les
         */
		$this->forge->addField([
			'id'             => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'id_tingkatan'   => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
			'tarif'          => ['type' => 'int', 'constraint' => 11],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_tingkatan', 'tb_tingkatan', 'id', false, 'CASCADE');
		$this->forge->createTable('tb_tarifles');
	}

	public function down()
	{

		$this->forge->dropForeignKey('tb_tarifles', 'tingkatan_id_foreign');
		$this->forge->dropTable('tb_tingkatan');
		$this->forge->dropTable('tb_tarifles');
	}
}
