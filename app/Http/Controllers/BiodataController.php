<?php
namespace App\Http\Controllers;

use App\Models\biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Alert;


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
        Alert::success('Success', 'data berhasil disimpan');
        if(DB::table('biodatas')){
            return redirect()->route('biodata.index')->with(['success'=>'Data berhasil disimpan']);
        }else{
            return redirect()->route('biodata.index')->with(['error'=>'Data gagal disimpan']);
        }
    }
    public function edit($id)
    {
        $biodata=Biodata::find($id);
        return view('biodata.edit', compact('biodata'));
    }
    public function update(Request $request, $id)
    {
    $this->validate($request, [
        'nama' => 'required',
        'ttl' => 'required',
        'jurusan' => 'required',
        'kelas' => 'required',
        
        
        
    ]);
    //get data biodata by ID
 
    $biodata=Biodata::findOrFail($id); 
    $biodata->update([
        
        'nama'=>$request->nama,
        'ttl'=>$request->ttl,
        'jurusan'=>$request->jurusan,
        'kelas'=>$request->kelas 
        
      
       
    ]); 
    Alert::success('Success', 'data berhasil diedit');
    if($biodata){
    //redirect dengan pesan sukses
    return redirect()->route('biodata.index')->with(['success'=>'Data berhasil 
    disimpan']);
    }else{
        return redirect()->route('biodata.index')->with(['error'=>'Data gagal disimpan']);
    }
    }
    public function destroy($id)
    {
        $biodata = Biodata::findOrFail($id);

        $biodata->delete();
        Alert::success('Success', 'data berhasil dihapus');
        if($biodata){
            //redirect dengan pesan sukses
            return redirect()->route('biodata.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('biodata.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
