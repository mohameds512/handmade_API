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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Purchases\Vendor::class);
            $table->foreignIdFor(\App\Models\System\Status::class);
            $table->string('code');
            $table->string('number')->nullable();
            $table->dateTime('billed_at');
            $table->dateTime('due_at');

            $table->foreignIdFor(\App\Models\System\Tax::class)->nullable();
            $table->decimal('paid',15,2)->nullable();
            $table->decimal('sub_total',15,2);
            $table->decimal('tax_total',15,2)->default(0);
            $table->decimal('discount',15,2)->default(0);
            $table->decimal('total',15,2);

            $table->text('notes')->nullable();
//            $table->integer('parent_id')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
