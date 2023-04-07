<?php

namespace Database\Seeders;

use Database\Factories\StudentFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        #\App\Models\User::factory(10)->create();
        $this->call([
            CareerSeeder::class,
            LearningStyleSeeder::class,
            PermissionsSeeder::class,
            UserRolePermissionSeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
        ]);
    }
}
