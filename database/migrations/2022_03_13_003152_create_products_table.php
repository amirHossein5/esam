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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('introduction');
            $table->longText('description');
            $table->string('slug')->unique()->nullable();
            $table->text('image');
            $table->tinyInteger('marketable')->default(1)->comment('1 => marketable ,0 => unmarketable');
            $table->tinyInteger('has_request_for_discount')->default(0);
            $table->text('tags');
            $table->foreignId('weight_id')->constrained('product_weights')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('delivery_amount', 20, 3)   ->default(0);
            $table->foreignId('category_id')
                ->constrained('product_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('sell_type_id')
                ->constrained('sell_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('products');
    }
};
