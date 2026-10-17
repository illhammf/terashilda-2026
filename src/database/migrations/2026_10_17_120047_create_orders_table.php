<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email')->nullable();
            $table->text('notes')->nullable();
            $table->decimal('subtotal', 12, 2);
            $table->decimal('delivery_fee', 12, 2)->default(0);
            $table->decimal('total', 12, 2);
            $table->enum('status', ['pending', 'confirmed', 'processing', 'ready', 'completed', 'cancelled'])->default('pending');
            $table->enum('payment_method', ['cash', 'transfer', 'qris', 'ewallet'])->nullable();
            $table->enum('payment_status', ['unpaid', 'paid', 'failed'])->default('unpaid');
            $table->enum('pickup_type', ['pickup', 'delivery'])->default('pickup');
            $table->text('delivery_address')->nullable();
            $table->timestamp('estimated_ready_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
