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
        Schema::create('landing_page_copans', function (Blueprint $table) {
            $table->id();
            $table->text('image');
            $table->tinyInteger('status')->default(0)
                ->comment("one copan can have true status, for being show");
            $table->foreignId('copan_id')
                ->constrained('copans')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('landing_page_copans');
    }
};
