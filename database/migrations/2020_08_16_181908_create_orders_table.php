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
            $table->id();
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->date('start_rent_date');
            $table->string('total_rent_days');
            $table->date('end_rent_date');
            $table->timestamps();
            $table->unsignedBigInteger('bus_id');
            $table->unsignedBigInteger('driver_id');

            $table->foreign('bus_id')->references('id')->on('buses');
            $table->foreign('driver_id')->references('id')->on('drivers');
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
