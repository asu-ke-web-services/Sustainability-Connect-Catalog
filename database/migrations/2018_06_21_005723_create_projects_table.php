<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('needs_review')->default(0)->unsigned();
            $table->integer('review_status_id')->unsigned();
            $table->text('degree_program')->nullable();
            $table->text('compensation')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('learning_outcomes')->nullable();
            $table->text('sustainability_contribution')->nullable();
            $table->text('qualifications')->nullable();
            $table->text('application_instructions')->nullable();
            $table->text('implementation_paths')->nullable();
            $table->integer('budget_type_id')->unsigned()->index()->nullable();
            $table->string('budget_amount')->nullable();
            $table->string('program_lead')->nullable();
            $table->string('success_story')->nullable();
            $table->string('library_collection')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
