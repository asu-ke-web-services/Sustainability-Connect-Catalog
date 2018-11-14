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
            $table->integer('opportunity_type_id')->unsigned()->nullable();
            $table->integer('order')->default(1);
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('help_text')->nullable();
            $table->string('frontend_fa_icon')->nullable();
            $table->string('backend_fa_icon')->nullable();
            $table->tinyInteger('access_control')->unsigned()->default(0); // if true = opportunity and user affiliations must match for access
            $table->tinyInteger('public')->unsigned()->default(1); // if true = affiliation is publicly visible in all views (otherwise an admin-tag only)
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->foreign('opportunity_type_id')
                ->references('id')->on('opportunity_types')
                ->onDelete('cascade');

            $table->foreign('created_by')
                ->references('id')->on('users');

            $table->foreign('updated_by')
                ->references('id')->on('users');

            $table->foreign('deleted_by')
                ->references('id')->on('users');
        });

        Schema::create('affiliationables', function (Blueprint $table) {
            $table->integer('affiliation_id')->unsigned();
            $table->integer('affiliationable_id')->nullable()->unsigned()->index();
            $table->string('affiliationable_type')->nullable();
            $table->integer('order')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->foreign('affiliation_id')
                ->references('id')->on('affiliations')
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
        Schema::dropIfExists('affiliationables');
        Schema::dropIfExists('affiliations');
    }
}
