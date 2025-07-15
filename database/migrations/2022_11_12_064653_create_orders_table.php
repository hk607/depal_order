<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
           $table->id(); // Order ID
            $table->unsignedBigInteger('user_id'); // Customer who placed the order
            $table->string('order_number')->unique(); // Unique order reference
            $table->decimal('total_amount', 10, 2); // Total price of order
            $table->decimal('shipping_charge', 10, 2)->default(0); // Optional shipping
            $table->string('payment_method'); // e.g., COD, Stripe, Razorpay
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->enum('order_status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled'])->default('pending');
            $table->text('shipping_address'); // Full shipping address
            $table->text('billing_address')->nullable(); // Billing if different
            $table->timestamp('ordered_at')->nullable(); // When the order was placed
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
}
