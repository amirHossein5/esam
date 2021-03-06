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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 20, 3);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->tinyInteger('status')->default(0)->comment('0 => not paid, 1 => paid, 2 => rejected, 3 => returned');
            $table->foreignId('type_id')
                ->comment('way that payed, e.g. is online, offline, ...')
                ->constrained('payment_types')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->morphs('paymentable');
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
        Schema::dropIfExists('payments');
    }
};
