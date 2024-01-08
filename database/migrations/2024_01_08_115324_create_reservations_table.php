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
		Schema::create('reservations', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->foreignUuid('accomodation_id')->constrained()->onDelete('cascade');
			$table->string('code')->index();
			$table->bigInteger('code_counter')->index();
			$table->date('checkin_date')->nullable()->index();
			$table->date('checkout_date')->nullable()->index();
			$table->string('status')->default('Pending');
			$table->string('payment_status')->default('Unpaid');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('reservations');
	}
};
