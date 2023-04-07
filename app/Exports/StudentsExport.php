<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class StudentsExport implements FromCollection, ShouldAutoSize, WithHeadings, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = DB::table('users AS t1')
            ->join('careers AS t2', 't1.career_id', '=', 't2.id')
            ->join('model_has_roles AS t3', 't3.model_id', '=', 't1.id')
            ->join('roles AS t4', 't3.role_id', '=', 't4.id')
            ->where('t4.name', '=', 'Estudiante')
            ->select(
                't1.name',
                't1.gender',
                't1.date_birth',
                DB::raw('TIMESTAMPDIFF(YEAR,t1.date_birth,CURDATE()) AS age'),
                't1.identity_number',
                't2.career'
            )
            ->get();

        return $data;
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Género',
            'Fecha de Nacimiento',
            'Edad',
            'No. Documento',
            'Programa'
        ];
    }

    public function title(): string
    {
        return 'Estudiantes';
    }

}
