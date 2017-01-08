<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Prodmast;
use App\Suplier;
use App\Mstran;
use Session;

class CetakController extends Controller
{
	public function pengiriman()
    {
    	$cetakp = DB::table('mstran')->where('type','pb')->get();
        return view('cetak-data-pengiriman',compact('cetakp'));
    }
    public function retur()
    {
    	$cetakr = DB::table('mstran')->where('type','r')->get();
        return view('cetak-data-retur',compact('cetakr'));
    }
}