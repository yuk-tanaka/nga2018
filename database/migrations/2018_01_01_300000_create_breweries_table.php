<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreweriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breweries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->string('name')->index();
            $table->string('company_name')->index();
            $table->string('prefecture');
            $table->string('web', 1024)->nullable();
            $table->string('twitter', 1024)->nullable();
            $table->string('facebook', 1024)->nullable();
            $table->timestamps();
            $table->index(['created_at', 'updated_at']);

            //外部キー
            $table->foreign('shop_id')
                ->references('id')->on('shops')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breweries');
    }
}
