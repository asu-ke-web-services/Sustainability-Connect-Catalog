<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpportunitiesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('opportunityable_type')->nullable();
            $table->integer('opportunityable_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('public_name')->nullable();
            $table->dateTime('opportunity_start_at')->nullable();
            $table->dateTime('opportunity_end_at')->nullable();
            $table->dateTime('listing_start_at')->nullable();
            $table->dateTime('listing_end_at')->nullable();
            $table->dateTime('application_deadline_at')->nullable();
            $table->string('application_deadline_text')->nullable();
            $table->integer('opportunity_status_id')->unsigned()->index();
            $table->boolean('is_hidden')->default(0);
            $table->text('summary')->nullable();
            $table->text('description')->nullable();
            $table->integer('follower_count')->unsigned()->nullable()->default(0);
            $table->integer('parent_opportunity_id')->unsigned()->index()->nullable();
            $table->integer('organization_id')->unsigned()->index()->nullable();
            $table->integer('supervisor_user_id')->unsigned()->index()->nullable();
            $table->integer('submitting_user_id')->unsigned()->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->foreign('opportunity_status_id')
                ->references('id')->on('opportunity_statuses');

            $table->foreign('parent_opportunity_id')
                ->references('id')->on('opportunities');

            $table->foreign('organization_id')
                ->references('id')->on('organizations');

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

        Schema::create('category_opportunity', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('opportunity_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->integer('order')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->foreign('opportunity_id')
                ->references('id')->on('opportunities')
                ->onDelete('cascade');

            $table->foreign('category_id')
                 ->references('id')->on('categories')
                 ->onDelete('cascade');

            $table->foreign('created_by')
                ->references('id')->on('users');

            $table->foreign('updated_by')
                ->references('id')->on('users');

            $table->foreign('deleted_by')
                ->references('id')->on('users');
        });

        Schema::create('keyword_opportunity', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('opportunity_id')->unsigned()->index();
            $table->integer('keyword_id')->unsigned()->index();
            $table->string('order')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->foreign('opportunity_id')
                ->references('id')->on('opportunities')
                ->onDelete('cascade');

            $table->foreign('keyword_id')
                 ->references('id')->on('keywords')
                ->onDelete('cascade');

            $table->foreign('created_by')
                ->references('id')->on('users');

            $table->foreign('updated_by')
                ->references('id')->on('users');

            $table->foreign('deleted_by')
                ->references('id')->on('users');
        });

        Schema::create('address_opportunity', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('address_id')->unsigned()->index();
            $table->integer('opportunity_id')->unsigned()->index();
            $table->integer('order')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->foreign('address_id')
                 ->references('id')->on('addresses')
                ->onDelete('cascade');

            $table->foreign('opportunity_id')
                ->references('id')->on('opportunities')
                ->onDelete('cascade');

            $table->foreign('created_by')
                ->references('id')->on('users');

            $table->foreign('updated_by')
                ->references('id')->on('users');

            $table->foreign('deleted_by')
                ->references('id')->on('users');
        });

        Schema::create('note_opportunity', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('note_id')->unsigned()->index();
            $table->integer('opportunity_id')->unsigned()->index();
            $table->integer('order')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->foreign('note_id')
                 ->references('id')->on('notes')
                ->onDelete('cascade');

            $table->foreign('opportunity_id')
                ->references('id')->on('opportunities')
                ->onDelete('cascade');

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
        Schema::dropIfExists('note_opportunity');
        Schema::dropIfExists('address_opportunity');
        Schema::dropIfExists('keyword_opportunity');
        Schema::dropIfExists('category_opportunity');
        Schema::dropIfExists('opportunities');
    }
}
