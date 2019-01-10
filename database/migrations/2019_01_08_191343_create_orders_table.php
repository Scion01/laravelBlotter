<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->timestamps();
            $table->string('Time');
            $table->enum('Side',["Buy","Sell"]);
            $table->enum("OrderType",["LMT","STP"]);
            $table->enum("CcyPair",["GBPUSD","EURUSD","USDJPY","AUDUSD","USDINR"]);
            $table->enum("Status",["Filled","Working","Cancelled"]);
            $table->string("Price");
            $table->integer("Amount");
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
