<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentations', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('quantity');
            $table->tinyInteger('type')->comment('0 -> Entrada, 1 -> Saída');
            $table->integer('product_id');
            $table->foreign('product_id')->on('products')->references('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id');
            $table->integer('consolidation_id');
            $table->foreign('consolidation_id')->on('consolidations')->references('id');
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
        Schema::dropIfExists('movimentations');
    }
}
