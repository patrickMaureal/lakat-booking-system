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
			$table->string('code')->index();
			$table->bigInteger('code_counter')->index();
			$table->foreignUuid('reservation_id')->constrained()->onDelete('cascade');
			$table->date('checkin_date');
			$table->date('checkout_date');
			$table->string('status')->default('Booked');
			$table->timestamps();
			$table->softDeletes();
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
