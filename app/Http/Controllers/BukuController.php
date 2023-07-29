<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Alert;

class BukuController extends Controller
{
    //
    public function index()
    {
        $penerbits=Penerbit::all();
        $bukus=Buku::all();
        return view ('buku.index', compact('penerbits'),compact('bukus')) ;
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
    public function edit($id)
    {
        $buku=Buku::find($id);
        return view('buku.edit', compact('buku'));
    }
    public function update(Request $request, $id)
    {
    $this->validate($request, [
        'judul' => 'required',
       
        'penerbit' => 'required',
        'jumlah' => 'required',
        
        
        
    ]);
    //get data buku by ID
 
    $buku=Buku::findOrFail($id); 
    $buku->update([
        
        'judul'=>$request->judul,
      
        'penerbit'=>$request->penerbit,
        'jumlah'=>$request->jumlah 
        
      
       
    ]); 
    Alert::success('Success', 'data berhasil diedit');
    if($buku){
    //redirect dengan pesan sukses
    return redirect()->route('buku.index')->with(['success'=>'Data berhasil 
    disimpan']);
    }else{
        return redirect()->route('buku.index')->with(['error'=>'Data gagal disimpan']);
    }
    }
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        $buku->delete();
        Alert::success('Success', 'data berhasil dihapus');
        if($buku){
            //redirect dengan pesan sukses
            return redirect()->route('buku.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('buku.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
