<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Prodmast;
use App\Suplier;
use App\Pesan;
use Session;

class PesanController extends Controller
{
    public function store(Request $request)
    {
        $ko = $request->ko;
        $ks = $request->ks;
        $qty = $request->qty;
        $Pesan = DB::table('Pesan')->where('prdcd',$ko)->count();
        if ($Pesan==0) {
          DB::table('Pesan')->insert(['prdcd' => $ko, 'nis' => $ks,'qty' => $qty]);
        }else{
          $Prodmast = DB::table('Pesan')->where('prdcd',$ko)
                                 ->update(array('qty' => $qty));
        }
        Return redirect()->route('pesan.permintaan');
    }
    public function permintaan()
    {
        $Permintaan = Prodmast::all();
        return view('permintaan-obat',compact('Permintaan'));
    }
    public function tambah()
    {
        $Tambah =  DB::table('pesan')
                  ->join('prodmast', 'pesan.prdcd', '=', 'prodmast.prdcd')
                  ->select('prodmast.prdcd','prodmast.nis','prodmast.nama_obat','prodmast.stok','pesan.qty','prodmast.harga')
                  ->get();
        return view('tambah-stok-obat',compact('Tambah'));
    }
}
