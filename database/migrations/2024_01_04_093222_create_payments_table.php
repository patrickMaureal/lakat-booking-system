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
		Schema::create('payments', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->foreignUuid('booking_id')->references('id')->on('bookings')->onDelete('cascade');
			$table->decimal('amount', 8, 2);
			$table->string('payment_mode');
			$table->string('reference_number');
			$table->string('status')->default('pending');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('payments');
	}
};
