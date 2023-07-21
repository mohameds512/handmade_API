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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku');
            $table->string('quantity');
            $table->string('description')->nullable();
            $table->string('price');

            $table->string('unit')->default('kg');
            $table->string('type')->default('material');
            $table->string('cost')->nullable();

            $table->foreignIdFor(\App\Models\Purchases\Bill::class)->nullable();

            $table->foreignIdFor(\App\Models\Sales\Invoice::class)->nullable();
            $table->foreignIdFor(\App\Models\Inventory\Product::class)->nullable();

            $table->foreignIdFor(\App\Models\Inventory\Inventory::class)->nullable();
            $table->foreignIdFor(\App\Models\User::class);

            $table->dateTime('expire_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
