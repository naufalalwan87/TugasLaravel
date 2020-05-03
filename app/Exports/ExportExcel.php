<?php

namespace App\Exports;

use App\BiodataMahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ExportExcel implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BiodataMahasiswa::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'NIM',
            'Alamat',
            'Foto',
            'Created at',
            'Updated at'
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
    //             $spreadsheet->getActiveSheet()->getStyle('A1:D4')->getAlignment()->setWrapText(true);
    //             $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
				// $spreadsheet->getDefaultStyle()->getFont()->setSize(12);
				$styleArray = [
				    'borders' => [
				        'outline' => [
				            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
				            'color' => ['argb' => 'FFFF0000'],
				        ],
				    ],
				];

				// $worksheet->getStyle('B2:G8')->applyFromArray($styleArray);
            },
        ];
    }
}
