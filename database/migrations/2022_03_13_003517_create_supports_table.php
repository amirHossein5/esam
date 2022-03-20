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
        Schema::create('supports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('description');
            $table->foreignId('support_id')
                ->constrained('supports')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->tinyInteger('status')->default(0)->comment('0 => open, 1 => closed');
            $table->tinyInteger('seen')->default(0)->comment('0 => unseen, 1 => seen');
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
        Schema::dropIfExists('supports');
    }
};
