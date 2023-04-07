<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas.

        DB::table('questions')->truncate(); // Eliminamos los registros en la tabla.

        $questions = [
            'Prefiero contar con el mayor número de fuentes de información. Cuantos más datos reúna para reflexionar, mejor.',
            'Rechazo ideas originales y espontáneas si no las veo prácticas.',
            'Me entusiasma tener un reto nuevo y diferente.',
            'Me gusta sopesar diversas alternativas antes de tomar una decisión.',
            'Creo que el fin justifica los medios en muchos casos.',
            'Normalmente trato de resolver los problemas metódicamente y paso a paso.',
            'La gente con frecuencia cree que soy poco sensible a sus sentimientos.',
            'Me gusta buscar nuevas experiencias.',
            'Estoy seguro de lo que es bueno y es malo. Lo que está bien y lo que está mal.',
            'Tiendo a ser perfeccionista.',
            'No me importa hacer todo lo necesario para que sea efectivo mi trabajo.',
            'Estoy convencido/a que debe imponerse la lógica y el razonamiento.',
            'Disfruto cuando tengo tiempo para preparar mi trabajo y realizarlo a conciencia.',
            'Aporto ideas nuevas y espontáneas en los grupos de discusión.',
            'Si trabajo en grupo procuro que se siga un método y un orden.',
            'Me gusta experimentar y aplicar las cosas.',
            'En las reuniones apoyo las ideas prácticas y realistas.',
            'El trabajar a conciencia me llena de satisfacción y orgullo.',
            'Con tal de conseguir el objetivo que pretendo soy capaz de herir sentimientos ajenos.',
            'Pienso que debemos llegar pronto al grano, al meollo de los temas.',
            'Soy cauteloso/a a la hora de sacar conclusiones.',
            'Me atrae experimentar y practicar las últimas técnicas y novedades.',
            'Esquivo los temas subjetivos, ambiguos y poco claros.',
            'Ante los acontecimientos trato de descubrir los principios y teorías en que se basan.',
            'Admito y me ajusto a las normas sólo si me sirven para lograr mis objetivos.',
            'Me gustan más las personas prácticas y concretas que las teóricas y abstractas.',
            'Prefiero las cosas estructuradas a las desordenadas.',
            'Me molestan las personas que no siguen un enfoque lógico.',
        ];

        foreach ($questions as $value) {
            Question::create([
                'title'   => $value,
                'value'   => 0,
                'user_id' => 4
            ]);
        }

        DB::table('questions')
            ->whereIn('id', [1, 4, 6, 10, 13, 15, 18, 21, 24, 27])
            ->update(['learning_style_id' => 1]);

        DB::table('questions')
            ->whereIn('id', [2, 9, 12, 17, 20, 23, 26, 28])
            ->update(['learning_style_id' => 2]);

        DB::table('questions')
            ->whereIn('id', [3, 8, 14, 16, 22])
            ->update(['learning_style_id' => 3]);

        DB::table('questions')
            ->whereIn('id', [5, 7, 11, 19, 25])
            ->update(['learning_style_id' => 4]);


        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas.
    }
}
