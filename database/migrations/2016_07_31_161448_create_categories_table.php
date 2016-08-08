<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('parent_id')->index();
            $table->unsignedInteger('_lft')->index();
            $table->unsignedInteger('_rgt')->index();

            $table->string('name');
            $table->boolean('active')->nullable();
            $table->text('description');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('slug');
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
        Schema::drop('categories');
    }
}
