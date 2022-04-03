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
        Schema::create('category_selectable_attribute_value', function (Blueprint $table) {
            $table->foreignId('category_id')
                ->constrained('product_categories')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('attribute_value_id')
                ->constrained('selectable_attribute_values')
                ->onDelete('cascade')->onUpdate('cascade')
                ->comment('selectable_attribute_values');

            $table->foreignId('attribute_id')
                ->constrained('selectable_attributes')
                ->onDelete('cascade')->onUpdate('cascade')
                ->comment('selectable_attributes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_selectable_attribute_value');
    }
};
