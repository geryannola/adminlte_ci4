<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Students extends Migration
{
	public function up()
	{
		{
			$this->forge->addField([
				'student_id'            => [
					'type'              => 'BIGINT',
					'constraint'        => 20,
					'unsigned'          => TRUE,
					'auto_increment'    => TRUE
				],
				'student_name'          => [
					'type'              => 'VARCHAR',
					'constraint'        => '100',
				],
				'student_school'         => [
					'type'              => 'VARCHAR',
					'constraint'        => '100',
				],
				'student_email'         => [
					'type'              => 'VARCHAR',
					'constraint'        => '100',
				],
				'student_phone_number'  => [
					'type'              => 'VARCHAR',
					'constraint'        => '15',
				],
				'student_grade'         => [
					'type'              => 'VARCHAR',
					'constraint'        => '100',
				],
				'student_department'    => [
					'type'              => 'VARCHAR',
					'constraint'        => '100',
				],
			]);
			$this->forge->addKey('student_id', TRUE);
			$this->forge->createTable('students');
		}
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
