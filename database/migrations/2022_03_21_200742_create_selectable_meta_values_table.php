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
        Schema::create('selectable_meta_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('selectable_meta_id')
                ->constrained('selectable_metas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
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
        Schema::dropIfExists('selectable_meta_values');
    }
};
