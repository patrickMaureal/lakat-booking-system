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
			$table->string('confirmation_code')->default('not confirmed');
			$table->foreignUuid('customer_id')->references('id')->on('customers');
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
		Schema::dropIfExists('reservations');
	}
};
