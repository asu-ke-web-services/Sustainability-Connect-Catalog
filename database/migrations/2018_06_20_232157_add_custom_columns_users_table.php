<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomColumnsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('access_validated')->default(0)->unsigned();
            $table->string('login_name')->nullable();
            $table->integer('user_type_id')->unsigned()->index()->nullable();
            $table->string('asurite')->nullable();
            $table->integer('student_degree_level_id')->unsigned()->index()->nullable();
            $table->text('degree_program')->nullable();
            $table->date('graduation_date')->nullable();
            $table->string('phone')->nullable();
            $table->text('research_interests')->nullable();
            $table->text('department')->nullable();
            $table->integer('organization_id')->unsigned()->index()->nullable();

            $table->foreign('user_type_id')
                ->references('id')
                ->on('user_types');

            $table->foreign('student_degree_level_id')
                ->references('id')
                ->on('student_degree_levels');

            $table->foreign('organization_id')
                ->references('id')
                ->on('organizations');
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
            $table->dropForeign('users_organization_id_foreign');
            $table->dropForeign('users_student_degree_level_id_foreign');
            $table->dropForeign('users_user_type_id_foreign');
            $table->dropColumn(['login_name', 'user_type_id', 'asurite', 'student_degree_level_id', 'degree_program', 'graduation_date', 'phone', 'research_interests', 'department', 'organization_id']);
        });
    }
}
