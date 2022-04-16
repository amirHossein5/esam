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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('product_object')->nullable();
            $table->foreignId('amazing_sale_id')->nullable()->constrained('amazing_sales')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('amazing_sale_object')->nullable();
            $table->decimal('amazing_sale_discount_amount', 20, 3)->nullable();
            $table->integer('number')->default(1);
            $table->decimal('final_product_price', 20, 3)->nullable()->comment('price effected by discount');
            $table->decimal('final_total_price', 20, 3)->nullable()->comment('number * final_product_price');
            $table->foreignId('variant_id')
                ->constrained('product_variants')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->longText('variant_object')->nullable();
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
        Schema::dropIfExists('order_items');
    }
};
