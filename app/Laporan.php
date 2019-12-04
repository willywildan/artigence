<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
	protected $table = 'laporan';
    protected $fillable = ['id_laporan','id_pintu_air','tanggal','tinggi_permukaan_air','status','keputusan'];
}
