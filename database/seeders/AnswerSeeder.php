<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas.

        DB::table('answers')->truncate(); // Eliminamos los registros en la tabla.

        $answers = [
            ['question_id' => 1, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 1, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 2, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 2, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 3, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 3, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 4, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 4, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 5, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 5, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 6, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 6, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 7, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 7, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 8, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 8, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 9, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 9, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 10, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 10, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 11, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' =>
                5],
            ['question_id' => 11, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 12, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 12, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 13, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 13, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 14, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 14, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 15, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 15, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 16, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' =>
                5],
            ['question_id' => 16, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 17, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 17, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 18, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 18, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 19, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 19, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 20, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 20, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 21, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 21, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 22, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 22, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 23, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' =>
                5],
            ['question_id' => 23, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 24, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 24, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 25, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 25, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 26, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 26, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 27, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 27, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
            ['question_id' => 28, 'description' => 'Desacuerdo', 'is_correct' => 0, 'user_id' => 5],
            ['question_id' => 28, 'description' => 'Deacuerdo', 'is_correct' => 1, 'user_id' => 5],
        ];
        
        foreach ($answers as $key => $value) {
            Answer::create( [
                'question_id' => $value['question_id'] ,
                'description' => $value['description'] ,
                'is_correct'  => $value['is_correct'] ,
                'user_id'     => $value['user_id'] ,
            ] );
        }

         DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas.
    }
}
