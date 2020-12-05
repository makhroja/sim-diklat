<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kegiatan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama_kegiatan');
			$table->date('waktu');
			$table->string('penyelenggara');
			$table->string('link_pendaftaran');
			$table->string('link_materi');
			$table->string('template');
			$table->string('orientation');
			$table->string('font_size');
			$table->string('margin_top');
			$table->string('margin_left');
			$table->string('status');
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
		Schema::drop('kegiatan');
	}

}
