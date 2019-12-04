<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curah_Hujan extends Model
{
	protected $table = 'curah_hujan';
    protected $fillable = ['id','tanggal','curah'];

    public function Curah()
    {
    	return $this->hasMany('App\Pintu_air');
    }
}
