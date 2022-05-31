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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('address_id')->nullable()->constrained('addresses')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('address_object')->nullable();
            $table->foreignId('payment_id')->nullable()->constrained('payments')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('payment_object')->nullable();
            $table->decimal('delivery_amount', 20, 3)->nullable();
            $table->tinyInteger('delivery_status')->default(0)->comment(
                '0 => not sent, 1 => is sending, 2 => sent, 3 => received'
            );
            $table->decimal('order_final_amount', 20, 3)->nullable()->comment('without discount and delivery_amount, just real(without discount) product price * number');
            $table->decimal('order_discount_amount', 20, 3)->nullable()->comment('without copan discount amount');
            $table->foreignId('copan_id')->nullable()->constrained('copans')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('copan_object')->nullable();
            $table->decimal('order_copan_discount_amount', 20, 3)->nullable();
            $table->tinyInteger('order_status')->default(0)->comment('0 => waiting for accept, 1 => accepted, 2 => not accepted');
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
        Schema::dropIfExists('orders');
    }
};
