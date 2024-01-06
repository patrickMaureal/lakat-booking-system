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
		Schema::create('accomodations', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->string('name');
			$table->bigInteger('min_stay');
			$table->bigInteger('min_capacity');
			$table->bigInteger('max_capacity');
			$table->string('availability')->default('Yes');
			$table->bigInteger('total_occupied')->default(0);
			$table->decimal('price', 8, 2);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('accomodations');
	}
};
