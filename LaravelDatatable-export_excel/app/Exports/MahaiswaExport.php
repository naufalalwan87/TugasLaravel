<?php

namespace App\Exports;

use App\BiodataMahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;

class MahaiswaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BiodataMahasiswa::all();
    }
}
