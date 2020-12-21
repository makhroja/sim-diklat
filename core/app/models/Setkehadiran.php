<?php

class Setkehadiran extends Eloquent
{

    protected $table = 'setkehadiran';

    protected $fillable = array('kegiatan_id', 'absensi', 'date', 'start', 'end', 'created_at', 'updated_at');

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
