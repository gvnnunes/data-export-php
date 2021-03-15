<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use \App\Models\People;

class PeopleExport implements FromCollection, WithColumnFormatting, WithMapping, ShouldAutoSize, WithHeadings, WithStyles
{
    public function collection()
    {
        return People::all();
    }

    public function map($sheet): array
    {
        return [
            $sheet->id,
            $sheet->first_name,
            $sheet->last_name,
            $sheet->phone,
            $sheet->email,
            Date::dateTimeToExcel($sheet->created_at),
            Date::dateTimeToExcel($sheet->updated_at),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,       
        ];
    }

    public function headings(): array
    {
        return ['Id', 'First Name', 'Last Name', 'Phone', 'Email', 'Created_At', 'Updated_At'];
    }

    public function styles(Worksheet $sheet) : array
    {
        $count = count(People::all());

        return [
            1 => ['font' => ['bold' => true, 'size' => 16], 'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            'A1:G' . ((int)$count + 1) => ['borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]],
        ];
    }
}
