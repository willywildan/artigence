<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Pintu_Air;
use App\Laporan;
use App\Curah_Hujan;
use DB;

class MainController extends Controller
{
    public function pintu()
    {	$data_pintu = DB::table('Pintu_Air')
                    -> where('id_pintu_air' ,'=','1')
                    -> get() ;
    	return view('/admin/Pintu/pintu', ['data_pintu' => $data_pintu]);
    }

    public function index()
    {  
    	

        $data_laporan = DB::table('Pintu_Air')->join('Laporan','Pintu_Air.id_pintu_air','=','Laporan.id_pintu_air')
            ->get();
        return view('/admin/index' ,['data_laporan'=> $data_laporan]);
    }

    public function lihat($id_pintu_air)
	{
	$data_pintu = \App\Pintu_Air::find($id_pintu_air);

    	return view('/admin/Pintu/lihat', ['data_pintu' =>$data_pintu]);
    }

    public function curah_hujan()
    {
    	$data_curah = \App\Curah_Hujan::all();
    	return view('/admin/curah_hujan', ['data_curah' => $data_curah]);
    	
    }

    public function laporan()
    {	
    	$data_pintu = \App\Pintu_Air::all();
    	return view('/admin/Laporan/laporan', ['data_pintu' => $data_pintu]);
    }

    public function lihat_laporan($id_pintu_air)
	{
		 
		$data_pintu = Pintu_Air::where('id_pintu_air', $id_pintu_air)->get();

		$result = DB::table('pintu_air')
    				->join('laporan', 'pintu_air.id_pintu_air', '=', 'laporan.id_pintu_air')
    				->select('laporan.tinggi_permukaan_air', 'laporan.tanggal')
    				->where('laporan.id_pintu_air', '=', $id_pintu_air)
    				->orderBy('laporan.tanggal' , 'desc')
    				 ->get();
		
        return view('/admin/Laporan/lihat_laporan' ,compact('result','data_pintu'));
    }
     
    public function keputusan()
    {   

        $data_laporan =  DB::table('Pintu_Air')
                    ->join('Laporan','Pintu_Air.id_pintu_air','=','Laporan.id_pintu_air')
                    ->join('Curah_Hujan', 'Laporan.tanggal', '=', 'Curah_Hujan.tanggal')
                    ->select('Laporan.tinggi_permukaan_air', 'Laporan.tanggal', 'Pintu_Air.nama_pintu_air', 'Curah_Hujan.curah', 'Pintu_Air.id_pintu_air', 'Laporan.tanggal',
                              'Pintu_Air.interval1a', 'Pintu_Air.interval1b', 'Pintu_Air.interval2a', 'Pintu_Air.interval2b')
                    ->orderBy('Laporan.tanggal', 'desc')
                    ->get();


/*
        $data_laporan = DB::table('pintu_air')
                    ->join('laporan', 'pintu_air.id_pintu_air', '=', 'laporan.id_pintu_air')
                    ->join('curah_hujan', 'laporan.tanggal', '=', 'curah_hujan.tanggal')
                    ->select('laporan.tinggi_permukaan_air', 'laporan.tanggal', 'pintu_air.nama_pintu_air', 'curah_hujan.curah', 'pintu_air.id_pintu_air', 'laporan.tanggal',
                              'pintu_air.interval1a', 'pintu_air.interval1b', 'pintu_air.interval2a', 'pintu_air.interval2b')
                    ->orderBy('laporan.tanggal', 'desc')
                    ->get();*/



        return view('/admin/keputusan' ,compact('data_laporan'));
    }



}
