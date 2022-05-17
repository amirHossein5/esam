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
        Schema::create('auction_suggestions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usre_id')
                ->constrained('users')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('auction_id')->constrained('auctions')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('suggested_amount', 20, 3);
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
        Schema::dropIfExists('auction_suggestions');
    }
};
