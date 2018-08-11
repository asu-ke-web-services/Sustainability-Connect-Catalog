<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->increments('id');
            $table->text('degree_program')->nullable();
            $table->text('compensation')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('qualifications')->nullable();
            $table->text('application_instructions')->nullable();
            $table->string('program_lead')->nullable();
            $table->string('success_story')->nullable();
            $table->string('library_collection')->nullable();
            $table->integer('fav_count')->unsigned();
            // $table->timestamps();
            // $table->softDeletes();
            // $table->integer('created_by')->unsigned()->nullable();
            // $table->integer('updated_by')->unsigned()->nullable();
            // $table->integer('deleted_by')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internships');
    }
}
