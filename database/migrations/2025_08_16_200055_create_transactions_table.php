<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_id');

            $table->enum('type', ['credit', 'debit'])->default('credit'); // credit = money in, debit = money out
            $table->decimal('amount', 10, 2)->default(0);
            $table->string('transaction_status')->default('success'); // success, failed, pending, refunded
            $table->string('transaction_reference')->nullable(); // Razorpay payment id, UTR, etc.
            $table->text('remarks')->nullable(); // extra info

            $table->timestamps();

            // Foreign keys
            // $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
            // $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
