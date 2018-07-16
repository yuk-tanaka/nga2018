<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('area_id')->unsigned()->index();
            $table->string('name')->index();
            $table->string('address');
            $table->double('latitude')->index();
            $table->double('longitude')->index();
            $table->dateTime('opened_at')->index();
            $table->dateTime('closed_at')->index();
            $table->string('tel')->nullable();
            $table->text('description')->nullable();
            $table->string('web', 1024)->nullable();
            $table->string('twitter', 1024)->nullable();
            $table->string('facebook', 1024)->nullable();
            $table->string('tabelog', 1024)->nullable();
            $table->timestamps();
            $table->index(['created_at', 'updated_at']);

            //外部キー
            $table->foreign('area_id')
                ->references('id')->on('areas')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}