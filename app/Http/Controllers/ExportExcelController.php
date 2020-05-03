<?php

namespace App\Http\Controllers;

use App\Exports\ExportExcel;
use Maatwebsite\Excel\Facades\Excel;

use App\BiodataMahasiswa;

class ExportExcelController extends Controller
{

    public function export() 
    {
        return Excel::download(new ExportExcel, 'mahasiswa.xlsx');
    }
}
