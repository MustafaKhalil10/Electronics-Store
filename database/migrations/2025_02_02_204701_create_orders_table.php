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
            $table->foreignId('store_id')->constrained('stores');  // -> (من اي متجر)
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();  // -> (المستجدم)
            $table->string('number');   // -> (معرف الطلب)
            $table->string('payment_method');  // -> (طريقة الدفع)
            $table->enum('status',['pending','completed','canceled']);  // -> (حالة الطلب : قيد الأنتظار,مكتمل,ملغي)
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
        Schema::dropIfExists('orders');
    }
};
