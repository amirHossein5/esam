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
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('start_price', 20, 3);
            $table->decimal('reserved_price', 20, 3)->nullable()
                ->comment("if prices not reached to this, seller can don't send product");
            $table->decimal('urgent_price', 20, 3)
                ->nullable()
                ->comment("if user pay this can buy product");
            $table->timestamp('start_date')->nullable();
            $table->foreignId('period_id')
                ->constrained('auction_periods')
                ->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('auctions');
    }
};
