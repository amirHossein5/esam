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
        Schema::create('selectable_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('selectable_attribute_id')
                ->constrained('selectable_attributes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('value');
            $table->string('background')->nullable()
                ->comment('when attribute is color');
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
        Schema::dropIfExists('selectable_attribute_values');
    }
};
