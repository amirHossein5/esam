<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 20, 3);
            $table->tinyInteger('has_request_for_discount')->default(0);
            $table->tinyInteger('sold_number')->default(0)
                ->comment("if it's not auction and there isn't product_metas");
            $table->tinyInteger('frozen_number')->default(0)
                ->comment("if it's not auction and there isn't product_metas");
            $table->tinyInteger('marketable_number')->default(0)
                ->comment("if it's not auction and there isn't product_metas");
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
        Schema::dropIfExists('product_prices');
    }
};
