<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExcelExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $modelClass;
    protected $headings;

    public function __construct($modelClass, $headings)
    {
        $this->modelClass = $modelClass;
        $this->headings = $headings;
    }

    public function collection()
    {
        return $this->modelClass::all();
    }



    public function headings(): array
    {
        return $this->headings;
    }



    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:F1')->getFont()->setBold(true);
        $sheet->getStyle('A1:F1')->getFont()->setSize(15);
       // $sheet->getStyle('A1:F1')->getFill()->applyFromArray(['fillType' => 'solid', 'rotation' => 0, 'color' => ['rgb' => '868e96'],]); //heading부분
        $sheet->getStyle('A1:F34')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN); // 셀 테두리 부분
    }
}
