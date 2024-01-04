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
		Schema::create('bookings', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->foreignUuid('customer_id')->references('id')->on('customers')->onDelete('cascade');
			$table->foreignUuid('activity_id')->references('id')->on('activities')->onDelete('cascade');
			$table->date('booking_date');
			$table->date('checkin_date');
			$table->date('checkout_date');
			$table->string('booking_status')->default('pending');
			$table->string('payment_status')->default('pending');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('bookings');
	}
};
