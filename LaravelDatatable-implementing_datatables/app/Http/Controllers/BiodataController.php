<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BiodataMahasiswa;
use App\Exports\MahaiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use Yajra\DataTables\Html\Builder;


class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        if(request()->ajax()) {
            return DataTables::of(BiodataMahasiswa::query())->editColumn("nim", function($data) {
               return "<strong><i>" . $data->nim .
               "</i></strong>" ;
            })->addColumn("action", function($data) {
                return "
                <a href='" . route("biodata.show", ["id" => $data->id]) ."' class='btn btn-success'>Detail</a>
                <a href='" . route("biodata.edit", ["id" => $data->id]) ."' class='btn btn-warning'>Edit</a>
                <a href='" . route("biodata.destroy", ["id" => $data->id]) ."' class='btn btn-danger'>Delete</button>
                ";
            })->rawColumns(["nim", "action"])->addIndexColumn()->toJson();
        }

        $html = $builder->columns([
            ["data" => "DT_RowIndex", "name" => "#", "title" => "#", "defaultContent"=> "", "orderable" => false],
            ["data" => "name", "name" => "name", "title" => "NAMA"],
            ["data" => "nim", "nim" => "nim", "title" => "NIM"],
            [
                'defaultContent' => '',
                'data'           => 'action',
                'name'           => 'action',
                'title'          => 'ACTION',
                'render'         => null,
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => true,
            ],
        ]);




        //$mahasiswa = BiodataMahasiswa::all();
        return view("biodata.index", compact("html"));
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
        $filePath = $request-> file("photo")->store("public");

        BiodataMahasiswa::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'address' => $request->address,
            'photo' => $filePath
        ]);
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
        return view("biodata.show",compact("data"));
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
        return view("biodata.edit",compact("data"));

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
        BiodataMahasiswa::where("id",$id)->update($request->except("_token"));
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
        BiodataMahasiswa::where("id",$id)->delete();
        return redirect()->route("biodata.index");
    }

    public function export_excel()
    {
        return Excel::download(new MahaiswaExport, 'Biodata-Mahasiswa.xlsx');
    }
}
