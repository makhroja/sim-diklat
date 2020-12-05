<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesertaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('peserta', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedBigInteger('kegiatan_id');
			$table->string('no_sertifikat');
			$table->string('sebagai');
			$table->string('nama_lengkap');
			$table->string('no_hp');
			$table->string('email');
			$table->string('instansi');
			$table->string('alamat_instansi');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('peserta');
	}

}
