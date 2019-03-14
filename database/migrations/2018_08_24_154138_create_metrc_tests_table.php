<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetrcTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metrctests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('main_id')->nullable;
            $table->boolean('is_template')->nullable;
            $table->string('name',50)->nullable;
            $table->text('json_block')->nullable;
            $table->text('comments')->nullable;
            $table->string('action',50)->nullable;
            $table->text('result')->nullable;
            $table->string('verification',50)->nullable;
            $table->timestamp('test_date')->nullable;
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
        Schema::dropIfExists('metrc_tests');
    }
}
