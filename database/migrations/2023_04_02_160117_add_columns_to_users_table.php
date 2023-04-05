<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('date_birth')->nullable()->after('email');
            $table->enum('gender',array('male','female'))->nullable()->after('date_birth');
            $table->string('identity_number', 12)->nullable()->after('gender');
            $table->foreignId('career_id')->nullable()->after('identity_number')->constrained('careers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('date_birth');
            $table->dropColumn('gender');
            $table->dropColumn('identity_number');
            $table->dropForeign('users_career_id_foreing');
            $table->dropColumn('career_id');
        });
    }
}
