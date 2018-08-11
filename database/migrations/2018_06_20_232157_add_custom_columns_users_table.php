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
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('login_name')->nullable();
            $table->string('type')->nullable();
            $table->string('asurite')->nullable();
            $table->integer('student_degree_level_id')->unsigned()->nullable();
            $table->text('degree_program')->nullable();
            $table->date('graduation_date')->nullable();
            $table->string('phone')->nullable();
            $table->text('research_interests')->nullable();
            $table->text('department')->nullable();
            $table->integer('organization_id')->unsigned()->nullable();

            $table->foreign('student_degree_level_id')
                ->references('id')
                ->on('student_degree_levels');

            $table->foreign('organization_id')
                ->references('id')
                ->on('organizations');


            $table->foreign('created_by')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('updated_by')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('deleted_by')
                ->references('id')->on('users')
                ->onDelete('cascade');
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
            $table->dropForeign('users_created_by_foreign');
            $table->dropForeign('users_deleted_by_foreign');
            $table->dropForeign('users_organization_id_foreign');
            $table->dropForeign('users_student_degree_level_id_foreign');
            $table->dropForeign('users_updated_by_foreign');
            $table->dropColumn(['first_name', 'last_name', 'login_name', 'type', 'asurite', 'student_degree_level_id', 'degree_program', 'graduation_date', 'phone', 'research_interests', 'department', 'organization_id', 'deleted_at', 'created_by', 'updated_by', 'deleted_by']);
        });
    }
}
