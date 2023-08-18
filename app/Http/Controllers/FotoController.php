<?php

namespace App\Http\Controllers;
use App\Models\biodata;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Biodata::findOrFail($id);
        return view ('biodata.foto', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'image'=>'required|image|mimes:jpeg,png,jpg|max:948',
        ]);
        $image = $request->file('image');
        $data = Biodata::find($id);
        $data->update ([
            'foto'=> $image->hashName(),
        ]);
        $image->move('foto', $image->hashName());
        if($data){
            return redirect()->route('biodata.index')->with(['success'=>'Data berhasil disimpan']);
    }else{
        return redirect()->route('biodata.index')->with(['error'=>'Data gagal disimpan']);
    }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
