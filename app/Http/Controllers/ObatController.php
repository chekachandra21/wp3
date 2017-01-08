<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Prodmast;
use App\Suplier;
use App\Pesan;
use Session;

class ObatController extends Controller
{
	public function index()
    {
        $Obat = Prodmast::all();
        return view('data-obat',compact('Obat'));
    }
    public function suplier()
    {
        $Suplier = Suplier::all();
        return view('input-obat',compact('Suplier'));
    }
    public function store(Request $request)
    {
        $y=date('y');
        $m=date('m');
        $d=date('d');
        $prdcd=$y.$m.$d.'%';
        $Prodmast = DB::table('Prodmast')->where('prdcd','like',$prdcd)->orderby('prdcd','desc')->first();
        $jumlah=count($Prodmast);
        if ($jumlah==0) {
            $ko=$y.$m.$d."01";
        }else{
            $kode = $Prodmast->prdcd;
            $ko=$kode +1;
        }
        $ks = $request->ks;
        $no = $request->no;
        $stok = $request->stok;
        $ho = $request->ho;
        $post = new Prodmast;
        $post->prdcd = $ko;
        $post->nis = $ks;
        $post->nama_obat = $no;
        $post->stok = $stok;
        $post->harga = $ho;
        $post->save();
        Return redirect()->route('obat.input');
    }
	public function edit($prdcd)
    {
        $Prodmast = DB::table('Prodmast')->where('prdcd',$prdcd)->first();
		$Suplier = Suplier::all();
        return view('edit-obat',compact('Prodmast','Suplier'));
    }
	public function update(Request $request,$prdcd)
    {
		$ko = $request->ko;
		$ks = $request->ks;
		$no = $request->no;
		$ho = $request->ho;
		$Prodmast = DB::table('Prodmast')->where('prdcd',$prdcd)
								           ->update(array('prdcd' => $ko,'nis'=>$ks,'nama_obat'=>$no,'harga'=>$ho));
		Return redirect()->route('obat.index');
    }
  public function destroy($prdcd)
    {
        $Prodmast = DB::table('Prodmast')->where('prdcd',$prdcd)->delete();
        Return redirect()->route('obat.index');
    }
}
