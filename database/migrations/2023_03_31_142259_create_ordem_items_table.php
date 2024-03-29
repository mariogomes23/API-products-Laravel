<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ordem_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId("order_id")->constrained();
            $table->string("product_title");
            $table->integer("quantity");
            $table->decimal("price");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordem_items');
    }
};
