<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Alert;

class PenerbitController extends Controller
{
    //
    public function index()
    {
        $penerbits=Penerbit::all();
        return view ('penerbit.index', compact('penerbits'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'=>'required',
            'alamat'=>'required',
            'no'=>'required'
        ]);
        DB::table('penerbits')->insert([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'no'=>$request->no
        ]);
        if(DB::table('penerbits')){
            return redirect()->route('penerbit.index')->with(['success'=>'Data berhasil disimpan']);
        }else{
            return redirect()->route('penerbit.index')->with(['error'=>'Data gagal disimpan']);
        }
    }
    public function edit($id)
    {
        $penerbit=Penerbit::find($id);
        return view('penerbit.edit', compact('penerbit'));
    }
    public function update(Request $request, $id)
    {
    $this->validate($request, [
        'nama' => 'required',
        'alamat' => 'required',
        'no' => 'required',
        
        
        
    ]);
    //get data penerbit by ID
 
    $penerbit=Penerbit::findOrFail($id); 
    $penerbit->update([
        
        'nama'=>$request->nama,
       
        'alamat'=>$request->alamat,
        'no'=>$request->no 
        
      
       
    ]); 
    Alert::success('Success', 'data berhasil diedit');
    if($penerbit){
    //redirect dengan pesan sukses
    return redirect()->route('penerbit.index')->with(['success'=>'Data berhasil 
    disimpan']);
    }else{
        return redirect()->route('penerbit.index')->with(['error'=>'Data gagal disimpan']);
    }
    }
    public function destroy($id)
    {
        $penerbit = Penerbit::findOrFail($id);

        $penerbit->delete();
        Alert::success('Success', 'data berhasil dihapus');
        if($penerbit){
            //redirect dengan pesan sukses
            return redirect()->route('penerbit.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('penerbit.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
