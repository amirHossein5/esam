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
        Schema::create('cart_items_selectable_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_item_id')
                ->constrained('cart_items')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('attribute_id')
                ->constrained('selectable_attributes')
                ->onDelete('cascade')->onUpdate('cascade')
                ->comment('selectable_attributes');
            $table->foreignId('attribute_value_id')
                ->constrained('selectable_attribute_values')
                ->onDelete('cascade')->onUpdate('cascade')
                ->comment('selectable_attribute_values');
            $table->string('value');
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
        Schema::dropIfExists('cart_items_selectable_attributes');
    }
};
