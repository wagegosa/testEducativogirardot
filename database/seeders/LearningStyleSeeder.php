<?php

namespace Database\Seeders;

use App\Models\LearningStyle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LearningStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas.

        DB::table('learning_styles')->truncate(); // Eliminamos los registros en la tabla.

        $learning_styles = [
            'Asimilador'
            ,'Convergente'
            ,'Adaptador'
            ,'Pragmático'
        ];

        foreach($learning_styles as $value) {
            LearningStyle::create(['learning_style' => $value]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas.
    }
}
