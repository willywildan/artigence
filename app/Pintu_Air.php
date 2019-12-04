<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pintu_Air extends Model
{
 	protected $primaryKey = 'id_pintu_air';
	public $incrementing = false;

	protected $table = 'pintu_air';
    protected $fillable = ['id_pintu_air', 'nama_pintu_air', 'alamat_pintu_air', 'nama_penjaga', 'alamat_penjaga', 'telfon_penjaga','interval1a','interval1b','interval2a','interval2b'];

    public function Laporan()
    {
    	return $this->hasMany('App\Laporan');	
    }

    public function Curah_Hujan()
    {
    	return $this->hasMany('App\Curah_Hujan');	
    }

}
