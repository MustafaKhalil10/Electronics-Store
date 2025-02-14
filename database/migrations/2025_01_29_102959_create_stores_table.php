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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // -> (اسم المتجر)
            $table->text('description')->nullable(); // -> (وصف المتجر)
            $table->text('address')->nullable(); // -> (عنوان المتجر)
            $table->enum('status',['active','inactive'])->default('active'); // -> (حالة المتجر للبائع)
            $table->date('date')->nullable(); // -> (تاريخ انشاء المتجر)
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
        Schema::dropIfExists('stores');
    }
};
