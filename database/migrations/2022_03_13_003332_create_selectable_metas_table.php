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
        Schema::create('selectable_metas', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('sold_number')->default(0);
            $table->tinyInteger('frozen_number')->default(0);
            $table->tinyInteger('marketable_number')->default(0);
            $table->decimal('price', 20, 3);
            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('meta')
                ->comment("[ color_id => , size_id => ]");
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
        Schema::dropIfExists('selectable_metas');
    }
};
