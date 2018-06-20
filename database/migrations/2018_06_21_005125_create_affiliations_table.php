<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable()->default(null);
            // $table->foreign('parent_id')
            //     ->references('id')
            //     ->on('affiliations')
            //     ->onUpdate('cascade')
            //     ->onDelete('set null');
            $table->integer('opportunity_type_id');
            // $table->foreign('opportunity_type_id')
            //     ->references('id')
            //     ->on('opportunity_types');
            $table->integer('order')->default(1);
            $table->string('name');
            $table->string('slug');
            $table->boolean('access_control'); // if true = opportunity and user affiliations must match for access
            $table->timestamps();
        });

        Schema::create('opportunities_affiliations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('opportunity_id')->unsigned();
            // $table->foreign('opportunity_id')
            //     ->references('id')
            //     ->on('opportunities');
            $table->integer('affiliation_id')->unsigned();
            // $table->foreign('affiliation_id')
            //     ->references('id')
            //     ->on('affiliations');
            $table->integer('order')->default(1);
            $table->timestamps();
        });

        Schema::create('users_affiliations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            // $table->foreign('user_id')
            //     ->references('id')
            //     ->on('users');
            $table->integer('affiliation_id')->unsigned();
            // $table->foreign('affiliation_id')
            //     ->references('id')
            //     ->on('affiliations');
            $table->integer('order')->default(1);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_affiliations');
        Schema::dropIfExists('opportunities_affiliations');
        Schema::dropIfExists('affiliations');
    }
}
