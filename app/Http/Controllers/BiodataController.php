<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BiodataMahasiswa;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateBiodata;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = BiodataMahasiswa::all();
        return view("biodata.index2", compact("mahasiswa"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("biodata.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $filePath = $request->file("photo")->store("public");

       BiodataMahasiswa::create([
        'name' => $request->name,
        'nim' => $request->nim,
        'address' => $request->address,
        'photo' => $filePath]); //menyimpan filePath yang didapatkan 
        return redirect()->route("biodata.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = BiodataMahasiswa::find($id);
        return view("biodata.show", compact("data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = BiodataMahasiswa::find($id);
        return view("biodata.edit", compact("data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBiodata  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBiodata $request, $id)
    {
        // $validation = Validator::make($request->all(), [
        //     "name" => "string|min:3|max:10|alpha",
        //     "nim" => "string|unique:biodata_mahasiswa,nim",
        //     "alamat" => "string|min:10"
        // ]);

        // if ($validation->fails()) {
        //     return redirect()->back()->withErrors($validation)->withInput();
        // }

        BiodataMahasiswa::where("id", $id)->update($request->except("_token"));
        return redirect()->route("biodata.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //BiodataMahasiswa::where("id", $id)->delete();
        //return redirect()->route("biodata.index");

        $data = \App\BiodataMahasiswa::find($id);
        $data->delete($data);
        return redirect()->route("biodata.index")->with('sukses','Data Berhasil dihapus');
    }
}
