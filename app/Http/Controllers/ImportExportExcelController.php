<?php

namespace App\Http\Controllers;

use App\Exports\QuestionnarieExport;
use App\Exports\StudentsExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class ImportExportExcelController extends Controller
{
    public function export_students()
    {
        return Excel::download(new StudentsExport, 'students_list.xlsx');
    }

    public function export_questionnaires()
    {
        return Excel::download(new QuestionnarieExport, 'questionnaires_list.xlsx');
    }
}
