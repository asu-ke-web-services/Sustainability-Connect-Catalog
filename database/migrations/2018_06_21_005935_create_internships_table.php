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
            $table->tinyInteger('needs_review')->default(0)->unsigned();
            $table->string('name', 1024);
            $table->dateTime('opportunity_start_at')->nullable();
            $table->dateTime('opportunity_end_at')->nullable();
            $table->dateTime('listing_start_at')->nullable();
            $table->dateTime('listing_end_at')->nullable();
            $table->dateTime('application_deadline_at')->nullable();
            $table->string('application_deadline_text')->nullable();
            $table->integer('opportunity_status_id')->unsigned();
            $table->text('description')->nullable();
            $table->integer('follower_count')->unsigned()->nullable()->default(0);
            // $table->integer('parent_opportunity_id')->unsigned()->nullable();
            $table->integer('supervisor_user_id')->unsigned()->nullable();
            $table->integer('submitting_user_id')->unsigned()->nullable();
            $table->text('degree_program')->nullable();
            $table->text('compensation')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('qualifications')->nullable();
            $table->text('application_instructions')->nullable();
            $table->string('program_lead')->nullable();
            $table->string('success_story', 1024)->nullable();
            $table->string('library_collection',1024)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->foreign('opportunity_status_id')
                ->references('id')->on('opportunity_statuses');

            // $table->foreign('parent_opportunity_id')
            //     ->references('id')->on('opportunities');

            $table->foreign('supervisor_user_id')
                ->references('id')->on('users');

            $table->foreign('submitting_user_id')
                ->references('id')->on('users');

            $table->foreign('created_by')
                ->references('id')->on('users');

            $table->foreign('updated_by')
                ->references('id')->on('users');

            $table->foreign('deleted_by')
                ->references('id')->on('users');
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
