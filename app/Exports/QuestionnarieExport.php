<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class QuestionnarieExport implements FromCollection, ShouldAutoSize, WithHeadings, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = DB::table('users AS t1')
            ->join('careers AS t2', 't1.career_id', '=', 't2.id')
            ->join('questionnaires AS t3', 't1.id', '=', 't3.student_id')
            ->join('answers AS t4', 't3.answer_id', '=', 't4.id')
            ->join('questions AS t5', 't3.question_id', '=', 't5.id')
            ->select(
                't1.name AS student',
                't1.email',
                't1.identity_number',
                't1.gender',
                't1.date_birth',
                DB::raw('TIMESTAMPDIFF(YEAR,t1.date_birth,CURDATE()) AS age'),
                't2.career',
                't5.title AS question',
                't4.description'
            )->get();

        return $data;
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Email',
            'No. Identidad',
            'Género',
            'Fecha de nacimiento',
            'Edad',
            'Programa',
            'Pregunta',
            'Respuesta'
        ];
    }

    public function title(): string
    {
        return 'Cuestinario x Alumno';
    }

}
