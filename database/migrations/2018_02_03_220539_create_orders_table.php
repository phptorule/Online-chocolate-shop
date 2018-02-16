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
            $table->string('code')->default('');
            $table->string('email');
            $table->string('phone');
            $table->string('billing_fname');
            $table->string('billing_address');
            $table->string('billing_surname');
            $table->string('billing_zip_code');
            $table->string('delivery_fname');
            $table->string('delivery_address');
            $table->string('delivery_surname');
            $table->string('delivery_zip_code');
            $table->text('cart');
            $table->enum('status', ['pending', 'payed', 'delivered']);
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
