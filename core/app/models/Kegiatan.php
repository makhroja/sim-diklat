<?php

class Kegiatan extends Eloquent{

	protected $table = 'kegiatan';

    protected $fillable = array('nama_kegiatan', 'judul','waktu', 'penyelenggara', 'link_pendaftaran', 'link_materi', 'image', 'template', 'css', 'status', 'kehadiran', 'token', 'kuota', 'created_at', 'updated_at');
    
    public function peserta()
    {
        return $this->hasMany(Peserta::class);
    }

    public function setkehadiran()
    {
        return $this->hasOne(Setkehadiran::class);
    }
}