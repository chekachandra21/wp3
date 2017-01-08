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

class TambahController extends Controller
{
    public function tambah()
    {
        $Tambah =  DB::table('pesan')
                  ->join('prodmast', 'pesan.prdcd', '=', 'prodmast.prdcd')
                  ->select('prodmast.prdcd','prodmast.nis','prodmast.nama_obat','prodmast.stok','pesan.qty','prodmast.harga')
                  ->where('pesan.qty','<>','0')
                  ->get();
        return view('tambah-stok-obat',compact('Tambah'));
    }
    public function update(Request $request,$prdcd)
    {
  		$qty = $request->qty;
      $prodmast=DB::table('Prodmast')->where('prdcd',$prdcd)->first();
      $stok=$prodmast->stok;
      $nis=$prodmast->nis;
      $nama=$prodmast->nama_obat;
      $total=$stok+$qty;
      $pemesan=DB::table('pesan')->where('prdcd',$prdcd)->first();
      $qtypesan=$pemesan->qty;
      $ots=$qtypesan-$qty;
  		DB::table('Prodmast')->where('prdcd',$prdcd)
  								          ->update(array('stok' => $total));
      DB::table('pesan')->where('prdcd',$prdcd)
                            ->update(array('qty' => $ots));
      $post = new Mstran;
      $post->prdcd = $prdcd;
      $post->nis = $nis;
      $post->type = 'pb';
      $post->nama_obat = $nama;
      $post->qty = $qty;
      $post->save();
  		Return redirect()->route('tambah.tambah');
    }
    public function destroy($prdcd)
    {
        $Prodmast = DB::table('Pesan')->where('prdcd',$prdcd)->delete();
        Return redirect()->route('tambah.tambah');
    }
    public function pb()
    {
        $dpb=DB::table('mstran')->where('type','pb')->get();
        return view('data-pengiriman-obat',compact('dpb'));
    }     
}
