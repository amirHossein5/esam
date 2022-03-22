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
        Schema::create('category_selectable_meta', function (Blueprint $table) {
            $table->foreignId('category_id')
                ->constrained('product_categories')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('selectable_meta_id')
                ->constrained('selectable_metas')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_selectable_meta');
    }
};
