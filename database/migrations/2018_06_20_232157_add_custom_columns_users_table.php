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
            $table->softDeletes();
            $table->string('type')->nullable();
            $table->string('asurite')->nullable();
            $table->string('student_degree_level_id')->nullable()->after('asurite');
            // $table->foreign('student_degree_level_id')
            //     ->references('id')
            //     ->on('student_degree_levels');
            $table->text('degree_program')->nullable()->after('student_degree_level_id');
            $table->date('graduation_date')->nullable()->after('degree_program');
            $table->string('phone')->nullable()->after('graduation_date');
            $table->text('research_interests')->nullable()->after('phone');
            $table->text('department')->nullable()->after('research_interests');
            $table->integer('organization_id')->unsigned()->nullable()->after('department');
            // $table->foreign('organization_id')
            //     ->references('id')
            //     ->on('organizations');
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
            //$table->dropForeign('users_student_degree_level_id_foreign');
            //$table->dropForeign('users_organization_id_foreign');
            $table->dropColumn(['type', 'asurite', 'student_degree_level_id', 'degree_program', 'graduation_date', 'phone', 'research_interests', 'department', 'organization_id', 'deleted_at']);
        });
    }
}
