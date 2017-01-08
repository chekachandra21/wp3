<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Prodmast;
use App\Suplier;
use App\mstran;
use App\Pesan;
use Session;

class ReturController extends Controller
{
    public function index()
    {
        $retur = Prodmast::all();
        return view('retur-obat',compact('retur'));
    }
    public function update(Request $request,$prdcd)
    {
      $qty = $request->qty;
      $prodmast=DB::table('Prodmast')->where('prdcd',$prdcd)->first();
      $stok=$prodmast->stok;
      $nis=$prodmast->nis;
      $nama=$prodmast->nama_obat;
      $total=$stok-$qty;
      DB::table('Prodmast')->where('prdcd',$prdcd)
                            ->update(array('stok' => $total));
      $post = new Mstran;
      $post->prdcd = $prdcd;
      $post->nis = $nis;
      $post->type = 'r';
      $post->nama_obat = $nama;
      $post->qty = $qty;
      $post->save();
      Return redirect()->route('retur.index');
    }
    public function retur()
    {
        $dretur=DB::table('mstran')->where('type','r')->get();
        return view('data-retur-obat',compact('dretur'));
    }   
}
