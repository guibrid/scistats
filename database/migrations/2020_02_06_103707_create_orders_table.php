<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number', 50);
            $table->string('invoice_number', 50)->nullable();
            $table->string('vessel', 255)->nullable();
            $table->string('container', 255)->nullable();
            $table->string('plomb', 255)->nullable();
            $table->date('etd')->nullable();
            $table->date('eta')->nullable();
            $table->integer('rows')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
