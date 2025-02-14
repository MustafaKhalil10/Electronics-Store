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
            $table->foreignId('store_id')->constrained('stores')->cascadeOnDelete(); // -> (ينتمي لمتجر معين )
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();  // -> (ينتمي لفئة معينة)
            $table->string('name'); // -> (اسم المنتج)
            $table->text('description'); // -> (وصف المنتج)
            $table->string('image')->nullable(); // -> (صورة للمنتج)
            $table->float('price'); // -> (سعر المنتج)
            $table->float('compare_price'); // -> (الخصم)
            $table->json('options')->nullable(); // -> (..خيارات المنتج ,لونه,حجمه)
            $table->float('rating')->default(0); // -> (تقيم المنتج)
            $table->boolean('featured')->default(0); // -> (المنتج مميز)
            $table->enum('status', ['active', 'inactive'])->default('active'); // -> (حالة المنتج)
            $table->boolean('favorite_product')->default(0); // -> (منتج مفضل)
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
        Schema::dropIfExists('products');
    }
};
