<?php
namespace App\Http\Controllers;

use App\Models\biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;



class BiodataController extends Controller
{
    //
    public function index()
    {
        $biodatas=Biodata::all();
        return view ('biodata.index', compact('biodatas'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'=>'required',
            'ttl'=>'required',
            'jurusan'=>'required',
            'kelas'=>'required'
        ]);
        DB::table('biodatas')->insert([
            'nama'=>$request->nama,
            'ttl'=>$request->ttl,
            'jurusan'=>$request->jurusan,
            'kelas'=>$request->kelas
        ]);
        if(DB::table('biodatas')){
            return redirect()->route('biodata.index')->with(['success'=>'Data berhasil disimpan']);
        }else{
            return redirect()->route('biodata.index')->with(['error'=>'Data gagal disimpan']);
        }
    }
    public function edit(Biodata $biodata)
    {
        return view('biodata.edit', compact('biodata'));
    }
    public function update(Request $request, Biodata $biodata)
    {
    $this->validate($request, [
        'nama' => 'required',
        'ttl' => 'required',
        'jurusan' => 'required',
        'kelas' => 'required',
        
        
        
    ]);
    //get data biodata by ID
 
    $biodata=Biodata::findOrFail($biodata->id); 
    $biodata->update([
       
        'nama'=>$request->nama,
        'ttl'=>$request->ttl,
        'jurusan'=>$request->jurusan,
        'kelas'=>$request->kelas ,
        
      
       
    ]); 
    if($biodata){
    //redirect dengan pesan sukses
    return redirect()->route('biodata.index')->with(['success'=>'Data berhasil 
    disimpan']);
    }else{
        return redirect()->route('biodata.index')->with(['error'=>'Data gagal disimpan']);
    }
    }
}
