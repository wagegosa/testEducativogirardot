<?php

    namespace Database\Seeders;

    use App\Models\Career;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas.

        DB::table('careers')->truncate(); // Eliminamos los registros en la tabla.

        $careers = [
            'administración ambiental',
            'administración logística',
            'adminsitración turística y hotelera',
            'contaduría pública',
            'ingeniería civil',
            'ingeniería de sistemas',
            'ingeniería financiera',
        ];

        foreach ($careers as $value) {
            Career::create(['career' => $value]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas.
    }
}
