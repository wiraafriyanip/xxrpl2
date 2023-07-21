<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class BukuController extends Controller
{
    //
    public function index()
    {
        return view ('buku.index');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul'=>'required',
            'penerbit'=>'required',
            'jumlah'=>'required'
        ]);
        DB::table('bukus')->insert([
            'judul'=>$request->judul,
            'penerbit'=>$request->penerbit,
            'jumlah'=>$request->jumlah
        ]);
        if(DB::table('bukus')){
            return redirect()->route('buku.index')->with(['success'=>'Data berhasil disimpan']);
        }else{
            return redirect()->route('buku.index')->with(['error'=>'Data gagal disimpan']);
        }
    }
}
