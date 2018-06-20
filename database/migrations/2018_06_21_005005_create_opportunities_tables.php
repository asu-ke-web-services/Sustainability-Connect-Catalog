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
            $table->integer('opportunityable_id')->unsigned();
            $table->string('opportunityable_type');
            $table->string('title');
            $table->string('alt_title')->nullable();
            $table->string('slug');
            $table->date('listing_expires')->nullable();
            $table->string('application_deadline')->nullable();
            $table->integer('opportunity_status_id')->default(1);
            // $table->foreign('opportunity_status_id')
            //     ->references('id')
            //     ->on('opportunity_statuses');
            $table->boolean('hidden');
            $table->text('summary')->nullable();
            $table->text('description')->nullable();
            $table->integer('parent_opportunity_id')->unsigned()->nullable();
            // $table->foreign('parent_opportunity_id')
            //     ->references('id')
            //     ->on('opportunities');
            $table->integer('organization_id')->unsigned()->nullable();
            // $table->foreign('organization_id')
            //     ->references('id')
            //     ->on('organizations');
            $table->integer('owner_user_id')->unsigned();
            // $table->foreign('owner_user_id')
            //     ->references('id')
            //     ->on('users');
            $table->integer('submitting_user_id')->unsigned();
            // $table->foreign('submitting_user_id')
            //     ->references('id')
            //     ->on('users');
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('opportunities_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('opportunity_id')->unsigned();
            $table->foreign('opportunity_id')
                ->references('id')
                ->on('opportunities');
            $table->integer('address_id')->unsigned();
            $table->foreign('address_id')
                ->references('id')
                ->on('addresses');
            $table->boolean('primary');
            $table->integer('order')->default(1);
            $table->timestamps();
        });


        Schema::create('opportunities_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('opportunity_id')->unsigned();
            $table->foreign('opportunity_id')
                ->references('id')
                ->on('opportunities');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
            $table->integer('order')->default(1);
            $table->timestamps();
        });

        Schema::create('opportunities_keywords', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('opportunity_id')->unsigned();
            $table->foreign('opportunity_id')
                ->references('id')
                ->on('opportunities');
            $table->integer('keyword_id')->unsigned();
            $table->foreign('keyword_id')
                ->references('id')
                ->on('keywords');
            $table->string('order')->default(1);
            $table->timestamps();
        });

        Schema::create('opportunities_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('opportunity_id')->unsigned();
            $table->foreign('opportunity_id')
                ->references('id')
                ->on('opportunities');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->text('note_body');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opportunities_notes');
        Schema::dropIfExists('opportunities_keywords');
        Schema::dropIfExists('opportunities_categories');
        Schema::dropIfExists('opportunities_addresses');
        Schema::dropIfExists('opportunities');
    }
}
