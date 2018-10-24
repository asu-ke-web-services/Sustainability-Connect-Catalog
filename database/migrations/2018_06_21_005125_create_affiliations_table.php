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
            $table->integer('opportunity_type_id')->nullable()->unsigned()->index();
            $table->integer('order')->default(1);
            $table->string('name');
            $table->string('slug');
            $table->string('help_text', 255)->nullable();
            $table->string('frontend_fa_icon')->nullable();
            $table->string('backend_fa_icon')->nullable();
            $table->boolean('access_control')->default(0); // if true = opportunity and user affiliations must match for access
            $table->boolean('public')->default(1); // if true = affiliation is publicly visible in all vieews (otherwise an admin-tag only)
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

        Schema::create('affiliation_opportunity', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('opportunity_id')->unsigned()->index();
            $table->integer('affiliation_id')->unsigned()->index();
            $table->integer('order')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->foreign('opportunity_id')
                ->references('id')->on('opportunities')
                ->onDelete('cascade');

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

        Schema::create('affiliation_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('affiliation_id')->unsigned()->index();
            $table->integer('order')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

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
        Schema::dropIfExists('affiliation_user');
        Schema::dropIfExists('affiliation_opportunity');
        Schema::dropIfExists('affiliations');
    }
}
