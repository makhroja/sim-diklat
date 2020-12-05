<?php

class Peserta extends Eloquent{

	protected $table = 'peserta';

    protected $fillable = [
        'kegiatan_id', 'sebagai', 'no_sertifikat', 'nama_lengkap', 'jk', 'instansi', 'jabatan', 'no_hp', 'email', 'alamat',  'kabkota', 'provinsi', 'kehadiran', 'token', 'created_at', 'updated_at'
    ];
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}